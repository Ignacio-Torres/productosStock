@extends('layouts.app')
@section('content')

<table border="1" class="datatable table-striped table-bordered"> 
  <thead>
      <tr>
          <th rowspan="2">Codigo unico</th>
          <th rowspan="2"> Nombre producto</th>
          <th rowspan="2">Categoria</th>
          <th rowspan="2">Descripcion</th>
        @foreach ($sucursales as $sucursal)
          <th colspan="3" scope='colgroup'> Sucursal {{$sucursal->nombre}}</th> 
          @endforeach
          <tr>
          @foreach ($sucursales as $sucursal) 
            <th scope='col'>Cantidad</th>
            <th scope='col'>Precio</th>
            <th scope='col'>Activo</th>
            @endforeach
          </tr>
      </tr>
  </thead>
  <tbody>    
      @foreach ($productos as $producto)
      <tr>
      <td>{{$producto['codigoUnico']}} </td>
      <td>{{$producto['nombre']}}</td>
      <td>{{$producto['nombreCategoria']}}</td>
      <td>{{$producto['descripcion']}}</td>
      @foreach($producto['stock'] as $stock) 
      @foreach ($sucursales as $sucursal)
          @if($stock['idSucursal']==$sucursal['id'])
            <td>{{$stock['cantidad']}}</td>
            <td>{{$stock['precio']}}</td>
            <td>{{($stock['activo']) ? 'True':'False'}}</td>
            <?php;
                array_push($sucursales, $sucursal);?>
            @break
          @else
            <td>--</td>
            <td>--</td>
            <td>--</td>
          @endif
        @endforeach
      @endforeach
          <tr>   
    </tr>
      @endforeach    
  </tbody>
</table>
@endsection