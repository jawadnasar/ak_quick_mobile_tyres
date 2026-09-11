<?php

namespace App\Http\Controllers;

use App\Helpers\MetaHelper;

class LegalController extends Controller
{
    public function privacy()
    {
        $meta = MetaHelper::make(
            'Privacy Policy | ' . config('company.name'),
            'Read the Privacy Policy for ' . config('company.name') . '. Learn how we collect, use, and protect your personal information.'
        );

        return view('legal.privacy', compact('meta'));
    }

    public function terms()
    {
        $meta = MetaHelper::make(
            'Terms & Conditions | ' . config('company.name'),
            'Read the Terms and Conditions for using ' . config('company.name') . ' website and services.'
        );

        return view('legal.terms', compact('meta'));
    }
}
