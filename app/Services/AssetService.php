<?php

namespace App\Services;

use App\Repositories\AssetRepository;
use Illuminate\Validation\ValidationException;

class AssetService
{
    protected AssetRepository $assetRepository;

    public function __construct(AssetRepository $assetRepository)
    {
        $this->assetRepository = $assetRepository;
    }

    public function getAll()
    {
        return $this->assetRepository->getAll();
    }

    public function getType()
    {
        return $this->assetRepository->getType();
    }

    public function store(array $data)
    {
        $this->validate($data, [
            'name' => 'required',
            'description' => 'nullable',
            'asset_type_id' => 'required',
            'price' => 'nullable|numeric',
        ]);
        return $this->assetRepository->create($data);
    }

    public function update(array $data, $id)
    {
        $this->validate($data, [
            'name' => 'required',
            'description' => 'nullable',
            'asset_type_id' => 'required',
            'price' => 'nullable|numeric',
        ]);
        return $this->assetRepository->update($data, $id);
    }

    private function validate(array $data, array $rules)
    {
        $validator = \Validator::make($data, $rules);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
    }
}
