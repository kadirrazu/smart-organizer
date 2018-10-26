<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Md. Abdul Kadir',
            'username' => 'kadirrazu',
            'email' => 'kadir.ap20@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
