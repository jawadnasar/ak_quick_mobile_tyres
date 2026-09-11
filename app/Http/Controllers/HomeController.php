<?php

namespace App\Http\Controllers;

use App\Helpers\HomeHelper;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        try {
            return HomeHelper::index();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
