<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::query()->create([
            'email' => 'avavion@gmail.com',
            'password' => Hash::make('avavion'),
            'name' => 'avavion',
            'role' => User::IS_USER
        ]);

        User::query()->create([
            'email' => 'avavionmvm@gmail.com',
            'password' => Hash::make('avavionmvm'),
            'name' => 'avavionmvm',
            'role' => User::IS_ADMIN
        ]);

        User::query()->create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('passworD'),
            'name' => 'admin',
            'role' => User::IS_ADMIN
        ]);
    }
}
