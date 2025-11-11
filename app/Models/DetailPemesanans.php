<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemesanans extends Model
{
    use HasFactory;

    protected $table = 'detailpemesanan';
    protected $primaryKey = 'idDetail';
    public $timestamps = true;

    protected $fillable = [
        'idPemesanan',
        'idProduk',
        'idPromo',
        'idBundle',
        'jumlah',
        'hargaSatuan',
        'subTotal',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
