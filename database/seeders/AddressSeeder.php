<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        Address::query()->updateOrCreate(['user_id' => $user->id],
            [
                'address' => 'El hank Imm 19 nr 44',
                'city' => 'Casablanca',
                'country' => 'Morroco',
                'zipCode' => '20160',
            ]);
    }
}
