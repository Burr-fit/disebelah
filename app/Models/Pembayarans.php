<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayarans extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $primaryKey = 'idPembayaran';
    public $timestamps = true;

    protected $fillable = [
        'idPemesanan',
        'tanggalBayar',
        'metode',
        'jumlah',
        'status',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
