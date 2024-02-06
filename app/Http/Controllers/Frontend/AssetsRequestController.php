<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\AssetService;
use App\Services\RequestAssetsService;
use Illuminate\Http\Request;

class AssetsRequestController extends Controller
{
    protected $requestAssetsService;
    protected $AssetsService;

    public function __construct(RequestAssetsService $requestAssetsService, AssetService $AssetsService)
    {
        $this->AssetsService = $AssetsService;
        $this->requestAssetsService = $requestAssetsService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requestAssets = $this->requestAssetsService->getOwnAssets();
        return view('assets-request.index', compact('requestAssets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $assetType = $this->AssetsService->getType();
        $asset = $this->AssetsService->getAll();
        return view('assets-request.create', compact('assetType','asset'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->requestAssetsService->store($request->all());
            return redirect()->route('user.assetrequest.index')->with('success', 'Request assets successfully');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
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
        //
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
