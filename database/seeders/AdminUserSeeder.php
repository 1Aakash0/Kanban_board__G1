<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Aakash',
            'email' => 'aakash@gmail.com',
            'mobile' => '1234567890',
            'role' => 'A',
            'password' => bcrypt('Admin@123'),
        ]);
    }
}
