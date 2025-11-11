<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\{
    Index,
};

Route::prefix('/')->group(function () {

    Route::get('/', [Index::class, 'HalamanUtama']);
});
