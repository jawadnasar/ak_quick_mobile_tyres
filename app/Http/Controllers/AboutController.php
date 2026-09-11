<?php

namespace App\Http\Controllers;

use App\Helpers\AboutHelper;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutUs(Request $request)
    {
        try {
            return AboutHelper::aboutUs($request);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function Testimonials(Request $request)
    {
        try {
            return AboutHelper::Testimonials($request);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function Team(Request $request)
    {
        try {
            return AboutHelper::Team($request);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
