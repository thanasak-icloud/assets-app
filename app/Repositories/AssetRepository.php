<?php
namespace App\Repositories;

use App\Models\Asset;
use App\Models\AssetType;

class AssetRepository
{
    public function getAll()
    {
        return Asset::all();
    }

    public function getType()
    {
        return AssetType::all();
    }

    public function find($id)
    {
        return Asset::find($id);
    }

    public function create(array $data)
    {
        return Asset::create($data);
    }

    public function update($id, array $data)
    {
        $asset = Asset::find($id);
        $asset->update($data);
        return $asset;
    }

    public function delete($id)
    {
        $asset = Asset::find($id);
        $asset->delete();
    }
}
