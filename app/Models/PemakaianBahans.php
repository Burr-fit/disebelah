<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemakaianBahans extends Model
{
    use HasFactory;

    protected $table = 'pemakaianbahan';
    protected $primaryKey = 'idPemakaian';
    public $timestamps = true;

    protected $fillable = [
        'idBahan',
        'tanggalPemakaian',
        'jumlah',
        'idSatuan',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
