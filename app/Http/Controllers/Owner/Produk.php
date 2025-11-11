<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
// use App\Models\AnggotaKomisis;

class Produk extends Controller
{
    public function index()
    {
        try {
            return view('Owner/Page/Dashboard', [
                'Page'             => '',
                'Gambar'           => '',

            ]);
        } catch (\Throwable $e) {
            Log::channel('daily_custom')->error(
                __FILE__ . ' | ' . __FUNCTION__ . ' | ' . $e->getMessage()
            );

            return view('DPRD/page/500', [
                'Page'              => '500',
            ]);
        }
    }
}
