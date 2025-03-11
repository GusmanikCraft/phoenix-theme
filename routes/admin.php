<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingsController;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/control', [SettingsController::class, 'index'])->name('admin.control');
    Route::post('/settings/update', [SettingsController::class, 'update'])->name('admin.settings.update');
}); 