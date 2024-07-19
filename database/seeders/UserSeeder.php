<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone_number' => null,
                'shift' => null,
            ],
            [
                'name' => 'barber',
                'email' => 'barber@mail.com',
                'password' => Hash::make('password'),
                'role' => 'barber',
                'phone_number' => '082124721853',
                'shift' => date("H:i", strtotime("10:00")) . ' - ' . date("H:i", strtotime("18:00"))
            ],
        ];

        User::insert($users);
    }
}
