<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahans extends Model
{
    use HasFactory;

    protected $table = 'bahan';
    protected $primaryKey = 'idBahan';
    public $timestamps = true;

    protected $fillable = [
        'namaBahan',
        'jumlah',
        'idSatuan',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
