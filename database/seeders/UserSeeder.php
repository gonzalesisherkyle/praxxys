<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                //1
                'username' => 'admin-1',
                'email' => 'admin-1@email.com', 
                'password' => Hash::make('admin-1@email.com'),
            ],
            [
                //2
                'username' => 'admin-2',
                'email' => 'admin-2@email.com', 
                'password' => Hash::make('admin-2@email.com'),
            ],
            [
                //3
                'username' => 'admin-3',
                'email' => 'admin-3@email.com', 
                'password' => Hash::make('admin-3@email.com'),
            ],
          

        ];

        DB::table('users')->insert($data);
    }
}