<?php

namespace App\Helpers;

class AboutHelper
{
    public static function aboutUs()
    {
        $meta = MetaHelper::make(
            'About Us | 24/7 AK Quick Mobile Tyres',
            'Learn about 24/7 AK Quick Mobile Tyres: fast, reliable mobile tyre fitting and emergency roadside tyre assistance that comes to you.'
        );

        return view('about_us', [
            'meta' => $meta,
            'company' => config('company'),
            'whyUs' => config('company.why_us'),
        ]);
    }

    public static function Testimonials()
    {
        $testimonials = config('testimonials');
        $meta = MetaHelper::make(
            'Testimonials | ' . config('company.name'),
            'What drivers say about 24/7 AK Quick Mobile Tyres and our emergency mobile tyre service.'
        );

        return view('testimonials', compact('testimonials', 'meta'));
    }

    public static function Team()
    {
        $meta = MetaHelper::make(
            'Our Team | ' . config('company.name'),
            'Meet the mobile tyre technicians at 24/7 AK Quick Mobile Tyres.'
        );

        return view('team', compact('meta'));
    }
}
