<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Tempats;
use Carbon\Carbon;

class Tempat extends Controller
{
    public function index()
    {
        try {
            return view('Owner/Page/Tempat', [
                'Page'             => '',
                'Gambar'           => '',

            ]);
        } catch (\Throwable $e) {
            Log::channel('daily_custom')->error(
                __FILE__ . ' | ' . __FUNCTION__ . ' | ' . $e->getMessage()
            );

            return view('Owner/Page/500', [
                'Page'              => '500',
            ]);
        }
    }

    public function getData(Request $request)
    {
        try {
            // Ambil semua data dari tabel tempat
            $data = Tempats::select('idTempat', 'nomer', 'link', 'qris')
                ->orderBy('nomer', 'asc')
                ->get();

            // Format hasil untuk Bootstrap Table
            return response()->json([
                'total' => $data->count(),
                'rows'  => $data,
            ]);
        } catch (\Throwable $e) {
            Log::error(__FILE__ . ' | ' . __FUNCTION__ . ' | ' . $e->getMessage());
            return response()->json([
                'total' => 0,
                'rows'  => [],
            ]);
        }
    }

    public function add(Request $request)
    {
        try {
            $request->validate([
                'nomermeja' => 'required|numeric|unique:tempat,nomer',
            ]);

            $nomer = $request->nomermeja;
            $baseUrl = config('app.url');
            $link = "{$baseUrl}/Order/{$nomer}";

            $folderPath = public_path('uploads/qris_meja');
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0775, true);
            }

            $filename = 'QR_MEJA_' . $nomer . '_' . time() . '.svg';
            $filePath = $folderPath . '/' . $filename;

            $svg = QrCode::format('svg')
                ->size(300)
                ->margin(2)
                ->generate($link);

            file_put_contents($filePath, $svg);

            // Simpan ke database
            Tempats::create([
                'nomer'       => $nomer,
                'link'        => $link,
                'qris'        => 'uploads/qris_meja/' . $filename,
                'created_by'  => 'Owner',
                'created_at'  => \Carbon\Carbon::now(),
            ]);

            return response()->json([
                'status'  => 3,
                'message' => "QR (SVG) untuk Meja {$nomer} berhasil dibuat!",
            ]);
        } catch (\Throwable $e) {
            Log::channel('daily_custom')
                ->error(__FILE__ . ' | ' . __FUNCTION__ . ' | ' . $e->getMessage());

            return response()->json([
                'status'  => 0,
                'message' => "Gagal Menambahkan Data",
            ]);
        }
    }

    public function hapus($id)
    {
        try {
            $data = Tempats::find($id);

            if (!$data) {
                return response()->json([
                    'status'  => 0,
                    'message' => 'Data tidak ditemukan.'
                ]);
            }

            if (!empty($data->qris) && file_exists(public_path($data->qris))) {
                unlink(public_path($data->qris));
            }

            $data->delete();

            return response()->json([
                'status'  => 3,
                'message' => "Data Meja {$data->nomer} berhasil dihapus."
            ]);
        } catch (\Throwable $e) {
            Log::channel('daily_custom')->error(
                __FILE__ . ' | ' . __FUNCTION__ . ' | ' . $e->getMessage()
            );

            return response()->json([
                'status'  => 0,
                'message' => 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage(),
            ]);
        }
    }
}
