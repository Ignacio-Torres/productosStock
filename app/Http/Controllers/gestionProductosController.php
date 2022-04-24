<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Sucursal;
use App\Models\Producto;
use App\Models\StockProducto;

class gestionProductosController extends Controller
{
    public function buscar(){
        $categorias = Categoria::all();
        $sucursales = Sucursal::all();
        return view('consultarProducto', compact('categorias','sucursales'));
    }
    public function mostrarResultadoBusqueda(Request $request){

        return view();
    }
    public function create(){
        $categorias = Categoria::all();
        $sucursales = Sucursal::all();
        return view('registrarProducto', compact('categorias','sucursales'));
    }
    public function store(Request $request){
        
            $data = $request->validate([
                'nombreProducto' => ['required','unique:productos,nombre'],
                'codigoProducto' => ['required','unique:productos,codigoUnico'],
                'categoriaProducto' => ['required'],
                'sucursalProducto' => ['required'],
                'descripcionProducto' => ['required'],
                'cantidadProducto' => ['required', 'numeric'],
                'precioProducto' => ['required', 'numeric'],
            ]);
        $producto = Producto::create([
            'nombre' => $data['nombreProducto'],
            'codigoUnico' => $data['codigoProducto'],
            'idCategoria' => $data['categoriaProducto'],
            'descripcion' => $data['descripcionProducto'],
        ]);
        $stockProducto = StockProducto::create([
            'idProducto' => $producto->id,
            'idSucursal' => $data['sucursalProducto'],
            'cantidad' => $data['cantidadProducto'],
            'precio' => $data['precioProducto'],
            'activo' =>1,
        ]);
        return redirect()->route('productos.create')->with('success', 'a');
    }

    public function edit(){
        return view('actualizarProducto');
    }
    public function desactivar(){
        return view('eliminarProducto');
    }
}