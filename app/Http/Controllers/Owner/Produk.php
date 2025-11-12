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

            return view('Owner/page/500', [
                'Page'              => '500',
            ]);
        }
    }

    public function getKatagoriProduk(Request $request)
    {
        try {
            // Ambil semua data dari tabel tempat
            $data = KatagoriProduks::all();

            // Format hasil untuk Bootstrap Table
            return response()->json([
                'total' => $data->count(),
                'rows'  => $data,
            ]);
        } catch (\Throwable $e) {
            Log::error(__FILE__ . ' | ' . __FUNCTION__ . ' | ' . $e->getMessage());
            return response()->json([
                'total' => 100,
                'rows'  => [],
            ]);
        }
    }

    public function addKatagoriProduk(Request $request)
    {
        try {
            $request->validate([
                'namaKatagori'  => 'required|string',
            ]);

            $data = new KatagoriProduks();
            $data->namaKatagori     = strip_tags($request->input('namaKatagori'));
            $data->created_at        = now();
            $data->created_by        = "Owner";
            $data->save();

            return response()->json([
                'status'  => 3,
                'message' => 'Katagori produk berhasil ditambahkan.'
            ]);
        } catch (\Throwable $e) {
            Log::error(__FILE__ . ' | ' . __FUNCTION__ . ' | ' . $e->getMessage());
            return response()->json([
                'status'  => 0,
                'message' => 'Gagal menambahkan katagori produk.'
            ]);
        }
    }

    public function hapusKatagoriProduk($id)
    {
        try {
            $data = KatagoriProduks::find($id);
            if ($data) {
                $data->delete();
                return response()->json([
                    'status'  => 3,
                    'message' => "Data Berhasil Dihapus",
                ]);
            } else {
                return response()->json([
                    'status'  => 0,
                    'message' => 'Katagori produk tidak ditemukan.'
                ]);
            }
        } catch (\Throwable $e) {
            Log::error(__FILE__ . ' | ' . __FUNCTION__ . ' | ' . $e->getMessage());
            return response()->json([
                'status'  => 0,
                'message' => 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage(),
            ]);
        }
    }
    // End Katagori Produk

    // Start Daftar Produk
    public function DaftarProduk()
    {
        try {
            $katagori = KatagoriProduks::all();
            return view('Owner/Page/Produk', [
                'Page'             => '',
                'katagori'        => $katagori,
                'Gambar'           => '',

            ]);
        } catch (\Throwable $e) {
            Log::channel('daily_custom')->error(
                __FILE__ . ' | ' . __FUNCTION__ . ' | ' . $e->getMessage()
            );

            return view('Owner/page/500', [
                'Page'              => '500',
            ]);
        }
    }

    public function getProduk(Request $request)
    {
        try {
            $data = Produks::with(['Kat'])->get();

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

    public function addProduk(Request $request)
    {
        try {
            $request->validate([
                'idKatagori'        => 'required|numeric',
                'namaProduk'        => 'required|string',
                'hargaProduk'       => 'required|numeric|min:0',
                'deskripsiProduk'   => 'nullable|string',
                'gambar'            => 'nullable|image|mimetypes:image/jpeg,image/jpg,image/png|max:20480',
                'status'            => 'required|in:Publish,UnPublish',
            ]);

            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $filePath = 'uploads/produk/';
                $fullpath = $filePath . '/' . $filename;
                $file->move(public_path($filePath), $filename);
            } else {
                $filename = null;
            }

            $data = new Produks();
            $data->idKatagori       = strip_tags($request->input('idKatagori'));
            $data->nama             = strip_tags($request->input('namaProduk'));
            $data->harga            = strip_tags($request->input('hargaProduk'));
            $data->deskripsi        = $request->input('deskripsiProduk');
            $data->gambar           = $fullpath;
            $data->status           = strip_tags($request->input('status'));
            $data->created_at       = now();
            $data->created_by       = "Owner";
            $data->save();

            return response()->json([
                'status'  => 3,
                'message' => 'Produk berhasil ditambahkan.'
            ]);
        } catch (\Throwable $e) {
            Log::error(__FILE__ . ' | ' . __FUNCTION__ . ' | ' . $e->getMessage());
            return response()->json([
                'status'  => 0,
                'message' => 'Gagal menambahkan produk.'
            ]);
        }
    }

    public function statusProduk(Request $request)
    {
        try {
            $id         = strip_tags($request->input('id'));
            $is_active  = strip_tags($request->input('is_active'));

            $data = Produks::findOrFail($id);
            $data->status = $is_active;
            $data->save();

            return response()->json([
                'status' => 1,
                'message' => 'Status berhasil diperbarui.',
            ]);
        } catch (\Throwable $e) {
            Log::channel('daily_custom')->error(
                __FILE__ . ' | ' . __FUNCTION__ . ' | ' . $e->getMessage()
            );

            return response()->json([
                'status'  => 0,
                'message' => 'Gagal Mangupdate Data'
            ], 500);
        }
    }

    public function hapusProduk($id)
    {
        try {
            $data = Produks::find($id);
            if ($data) {

                if (!empty($data->gambar) && file_exists(public_path($data->gambar))) {
                    unlink(public_path($data->gambar));
                }

                $data->delete();
                return response()->json([
                    'status'  => 3,
                    'message' => 'Produk berhasil dihapus.'
                ]);
            } else {
                return response()->json([
                    'status'  => 0,
                    'message' => 'Produk tidak ditemukan.'
                ]);
            }
        } catch (\Throwable $e) {
            Log::error(__FILE__ . ' | ' . __FUNCTION__ . ' | ' . $e->getMessage());
            return response()->json([
                'status'  => 0,
                'message' => 'Gagal menghapus produk.'
            ]);
        }
    }
    // End Daftar Produk

    // Start Resep Produk
    public function ResepProduk()
    {
        try {
            return view('Owner/Page/ProdukResep', [
                'Page'             => '',
                'Gambar'           => '',

            ]);
        } catch (\Throwable $e) {
            Log::channel('daily_custom')->error(
                __FILE__ . ' | ' . __FUNCTION__ . ' | ' . $e->getMessage()
            );

            return view('Owner/page/500', [
                'Page'              => '500',
            ]);
        }
    }

    public function getResepProduk(Request $request)
    {
        try {
            // Ambil semua data dari tabel resep
            $data = Reseps::all();

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

    public function addResepProduk(Request $request)
    {
        try {
            $request->validate([
                'idKatagori'    => 'required|numeric',
                'idProduk'      => 'required|numeric',
                'idBahan'       => 'required|numeric',
                'jumlah'        => 'required|numeric|min:0',
                'idSatuan'      => 'required|numeric',
            ]);

            // Simpan data resep produk
            Reseps::create([
                'idKatagori'    => $request->input('idKatagori'),
                'idProduk'      => $request->input('idProduk'),
                'idBahan'       => $request->input('idBahan'),
                'jumlah'        => $request->input('jumlah'),
                'idSatuan'      => $request->input('idSatuan'),
            ]);

            return response()->json(['status'  => 3, 'message' => 'Resep produk berhasil ditambahkan.']);
        } catch (\Throwable $e) {
            Log::error(__FILE__ . ' | ' . __FUNCTION__ . ' | ' . $e->getMessage());
            return response()->json(['status'  => 0, 'message' => 'Gagal menambahkan resep produk.']);
        }
    }

    public function hapusResepProduk($id)
    {
        try {
            $data = Reseps::find($id);
            if ($data) {
                $data->delete();
                return response()->json(['status'  => 3, 'message' => 'Resep produk berhasil dihapus.']);
            } else {
                return response()->json(['status'  => 0, 'message' => 'Resep produk tidak ditemukan.']);
            }
        } catch (\Throwable $e) {
            Log::error(__FILE__ . ' | ' . __FUNCTION__ . ' | ' . $e->getMessage());
            return response()->json(['status'  => 0, 'message' => 'Gagal menghapus resep produk.']);
        }
    }
    // End Resep Produk
}
