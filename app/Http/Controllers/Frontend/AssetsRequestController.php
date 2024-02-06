<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\RequestAssetsService;
use Illuminate\Http\Request;

class AssetsRequestController extends Controller
{
    protected $requestAssetsService;

    public function __construct(RequestAssetsService $requestAssetsService)
    {
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
        return view('assets-request.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->requestAssetsService->store($request->all());
            return redirect()->route('user.assetrequest.index')->with('success', 'Request assets successfully');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
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
