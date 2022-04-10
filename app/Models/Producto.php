<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey ='id';

    public function sucursal()
    {
        return $this->morphToMany(Sucursal::class, 'productoSucursal_id');
    }
    public function categoria()
    {
        return $this->hasOne(Categoria::class);
    }
}
