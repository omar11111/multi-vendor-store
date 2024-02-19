<?php

namespace Database\Seeders;

use App\Models\User;
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
        $users = [
            [
                'name'=>'omar',
                'email'=> 'omar@gmail.com',
                'password'=> Hash::make('password'),
                'phone_number'=>'888866664441',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name'=>'omar1',
                'email'=> 'omar1@gmail.com',
                'password'=> Hash::make('password'),
                'phone_number'=>'888866664442',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name'=>'omar12',
                'email'=> 'omar12@gmail.com',
                'password'=> Hash::make('password'),
                'phone_number'=>'888866664443',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name'=>'omar14',
                'email'=> 'omar14@gmail.com',
                'password'=> Hash::make('password'),
                'phone_number'=>'888866664444',
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            
        ];

        User::insert($users);
    }
}
