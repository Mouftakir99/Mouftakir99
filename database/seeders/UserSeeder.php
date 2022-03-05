<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->updateOrInsert(['email' => 'mouftakirayman@gmail.com'],
            [
                'firstName' => 'Mouftakir',
                'lastName' => 'Aiman',
                'name' => 'Mouftakir Aiman',
                'phone' => '+212 620273920',
                'birthday' => '1999/01/17',
                'email' => 'mouftakirayman@gmail.com',
                'password' => bcrypt('admin')
            ]);
    }
}
