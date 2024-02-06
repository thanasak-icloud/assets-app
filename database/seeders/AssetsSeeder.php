<?php

namespace Database\Seeders;

use App\Models\Asset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $assets = [
            [
                'name' => 'Logi Mouse',
                'description' => 'Mouse abc',
                'asset_type_id' => 1,
                'price' => 1000
            ],
            [
                'name' => 'Logi Keyboard',
                'description' => 'Keyboard bbb',
                'asset_type_id' => 2,
                'price' => 999
            ],
            [
                'name' => 'Samsung Monitor',
                'description' => 'Monitor kkk',
                'asset_type_id' => 3,
                'price' => 12000
            ]
        ];

        Asset::insert($assets);
    }
}
