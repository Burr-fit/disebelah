<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produks extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'idProduk';
    public $timestamps = true;

    protected $fillable = [
        'idKatagori',
        'nama',
        'harga',
        'gambar',
        'vidio',
        'status',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
