<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promos extends Model
{
    use HasFactory;

    protected $table = 'promo';
    protected $primaryKey = 'idPromo';
    public $timestamps = true;

    protected $fillable = [
        'idKatagori',
        'namaPromo',
        'jenisDiskon',
        'nilaiDiskon',
        'tanggalMulai',
        'tanggalSelesai',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
