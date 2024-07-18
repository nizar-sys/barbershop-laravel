<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'name' => 'Smart Haircut',
                'price' => '50000',
                'price_show' => '50',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Long Trim',
                'price' => '100000',
                'price_show' => '100',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Standard Coloring',
                'price' => '50000',
                'price_show' => '50',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Special Coloring',
                'price' => '100000',
                'price_show' => '100',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Bleaching',
                'price' => '75000',
                'price_show' => '75',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Creambath',
                'price' => '80000',
                'price_show' => '80',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Advanced Hair Tattoo',
                'price' => '50000',
                'price_show' => '50',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Shaving',
                'price' => '20000',
                'price_show' => '20',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Down Perming',
                'price' => '100000',
                'price_show' => '100',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Medium Perming',
                'price' => '125000',
                'price_show' => '125',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Bold Perming',
                'price' => '150000',
                'price_show' => '150',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        Service::insert($services);
    }
}
