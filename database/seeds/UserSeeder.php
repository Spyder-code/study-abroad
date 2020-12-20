<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@yahoo.com',
            'password' => Hash::make('admin123'),
            'image' => 'default.jpg'
        ]);

        $admin->assignRole('admin');

        $superUser = User::create([
            'name' => 'Super User',
            'email' => 'super@yahoo.com',
            'password' => Hash::make('admin123'),
            'image' => 'default.jpg'
        ]);

        $superUser->assignRole('superUser');
    }
}
