<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin@123'),
            'admin' => 1,
            'email_verified_at' => \Carbon\Carbon::now()
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => bcrypt('password'),
            'user_type' => 1,
            'email_verified_at' => \Carbon\Carbon::now()
        ]);

    }
}
