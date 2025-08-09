<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => 'user',
            'email' => 'test@test.com',
            'password' => Hash::make('testtest'),
            'representative' => '0',
            'admin' => '0',
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'test2@test.com',
            'password' => Hash::make('testtest'),
            'representative' => '0',
            'admin' => '1',
        ]);

        User::create([
            'id' => '3',
            'name' => 'represent',
            'email' => 'test3@test.com',
            'password' => Hash::make('testtest'),
            'representative' => '1',
            'admin' => '0',
        ]);
    }
}
