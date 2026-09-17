<?php

namespace App\Helpers;

use App\Mail\QuoteRequestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactHelper
{
    public static function index()
    {
        $meta = MetaHelper::make(
            'Contact Us | 24/7 AK Quick Mobile Tyres',
            'Need emergency mobile tyre fitting? Call 07405 726167, available 24/7. We come to you at the roadside, at home or at work.'
        );

        return view('contact', [
            'meta' => $meta,
            'company' => config('company'),
        ]);
    }

    public static function quote()
    {
        $meta = MetaHelper::make(
            'Request a Quote | 24/7 AK Quick Mobile Tyres',
            'Request a mobile tyre fitting quote online. Tell us your location and what you need. We reply with clear options and pricing.'
        );

        return view('quote', [
            'meta' => $meta,
            'company' => config('company'),
        ]);
    }

    public static function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:40'],
            'title' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
        ];
    }

    public static function messages(): array
    {
        return [
            'name.required' => 'Please enter your name.',
            'name.max' => 'Name cannot exceed 255 characters.',
            'phone.required' => 'Please enter your phone number.',
            'phone.max' => 'Phone cannot exceed 40 characters.',
            'title.required' => 'Please enter a subject.',
            'title.max' => 'Subject cannot exceed 255 characters.',
            'message.required' => 'Please tell us what you need.',
            'message.max' => 'Message cannot exceed 2000 characters.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Email cannot exceed 255 characters.',
        ];
    }

    public static function add(Request $request)
    {
        $validator = Validator::make($request->all(), self::rules(), self::messages());

        if ($validator->fails()) {
            if ($request->expectsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validator->errors()->first(),
                    'errors' => $validator->errors(),
                ], 422);
            }

            return back()
                ->withErrors($validator)
                ->withInput()
                ->withFragment('quote');
        }

        $validated = $validator->validated();

        $payload = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'title' => $validated['title'],
            'message' => $validated['message'],
        ];

        $ownerEmail = config('company.quote_email')
            ?: config('company.email')
            ?: config('mail.from.address');

        if (empty($ownerEmail)) {
            Log::error('Quote request could not be sent: no owner email configured.');

            if ($request->expectsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unable to send your request right now. Please call us instead.',
                ], 500);
            }

            return back()
                ->with('quote_error', 'Unable to send your request right now. Please call us instead.')
                ->withInput()
                ->withFragment('quote');
        }

        try {
            // Owner notification (all quote details)
            Mail::to($ownerEmail)->send(new QuoteRequestMail($payload, forCustomer: false));

            // Customer confirmation (same quote details)
            Mail::to($payload['email'])->send(new QuoteRequestMail($payload, forCustomer: true));

            if ($request->expectsJson()) {
                return response()->json([
                    'status' => 'success',
                    'msg' => 'Your quote request has been sent. We will get back to you soon.',
                ]);
            }

            return back()
                ->with('quote_success', 'Your quote request has been sent. A confirmation email has also been sent to you.')
                ->withFragment('quote');
        } catch (\Throwable $e) {
            Log::error('Quote request mail failed: '.$e->getMessage(), [
                'exception' => $e,
            ]);

            if ($request->expectsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Something went wrong. Please try again or call us.',
                ], 500);
            }

            return back()
                ->with('quote_error', 'Something went wrong. Please try again or call us.')
                ->withInput()
                ->withFragment('quote');
        }
    }
}
