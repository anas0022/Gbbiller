<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if user already exists
        if (!User::where('email', 'admin@gmail.com')->exists()) {
            User::create([
                'username' => 'superadmin',
                'name' => 'Super Admin',
                'email' => 'admin@gmail.com',
                'mobile' => '1234567890',
                'password' => Hash::make('super@6383'),
                'role' => 'admin',
                'user_type' => 1,
                'store_id' => 0,
                'mobile_code' => 91,
                'plan' => 1,
                'created_by' => 0,
            ]);
        }
    }
}
