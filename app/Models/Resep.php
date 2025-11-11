<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $table = 'resep';
    protected $primaryKey = 'idResep';
    public $timestamps = true;

    protected $fillable = [
        'idKatagori',
        'idProduk',
        'idBahan',
        'jumlah',
        'idSatuan',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
