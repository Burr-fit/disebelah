<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Owner\{
    Dashboard,
};

Route::prefix('Owner')->group(function () {

    Route::get('/', [Dashboard::class, 'index']);
});
