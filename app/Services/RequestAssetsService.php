<?php

namespace App\Services;

use App\Models\UserHasAsset;
use App\Repositories\AssetRepository;
use App\Repositories\RequestAssetsRepository;
use App\Rules\CreateUserAsset;
use Illuminate\Validation\ValidationException;

class RequestAssetsService
{
    protected RequestAssetsRepository $requestAssetRepository;
    protected AssetRepository $assetRepository;

    public function __construct(RequestAssetsRepository $requestAssetRepository, AssetRepository $assetRepository)
    {
        $this->requestAssetRepository = $requestAssetRepository;
        $this->assetRepository = $assetRepository;
    }

    public function getAll()
    {
        return $this->requestAssetRepository->getAll();
    }

    public function getOwnAssets()
    {
        return $this->requestAssetRepository->getOwnAssets();
    }
    public function getById($id)
    {
        return $this->requestAssetRepository->find($id);
    }
    public function store($data)
{
    $this->validate($data, [
        'asset_id' => 'required',
        'quantity' => 'required|numeric',
    ]);

    $user = auth()->user();
    $asset = $this->assetRepository->find($data['asset_id']);

    if (!$asset) {
        throw ValidationException::withMessages(['asset_id' => 'Asset not found']);
    }

    $this->validateAssetTypeQuantity($user->id, $asset->asset_type_id, $data['quantity']);

    $data['user_id'] = $user->id;
    $data['asset_type_id'] = $asset->asset_type_id;

    return $this->requestAssetRepository->create($data);
}

private function validateAssetTypeQuantity($userId, $assetTypeId, $quantity)
{
    if ($assetTypeId == 1 || $assetTypeId == 2) {
        if ($quantity > 1) {
            throw ValidationException::withMessages(['quantity' => 'Quantity must be 1 for this asset type']);
        }
    }

    $userHasAsset = UserHasAsset::where('user_id', $userId)
        ->where('asset_type_id', $assetTypeId)
        ->first();

    if ($userHasAsset && ($userHasAsset->asset_type_id == 1 || $userHasAsset->asset_type_id == 2)) {
        $sumQuantity = $userHasAsset->sum('quantity');

        if ($sumQuantity > 1) {
            throw ValidationException::withMessages(['quantity' => 'You can only have 1 of this asset type']);
        }
    }
}

    public function update($id, $data)
    {
        $this->validate($data, [
            'quantity' => 'required',
        ]);
        return $this->requestAssetRepository->update($id, $data);
    }

    private function validate(array $data, array $rules)
    {
        $validator = \Validator::make($data, $rules);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
    }
}
