<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockProducto extends Model
{
    public $timestamps = false;
    protected $table = 'stockproductos';
    protected $primaryKey ='id';

    protected $fillable = [
        'idProducto',
        'idSucursal',
        'cantidad',
        'precio',
        'activo',
    ];
}
