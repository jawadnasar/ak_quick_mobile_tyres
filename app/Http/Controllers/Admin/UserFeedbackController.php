<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Admin\UserFeedBackHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserFeedbackController extends Controller
{
    public function index()
    {
        try{ return UserFeedBackHelper::index(); } catch (\Exception $e) { return $e->getMessage(); }
        
    }

    public function getall()
    {
        try{ return UserFeedBackHelper::getall(); } catch (\Exception $e) { return $e->getMessage(); }
        
    }

    public function view(Request $request, $id)
    {
        try{ return UserFeedBackHelper::view($request, $id); } catch (\Exception $e) { return $e->getMessage(); }
        
    }

    public function filter(Request $request)
    {
        try {
            $fromDate = $request->input('from_date');
            $toDate = $request->input('to_date');
           

            return UserFeedBackHelper::filter($fromDate, $toDate);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
