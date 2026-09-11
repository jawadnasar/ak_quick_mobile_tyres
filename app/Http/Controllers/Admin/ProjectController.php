<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Admin\ProjectHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return ProjectHelper::index();
    }

    public function add(Request $request)
    {
        return ProjectHelper::add($request);
    }

    public function save(Request $request)
    {
        return ProjectHelper::save($request);
    }

    public function getall(Request $request)
    {
        return response()->json(ProjectHelper::getall($request));
    }

    public function edit(Request $request, $id)
    {
        return ProjectHelper::edit($request, $id);
    }

    public function update(Request $request)
    {
        return ProjectHelper::update($request);
    }

    public function view(Request $request, $id)
    {
        return ProjectHelper::view($request, $id);
    }

    public function filter(Request $request)
    {
        return response()->json(
            ProjectHelper::filter(
                $request->input('category_id'),
                $request->input('id')
            )
        );
    }

    public function destroy(Request $request, $id)
    {
        return ProjectHelper::destroy($request, $id);
    }
}
