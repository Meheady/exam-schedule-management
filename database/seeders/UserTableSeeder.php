<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['name'=>'Admin',
            'username'=>'admin',
            'email'=>'admin@green.edu.bd',
            'password'=>Hash::make('123'),
            'role'=>'admin',
            'status'=>'active'
            ],
            ['name'=>'Student',
            'username'=>'student',
            'email'=>'student@green.edu.bd',
            'password'=>Hash::make('123'),
            'role'=>'student',
            'student_id'=>'201015010',
            'status'=>'active'
            ],
            ['name'=>'Teacher',
            'username'=>'teacher',
            'email'=>'teacher@green.edu.bd',
            'password'=>Hash::make('123'),
            'role'=>'teacher',
            'status'=>'active'
            ],

        ]);
    }
}
