<?php

namespace App\Http\Controllers;

use App\Helpers\PortfolioHelper;
use App\Models\Project;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        try {
            return PortfolioHelper::index($request);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function show(Project $project)
    {
        try {
            return PortfolioHelper::show($project);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
