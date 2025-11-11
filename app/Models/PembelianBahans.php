<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianBahans extends Model
{
    use HasFactory;

    protected $table = 'pembelianbahan';
    protected $primaryKey = 'idPembelian';
    public $timestamps = true;

    protected $fillable = [
        'idBahan',
        'tanggalPembelian',
        'jumlah',
        'idSatuan',
        'hargaSatuan',
        'totalHarga',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
