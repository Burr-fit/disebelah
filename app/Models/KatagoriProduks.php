<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KatagoriProduks extends Model
{
    use HasFactory;

    protected $table = 'katagoriproduk';
    protected $primaryKey = 'idKatagori';
    public $timestamps = true;

    protected $fillable = [
        'namaKatagori',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
