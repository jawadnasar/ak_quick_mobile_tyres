<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Admin\CategoryHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryHelper::index();
    }

    public function add()
    {
        return CategoryHelper::add();
    }

    public function save(Request $request)
    {
        return CategoryHelper::save($request);
    }

    public function getall(Request $request)
    {
        return CategoryHelper::getall($request);
    }

    public function filter(Request $request)
    {
        return response()->json(CategoryHelper::filter($request->input('id')));
    }

    public function destroy(Request $request, $id)
    {
        return CategoryHelper::destroy($request, $id);
    }
}
