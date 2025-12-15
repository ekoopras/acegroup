<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductLaptop extends Model
{
    protected $fillable = [
        'barang',
        'kondisi',
        'harga',
    ];
}
