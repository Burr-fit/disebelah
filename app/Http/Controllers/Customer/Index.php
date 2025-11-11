<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
// use App\Models\AnggotaKomisis;

class Index extends Controller
{
    public function HalamanUtama()
    {
        try {            
            return view('Customer/Page/HalamanUtama', [
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