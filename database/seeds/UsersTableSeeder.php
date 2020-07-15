<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
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
                'username'     => 'admin',
                'email'    => 'admin@gmail.com',
                'password' => Hash::make('admin'),
            ],
            /*
            [
                'name'     => 'test',
                'email'    => 'test@gmail.com',
                'password' => Hash::make('testtest'),
            ]
            */
        ];

        DB::table('users')->insert($data);
    }
}
