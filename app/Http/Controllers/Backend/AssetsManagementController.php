<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\User;
use App\Services\RequestAssetsService;
use Illuminate\Http\Request;
use App\Services\AssetService;

class AssetsManagementController extends Controller
{
    protected $assetService;
    protected $requestAssetsService;

    public function __construct(
        AssetService $assetService,
        RequestAssetsService $requestAssetsService
    ) {
        $this->assetService = $assetService;
        $this->requestAssetsService = $requestAssetsService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assetRequests = $this->requestAssetsService->getAll();
        $assets = $this->assetService->getAll();
        return view('backend.assets.index', compact(['assetRequests', 'assets']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.assets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $assetRequest = $request->input('asset');

        if ($assetRequest) {
            $asset = $this->assetService->store($assetRequest);
            return response()->json($asset);
        } else {
            return response()->json(['message' => 'Asset request is empty']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.assets.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
