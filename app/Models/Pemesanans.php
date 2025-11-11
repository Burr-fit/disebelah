<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanans extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';
    protected $primaryKey = 'idPemesanan';
    public $timestamps = true;

    protected $fillable = [
        'idCustomer',
        'idTempat',
        'tanggalPemesanan',
        'totalHarga',
        'statusPemesanan',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
