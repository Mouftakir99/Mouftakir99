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
                'email' => 'mouftakirayman@gmail.com',
                'password' => bcrypt('admin')
            ]);
    }
}
