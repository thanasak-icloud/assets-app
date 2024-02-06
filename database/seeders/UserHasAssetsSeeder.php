<?php

namespace Database\Seeders;

use App\Models\UserHasAsset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserHasAssetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userHasAssets = [
            [
                'user_id' => 1,
                'asset_id' => 1,
                'quantity' => 1,
            ],
            [
                'user_id' => 1,
                'asset_id' => 2,
                'quantity' => 1,
            ],
            [
                'user_id' => 1,
                'asset_id' => 3,
                'quantity' => 3,
            ]
        ];
        UserHasAsset::insert($userHasAssets);
    }
}
