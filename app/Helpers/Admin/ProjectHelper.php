<?php

namespace App\Helpers\Admin;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProjectHelper
{
    public static function index()
    {
        $projects = Project::all();
        $categories = Category::all();

        return view('admin.projects.projects', compact('projects', 'categories'));
    }

    public static function add()
    {
        $categories = Category::all();

        return view('admin.projects.add-project', compact('categories'));
    }

    public static function saveRules(?int $ignoreId = null): array
    {
        return [
            'category_id' => ['required', 'integer', Rule::exists('categories', 'id')],
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('projects', 'name')->ignore($ignoreId)->whereNull('deleted_at'),
            ],
            'description' => ['nullable', 'string', 'max:5000'],
            'link' => ['nullable', 'string', 'max:500'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:5120'],
        ];
    }

    public static function saveMessages(): array
    {
        return [
            'category_id.required' => 'Please select a project category.',
            'category_id.exists' => 'The selected category does not exist.',
            'name.required' => 'Please enter the project name.',
            'name.unique' => 'A project with this name already exists.',
            'name.max' => 'Project name cannot exceed 255 characters.',
            'description.max' => 'Description cannot exceed 5000 characters.',
            'link.max' => 'Project link cannot exceed 500 characters.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'Image must be JPG, PNG, or WebP format.',
            'image.max' => 'Image size cannot exceed 5MB.',
        ];
    }

    public static function save(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            self::saveRules(),
            self::saveMessages()
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        DB::beginTransaction();

        try {
            $project = new Project();
            $project->name = $validated['name'];
            $project->category_id = $validated['category_id'];
            $project->link = $validated['link'] ?? null;
            $project->description = $validated['description'] ?? null;

            if ($request->hasFile('image')) {
                $project->image = self::storeProjectImage($request->file('image'));
            }

            $project->save();

            DB::commit();

            AdminDashboardHelper::clearStatsCache();

            return response()->json([
                'status' => 'success',
                'msg' => 'Project has been created successfully.',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to save project: ' . $e->getMessage(),
            ], 500);
        }
    }

    public static function getall(Request $request)
    {
        $projects = Project::with(['category'])->get();

        return [
            'data' => $projects->map(fn ($item) => [
                'id' => $item->id,
                'image' => $item->image,
                'name' => $item->name,
                'description' => $item->description,
                'link' => $item->link,
                'category' => $item->category?->name ?? '—',
            ]),
        ];
    }

    public static function edit(Request $request, $id)
    {
        $projects = Project::with(['category'])->findOrFail($id);
        $categories = Category::all();

        return view('admin.projects.edit-project', compact('projects', 'categories'));
    }

    public static function update(Request $request)
    {
        $id = (int) $request->input('id');

        $validator = Validator::make(
            $request->all(),
            array_merge(self::saveRules($id), [
                'id' => ['required', 'integer', Rule::exists('projects', 'id')],
            ]),
            array_merge(self::saveMessages(), [
                'id.required' => 'Project ID is missing.',
                'id.exists' => 'Project not found.',
            ])
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        DB::beginTransaction();

        try {
            $project = Project::findOrFail($id);
            $project->name = $validated['name'];
            $project->category_id = $validated['category_id'];
            $project->link = $validated['link'] ?? null;
            $project->description = $validated['description'] ?? null;

            if ($request->hasFile('image')) {
                self::deleteProjectImage($project->image);
                $project->image = self::storeProjectImage($request->file('image'));
            }

            $project->save();

            DB::commit();

            AdminDashboardHelper::clearStatsCache();

            return response()->json([
                'status' => 'success',
                'msg' => 'Project has been updated successfully.',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update project: ' . $e->getMessage(),
            ], 500);
        }
    }

    public static function view(Request $request, $id)
    {
        $projects = Project::with(['category'])->findOrFail($id);

        return view('admin.projects.view-project', compact('projects'));
    }

    public static function filter($category_id, $project_id)
    {
        $query = Project::with('category');

        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        if ($project_id) {
            $query->where('id', $project_id);
        }

        return [
            'data' => $query->get()->map(fn ($item) => [
                'id' => $item->id,
                'image' => $item->image,
                'name' => $item->name,
                'description' => $item->description,
                'link' => $item->link,
                'category' => $item->category?->name ?? '—',
            ]),
        ];
    }

    public static function destroy(Request $request, $id)
    {
        try {
            $project = Project::findOrFail($id);
            $project->delete();

            AdminDashboardHelper::clearStatsCache();

            return response()->json([
                'status' => 'success',
                'msg' => 'Project deleted successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }

    protected static function storeProjectImage($file): string
    {
        $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
        $file->storeAs('images/projects', $filename, 'public');

        return $filename;
    }

    protected static function deleteProjectImage(?string $filename): void
    {
        if ($filename && Storage::disk('public')->exists('images/projects/' . $filename)) {
            Storage::disk('public')->delete('images/projects/' . $filename);
        }
    }
}
