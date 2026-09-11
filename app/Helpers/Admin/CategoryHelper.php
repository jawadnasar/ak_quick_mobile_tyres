<?php

namespace App\Helpers\Admin;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryHelper {

    public static function index(){
        $categories = Category::all();
        return view('admin.categories.categories', compact('categories'));
    }

    public static function add()
    {
        return view('admin.categories.add-category');
    }

    public static function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255', Rule::unique('categories', 'name')->whereNull('deleted_at')],
            'description' => ['nullable', 'string', 'max:2000'],
        ], [
            'name.required' => 'Please enter the category name.',
            'name.unique' => 'This category name already exists.',
            'name.max' => 'Category name cannot exceed 255 characters.',
            'description.max' => 'Description cannot exceed 2000 characters.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        Category::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'slug' => static::uniqueSlug($validated['name']),
        ]);

        AdminDashboardHelper::clearStatsCache();

        return response()->json(['status' => 'success', 'msg' => 'Category created successfully.']);
    }

    protected static function uniqueSlug(string $name): string
    {
        $base = Str::slug($name) ?: 'category';
        $slug = $base;
        $counter = 1;

        while (Category::withTrashed()->where('slug', $slug)->exists()) {
            $slug = $base . '-' . $counter++;
        }

        return $slug;
    }


    public static function getall()
    {
        $categories = Category::all();

        // Format the data as needed by DataTables
        $formattedData = $categories->map(function ($item, $index) {
            return [
                'serialNumber' => $index + 1,
                'id' => $item->id,
                'name' => $item->name,
                'description' => $item->description ? $item->description : 'N/A',
                'slug' => $item->slug,
            ];
        });

        return response()->json(['data' => $formattedData]);
    }


    public static function filter($category_id)
    {
        $query = Category::query();

       

        if ($category_id) {
            $query->where('id', $category_id);
        }

        $sub_categories = $query->get();

        // Format the data as needed by DataTables
        $formattedData = $sub_categories->map(function ($item, $index) {
            return [
                'serialNumber' => $index + 1,
                'id' => $item->id,
                'name' => $item->name,
                'description' => $item->description ? $item->description : 'N/A',
                'slug' => $item->slug,
            ];
        });

        return ['data' => $formattedData];
    }



    public static function destroy(Request $request, $id)
    {
        try {
            // Find the category by ID
            $category = Category::findOrFail($id);

            // Check for dependencies in sub-categories and products
            $hasItems = Project::where('category_id', $id)->exists();
            if ($hasItems) {
                return response()->json(['status' => 'error', 'msg' => 'This Category has dependencies and cannot be deleted.'], 400);
            }

            // Soft delete the category
            $category->delete();

            AdminDashboardHelper::clearStatsCache();

            return response()->json(['status' => 'success', 'msg' => 'Category deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'msg' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

}