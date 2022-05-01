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
        $sucursalesAlt = Sucursal::all();
        return view('consultarProducto', compact('categorias','sucursales','sucursalesAlt'));
    }
    public function consultar(Request $request){        
        $sucursales = Sucursal::all();
        $sucursalesAlt = Sucursal::all();
        $data = $request->validate([
            'opcionBuscar' => ['required'],
            'textoBuscar' => ['required','max:255'],
        ]);
        switch ($data['opcionBuscar']) {
            case "0":
                $categoria=Categoria::where('nombre',$data['textoBuscar'])->first();
                $productos=Producto::where('idCategoria',$categoria['id'])->get(); 
                              
                foreach($productos as $producto){
                    $stockProducto = StockProducto::where('idproducto',$producto['id'])->get();
                    
                    foreach($stockProducto as $item){
                        $item['nombreSucursal'] = Sucursal::find($item['idSucursal'])['nombre'];
                    }
                    $producto['stock'] = $stockProducto;
                    $producto['nombreCategoria'] = $categoria['nombre'];
                }                
                break;
            case "1":   
                $productos = [];             
                $producto=Producto::where('nombre',$data['textoBuscar'])->first(); 
                $categoria=Categoria::find($producto['idCategoria'])['nombre'];               
                $stockProducto = StockProducto::where('idproducto',$producto['id'])->get();
                
                foreach($stockProducto as $item){
                    $item['nombreSucursal'] = Sucursal::find($item['idSucursal'])['nombre'];
                }
                $producto['stock'] = $stockProducto;
                $producto['nombreCategoria'] = $categoria;
                array_push($productos,$producto);
                break;
            case "2":
                $sucursal=Sucursal::where('nombre',$data['textoBuscar'])->first();
                $stockProducto = StockProducto::where('idSucursal',$sucursal['id'])->get();                
                $productos = [];                
                foreach($stockProducto as $item){
                    $stock=[];
                    $producto = Producto::find($item['idproducto']);                     
                    $categoria=Categoria::find($producto['idCategoria']);                     
                    $item['nombreSucursal'] = $sucursal['nombre'];
                    array_push($stock,$item);                
                    $producto['stock'] = $stock; 
                    $producto['nombreCategoria'] = $categoria['nombre'];
                    array_push($productos,$producto);       
                }    
                break;
            $sucursales = Sucursal::all();
            
        }
        return view('resultadoBusquedaProducto',compact('productos','sucursales','sucursalesAlt'));
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
    public function eliminar(){
        $categorias = Categoria::all();
        $sucursales = Sucursal::all();
        return view('eliminarProducto', compact('categorias','sucursales'));
    }
    public function desactivar(Request $request){
        $data = $request->validate([
            'opcionBuscar' => ['required'],
            'textoBuscar' => ['required','max:255'],
        ]);
        if($data['opcionBuscar']=="all"){
            $sucursales = Sucursal::all();
        }
        else{
            $sucursales=[];
            $sucursal = Sucursal::where('id',$data['opcionBuscar'])->first();
            array_push($sucursales,$sucursal);
        }
        $productos = [];    
        $producto = "";         
        $producto=Producto::where('codigoUnico',$data['textoBuscar'])->first();
        if($producto !="null" && $producto!="" && $producto!=null){ 
            foreach($sucursales as $sucursal){ 
                $stockProducto = StockProducto::where('idSucursal',$sucursal['id'])->get(); 
                $productos = [];                
                foreach($stockProducto as $item){
                    $stock=[];
                    if($item['idproducto']==$producto['id']){
                        $item->activo = 0;
                        $item->save();
                    }                    
                    $producto = Producto::find($item['idproducto']);                     
                    $categoria=Categoria::find($producto['idCategoria']);                     
                    $item['nombreSucursal'] = $sucursal['nombre'];                    
                    array_push($stock,$item);                
                    $producto['stock'] = $stock; 
                    $producto['nombreCategoria'] = $categoria['nombre'];
                    array_push($productos,$producto);
                }
            }           
            
            return view('resultadoBusquedaProducto',compact('productos','sucursales'));
        } 
          
        return view('resultadoBusquedaProducto',compact('productos','sucursales'));
    }
    public function delete(Request $request){
        $data = $request->validate([
            'opcionBuscar' => ['required'],
            'textoBuscar' => ['required','max:255'],
        ]);
        if($data['opcionBuscar']=="all"){
            $sucursales = Sucursal::all();
        }
        else{
            $sucursales=[];
            $sucursal = Sucursal::where('id',$data['opcionBuscar'])->first();
            array_push($sucursales,$sucursal);
        }
        $productos = [];    
        $producto = "";         
        $producto=Producto::where('codigoUnico',$data['textoBuscar'])->first();
        
        if($producto !="null" && $producto!="" && $producto!=null){ 
            foreach($sucursales as $sucursal){ 
                $stockProducto = StockProducto::where('idSucursal',$sucursal['id'])->get(); 
                $productos = [];                
                foreach($stockProducto as $item){
                    $stock=[];
                    if($item['idproducto']==$producto['id']){
                        $item->delete();
                    }                    
                    $producto = Producto::find($item['idproducto']);                     
                    $categoria=Categoria::find($producto['idCategoria']);                     
                    $item['nombreSucursal'] = $sucursal['nombre'];                    
                    array_push($stock,$item);                
                    $producto['stock'] = $stock; 
                    $producto['nombreCategoria'] = $categoria['nombre'];
                    array_push($productos,$producto);
                }
            }
            if($data['opcionBuscar']=="all"){
                $productoBorrar=Producto::where('codigoUnico',$data['textoBuscar'])->first();
                $productoBorrar->delete();
            }      
            return view('resultadoBusquedaProducto',compact('productos','sucursales'));
        } 
        return view('resultadoBusquedaProducto',compact('productos','sucursales'));
    }
}