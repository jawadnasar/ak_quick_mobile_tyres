<?php

namespace App\Http\Controllers;

use App\Helpers\ContactHelper;
use App\Helpers\QuoteFormGuard;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        return ContactHelper::index($request);
    }

    public function quote(Request $request)
    {
        return ContactHelper::quote();
    }

    public function add(Request $request)
    {
        return ContactHelper::add($request);
    }

    public function captcha(string $token)
    {
        return QuoteFormGuard::image($token);
    }

    public function refreshCaptcha()
    {
        $token = QuoteFormGuard::issue();

        return response()->json([
            'token' => $token,
            'image' => route('contact.captcha', ['token' => $token]),
        ]);
    }
}
