<?php

namespace Database\Seeders;

// database/seeders/CustomDataSeeder.php

// database/seeders/CustomDataSeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {

        \App\Models\User::create([
            'name' => 'Archana Dubey',
            'email' => 'archana@email.com',
            'password' => Hash::make('archana'),
            'role' => 2,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        // Using DB facade
        // DB::table('users')->insert([
        //     'name' => 'Jane Doe',
        //     'email' => 'jane@example.com',
        //     'password' => Hash::make('password'),
        //     'email_verified_at' => now(),
        //     'remember_token' => Str::random(10),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // Add more records as needed
    }
}
