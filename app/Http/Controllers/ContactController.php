<?php

namespace App\Http\Controllers;

use App\Helpers\ContactHelper;
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
}
