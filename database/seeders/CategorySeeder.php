<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        $categories = [
            'Real Estate',
            'Health',
            'Education',
            'E-Commerce',
            'Finance',
            'Travel',
            'Portfolio',
            'Entertainment',
            'News & Media',
            'Technology',
            'Food',
            'Fintech',
            'Social Media',
            'Gaming',
            'Sports',
            'Lifestyle',
            'Automotive',
            'Fashion',
            'Non-Profit',
            'Consulting',
        ];

        foreach ($categories as $name) {
            $slug = Str::slug($name);

            $existing = DB::table('categories')->where('slug', $slug)->first();

            if (!$existing) {
                DB::table('categories')->insert([
                    'name' => $name,
                    'slug' => $slug,
                    'description' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
