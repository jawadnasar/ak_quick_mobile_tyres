<?php

namespace App\Http\Controllers;

use App\Helpers\Admin\AdminDashboardHelper;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        try{ return AdminDashboardHelper::index(); } catch (\Exception $e) { return $e->getMessage(); }
    }
}
