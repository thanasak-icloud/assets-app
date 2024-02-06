<?php

namespace App\Services;

use App\Repositories\RequestAssetsRepository;
use App\Rules\CreateUserAsset;
use Illuminate\Validation\ValidationException;

class RequestAssetsService
{
    protected RequestAssetsRepository $requestAssetRepository;

    public function __construct(RequestAssetsRepository $requestAssetRepository)
    {
        $this->requestAssetRepository = $requestAssetRepository;
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
            'quantity' => 'required',
        ]);
        return $this->requestAssetRepository->create($data);
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
