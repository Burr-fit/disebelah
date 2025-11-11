<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukBundles extends Model
{
    use HasFactory;

    protected $table = 'produkbundle';
    protected $primaryKey = 'idProdukBundle';
    public $timestamps = true;

    protected $fillable = [
        'idBundle',
        'idProduk',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
