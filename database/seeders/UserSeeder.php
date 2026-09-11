<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'user_type' => 'admin', // Assuming 1 is the ID for Super Admin
                'name' => 'Umar Bahadur',
                'email' => 'ubhb888@gmail.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(), // Set email_verified_at to the current timestamp
            ],
            // Add more users as needed
        ];

        // CHECKING USER IN DB AND THEN INSERTING IT INTO TABLE
        foreach ($users as $user) {
            // Make sure 'email' key exists in the $user array
            if (isset($user['email'])) {
                $existingUser = DB::table('users')
                    ->where('email', $user['email'])
                    ->first();

                if (!$existingUser) {
                    DB::table('users')->insert([
                        'user_type' => $user['user_type'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'password' => $user['password'],
                        'email_verified_at' => $user['email_verified_at'], // Add this field
                        'created_at' => now(), // Optionally set created_at
                        'updated_at' => now(), // Optionally set updated_at
                    ]);
                }
            }
        }
    }
}
