<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\{
    Index,
};

Route::prefix('/')->group(function () {

    Route::get('/', [Index::class, 'HalamanUtama']);
    Route::get('Order', [Index::class, 'Produk']);
    Route::get('Order/{id}', [Index::class, 'Produkid']);
});
