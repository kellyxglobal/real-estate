<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //Admin
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@realestate.com',
                'password' => Hash::make('NoCateX@1990'),
                'role' => 'admin',
                'status' =>'active',
            ],
            //Agent
            [
                'name' => 'Agent',
                'username' => 'agent',
                'email' => 'agent@realestate.com',
                'password' => Hash::make('NoCateX@1990'),
                'role' => 'agent',
                'status' => 'active',
            ],
            //User
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@realestate.com',
                'password' => Hash::make('NoCateX@1990'),
                'role' => 'user',
                'status' => 'active',
            ],
        ]);
    }
}
