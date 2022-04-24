<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $timestamps = false;
    protected $table = 'productos';
    protected $primaryKey ='id';
    protected $fillable = [
        'codigoUnico',
        'nombre',
        'idCategoria',
        'descripcion',
    ];
    public function sucursal()
    {
        return $this->morphToMany(Sucursal::class, 'productoSucursal_id');
    }
    public function categoria()
    {
        return $this->hasOne(Categoria::class);
    }
}
