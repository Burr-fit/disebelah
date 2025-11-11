<?php

use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\Owner\{
    Dashboard,
    Tempat
};

Route::prefix('Owner')->group(function () {

    Route::get('/', [Dashboard::class, 'index']);
    Route::get('Tempat', [Tempat::class, 'index']);
    Route::get('get-tempat', [Tempat::class, 'getData']);
    Route::post('add-meja', [Tempat::class, 'add']);
    Route::post('hapus-meja/{id}', [Tempat::class, 'hapus']);

    Route::get('/test-qr', function () {
        $svg = QrCode::format('svg')->size(200)->generate('https://google.com');
        return response($svg)->header('Content-Type', 'image/svg+xml');
    });
});
