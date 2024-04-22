<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\VendorController;

// VENDOR ROUTE
Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');