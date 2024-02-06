<?php

use App\Http\Controllers\Backend\AssetsManagementController;
use App\Http\Controllers\Frontend\AssetsRequestController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/asset', [AssetsManagementController::class, 'index'])->name('admin.asset.index');
    Route::get('/asset/create', [AssetsManagementController::class, 'create'])->name('admin.asset.create');
    Route::post('/asset', [AssetsManagementController::class, 'store'])->name('admin.asset.store');
    Route::get('/asset/{asset}', [AssetsManagementController::class, 'show'])->name('admin.asset.show');
    Route::get('/asset/{asset}', [AssetsManagementController::class, 'edit'])->name('admin.asset.edit');
    Route::patch('/asset/{asset}', [AssetsManagementController::class, 'update'])->name('admin.asset.update');
    Route::delete('/asset/{asset}', [AssetsManagementController::class, 'destroy'])->name('admin.asset.destroy');
});

Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/asset-request', [AssetsRequestController::class, 'index'])->name('user.assetrequest.index');
    Route::get('/asset-request/create', [AssetsRequestController::class, 'create'])->name('user.assetrequest.create');
    Route::post('/asset-request', [AssetsRequestController::class, 'store'])->name('user.assetrequest.store');
});

require __DIR__ . '/auth.php';
