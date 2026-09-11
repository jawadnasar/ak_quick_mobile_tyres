<?php

namespace App\Http\Controllers;

use App\Helpers\ServiceHelper;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        try {
            return ServiceHelper::index($request);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show(string $slug)
    {
        try {
            return ServiceHelper::show($slug);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
