<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{

    public function run()
    {
        $user = User::create([
            'name' => 'Begzada',
            'last_name' => 'Dawletyarovna',
            'email' => 'dbegzada@gmail.com',
            'password' => Hash::make('Texnoruss'),

        ]);
        $user->assignRole('super-admin');
        $user->createToken('API Token')->plainTextToken;

    }
}
