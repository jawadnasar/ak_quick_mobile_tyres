<?php

namespace App\Helpers\Admin;

use App\Models\Contact;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class UserFeedBackHelper {

    public static function index(){
        return view('admin.feedbacks.feedbacks');
    }

    public static function getall()
    {
        $feedbacks = Contact::all();

        // Format the data as needed by DataTables
        $formattedData = $feedbacks->map(function ($key) {
            return [
                'id' => $key->id,
                'name' => $key->name,
                'email' => $key->email,
                'title' => $key->title,
                'message' => $key->message,
            ];
        });
        return ['data' => $formattedData];
    }

    public static function view(Request $request, $id)
    {
        $feedback = Contact::findOrFail($id);
       
        return view('admin.feedbacks.view-feedback', compact('feedback'));
    }

    public static function filter($fromDate, $toDate)
    {
        $query = Contact::query();

        if ($fromDate) {
            $query->whereDate('created_at', '>=', $fromDate);
        }

        if ($toDate) {
            $query->whereDate('created_at', '<=', $toDate);
        }

       

        $feedbacks = $query->get();

        // Format the data as needed by DataTables
        $formattedData = $feedbacks->map(function ($key) {
            return [
                'id' => $key->id,
                'name' => $key->name,
                'email' => $key->email,
                'title' => $key->title,
                'message' => $key->message,
            ];
        });

        return ['data' => $formattedData];
    }


}