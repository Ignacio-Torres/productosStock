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
      @foreach ($sucursales as $sucursal)
        @if($producto['stock'][0]['idSucursal']==$sucursal['id'])
          <td>{{$producto['stock'][0]['cantidad']}}</td>
          <td>{{$producto['stock'][0]['precio']}}</td>
          <td>{{($producto['stock'][0]['activo']) ? 'True':'False';}}</td>
        @else
          <td>--</td>
          <td>--</td>
          <td>--</td>
        @endif
      @endforeach
          <tr>   
    </tr>
      @endforeach    
  </tbody>
</table>
@endsection