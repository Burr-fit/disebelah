<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tempats extends Model
{
    use HasFactory;

    protected $table = 'tempat';
    protected $primaryKey = 'idTempat';
    public $timestamps = true;

    protected $fillable = [
        'nomer',
        'link',
        'qris',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
