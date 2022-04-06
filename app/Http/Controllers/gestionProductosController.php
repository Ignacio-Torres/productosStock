<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class gestionProductosController extends Controller
{
    public function consultar(){
        return view('consultarProducto');
    }
    public function mostrarRegistrar(){
        return view('registrarProducto');
    }
    public function registrar(Request $request){
        $data = $request->validate([
            'nombreProducto' => ['required'],
            'codigoProducto' => ['required'],
            'categoriaProducto' => ['required'],
            'sucursalProducto' => ['required'],
            'descripcionProducto' => ['required'],
            'cantidadProducto' => ['required', 'numeric'],
            'precioProducto' => ['required', 'numeric'],
        ]);
        return 'nombre producto: '.$data['nombreProducto'].'<br>codigo Producto: '.$data['codigoProducto'].'<br>Categoria Producto: '.$data['categoriaProducto'].'<br>sucursal Producto: '.$data['sucursalProducto'].'<br>Descripcion producto: '.$data['descripcionProducto'].'<br>cantidad Producto: '.$data['cantidadProducto'].'<br>Precio producto: '.$data['precioProducto'];
    }
    public function actualizar(){
        return view('actualizarProducto');
    }
    public function eliminar(){
        return view('eliminarProducto');
    }
}
