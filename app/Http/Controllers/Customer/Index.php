<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\KatagoriProduks;
use App\Models\Produks;
use App\Models\Customers;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class Index extends Controller
{
    public function HalamanUtama()
    {
        try {
            $katagori_produks = KatagoriProduks::with('produks')->get();
            $produks = Produks::all();

            return view('Customer/Page/HalamanUtama', [
                'Page'             => '',
                'katagori_produks' => $katagori_produks,
                'produks'          => $produks,
                'Gambar'           => '',
            ]);
        } catch (\Throwable $e) {
            Log::channel('daily_custom')->error(
                __FILE__ . ' | ' . __FUNCTION__ . ' | ' . $e->getMessage()
            );

            return view('Customer/page/500', [
                'Page'              => '500',
            ]);
        }
    }

    public function Produk()
    {
        try {
            $katagori_produks = KatagoriProduks::with('produks')->get();
            $produks = Produks::all();
            return view('Customer/Page/Produk', [
                'Page'             => '',
                'katagori_produks' => $katagori_produks,
                'produks'          => $produks,
                'Gambar'           => '',
                'Meja'             => '',

            ]);
        } catch (\Throwable $e) {
            Log::channel('daily_custom')->error(
                __FILE__ . ' | ' . __FUNCTION__ . ' | ' . $e->getMessage()
            );

            return view('Customer/page/500', [
                'Page'              => '500',
            ]);
        }
    }

    public function Produkid($id)
    {
        try {
            $katagori_produks = KatagoriProduks::with('produks')->get();
            $produks = Produks::all();
            return view('Customer/Page/Produk', [
                'Page'             => '',
                'katagori_produks' => $katagori_produks,
                'produks'          => $produks,
                'Gambar'           => '',
                'Meja'             => $id,

            ]);
        } catch (\Throwable $e) {
            Log::channel('daily_custom')->error(
                __FILE__ . ' | ' . __FUNCTION__ . ' | ' . $e->getMessage()
            );

            return view('Customer/page/500', [
                'Page'              => '500',
            ]);
        }
    }

    public function googleLogin(Request $request)
    {
        $email = $request->email;
        $name = $request->name;

        // Cek apakah user sudah ada
        $user = Customers::where('email', $email)->first();

        if ($user) {
            // Jika sudah ada, update status login
            $user->update(['last_login' => Carbon::now()]);
            return response()->json([
                'status' => 'success',
                'message' => 'User already registered',
                'data' => $user
            ]);
        }

        // Jika belum ada, buat baru
        $user = Customers::create([
            'name' => $name,
            'email' => $email,
            'no_telephone' => null,
            'password' => Hash::make(str()->random(12)),
            'created_at' => now(),
            'created_by' => 'GoogleAuth'
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User registered successfully',
            'data' => $user
        ]);
    }
}
