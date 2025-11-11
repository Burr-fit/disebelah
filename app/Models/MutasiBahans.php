<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutasiBahans extends Model
{
    use HasFactory;

    protected $table = 'mutasibahan';
    protected $primaryKey = 'idMutasi';
    public $timestamps = true;

    protected $fillable = [
        'idBahan',
        'tanggalMutasi',
        'jenisMutasi',
        'jumlah',
        'stokawal',
        'stokAkhir',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
