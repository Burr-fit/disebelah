<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuans extends Model
{
    use HasFactory;

    protected $table = 'satuan';
    protected $primaryKey = 'idSatuan';
    public $timestamps = true;

    protected $fillable = [
        'namaSatuan',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
