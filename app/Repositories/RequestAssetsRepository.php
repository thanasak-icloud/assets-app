<?php
namespace App\Repositories;
use App\Models\UserHasAsset;

class RequestAssetsRepository
{
    public function getAll()
    {
        return UserHasAsset::all();
    }

    public function getOwnAssets()
    {
        return UserHasAsset::where('user_id', auth()->user()->id)->get();
    }

    public function find($id)
    {
        return UserHasAsset::find($id);
    }

    public function create(array $data)
    {
        return UserHasAsset::create($data);
    }

    public function createMany(array $data)
    {
        return UserHasAsset::createMany($data);
    }

    public function update($id, array $data)
    {
        $asset = UserHasAsset::find($id);
        $asset->update($data);
        return $asset;
    }

    public function delete($id)
    {
        $asset = UserHasAsset::find($id);
        $asset->delete();
    }
}
