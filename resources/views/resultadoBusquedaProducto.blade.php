@extends('layouts.app')
@section('content')
<div class="text-center">
    <h4>Resultados</h4>
</div>
<br>
    <div>
        @foreach ($productos as $producto)
            <div class="card">
                <div class="card-header">
                    <h5><b>{{ $producto['nombre'] }} </b></h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <h6>Categoria: {{$producto['nombreCategoria']}}</h6>
                        <h6>Descripcion: {{$producto['descripcion']}}</h6>
                        <h6>Codigo unico: {{$producto['codigoUnico']}}</h6>
                    </div>
                    <h5>Stock: </h5>
                    <div class="row">
                        <table class="table table-hover text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th>Sucursal</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th >Activo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($producto['stock'] as $stock)
                                    <tr>
                                        <td> {{$stock['nombreSucursal']}} </td>
                                        <td>{{ $stock['cantidad']}}</td>
                                        <td>{{ $stock['precio'] }}</td>
                                        <td>{{($stock['activo'])?"True":"False"}}  </td>
                                         <td><a href = "{{route('productos.edit', $stock['id'])}}" target="_blank" class="btn btn-outline-primary">Editar</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            
        @endforeach
    </div>
@endsection
