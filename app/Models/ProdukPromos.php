<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukPromos extends Model
{
    use HasFactory;

    protected $table = 'produkpromo';
    protected $primaryKey = 'idProdukPromo';
    public $timestamps = true;

    protected $fillable = [
        'idPromo',
        'idProduk',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
