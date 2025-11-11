<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bundles extends Model
{
    use HasFactory;

    protected $table = 'bundle';
    protected $primaryKey = 'idBundle';
    public $timestamps = true;

    protected $fillable = [
        'idKatagori',
        'namaBundle',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
