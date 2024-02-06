<?php

namespace Database\Seeders;

use App\Models\AssetType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssetTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ["name" => "Mouse"]
            ,
            ["name" => "Keyboard"]
            ,
            ["name" => "Monitor"]
        ];

        AssetType::insert($types);

    }
}
