<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $table = 'customer';
    protected $primaryKey = 'idCustomer';
    public $timestamps = true;

    protected $fillable = [
        'nama',
        'email',
        'password',
        'noTelphone',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
