@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Actualizar producto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('productos.update',$stock['id']) }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="nombreProducto" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del producto') }}</label>
                            <div class="col-md-6">
                                <input id="nombreProducto" type="text" class="form-control @error('nombreProducto') is-invalid @enderror" name="nombreProducto" value="{{$producto['nombre']}}" required autofocus>
                                @error('nombreProducto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="codigoProducto" class="col-md-4 col-form-label text-md-end">{{ __('Codigo unico del producto') }}</label>
                            <div class="col-md-6">
                                <input id="codigoProducto" type="text" class="form-control @error('codigoProducto') is-invalid @enderror" name="codigoProducto" value="{{ $producto['codigoUnico'] }}" required autofocus readonly>
                                @error('codigoProducto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="categoriaProducto" class="col-md-4 col-form-label text-md-end">{{ __('Categoria del producto') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" aria-label="Default select example">
                                    @foreach ($categorias as $categoria)
                                    @if ($categoria['id']==$producto['idCategoria'])
                                        <option selected value="{{$categoria->id}}" >{{$categoria->nombre}}</option>
                                    @endif 
                                    @endforeach
                                  </select>
                                @error('categoriaProducto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="sucursalProducto" class="col-md-4 col-form-label text-md-end">{{ __('Sucursal donde se encuentra el producto') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" aria-label="Default select example">
                                    @foreach ($sucursales as $sucursal)
                                    @if ($sucursal['id']==$stock['idSucursal'])
                                        <option selected value="{{$sucursal->id}}" >{{$sucursal->nombre}}</option>
                                    @endif
                                        
                                    @endforeach
                                  </select>
                                @error('sucursalProducto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="descripcionProducto" class="col-md-4 col-form-label text-md-end">{{ __('Descripcion del producto') }}</label>
                            <div class="col-md-6">
                                <input id="descripcionProducto" type="text" class="form-control @error('descripcionProducto') is-invalid @enderror" name="descripcionProducto" value="{{$producto['descripcion']}}" required autofocus>
                                @error('descripcionProducto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="cantidadProducto" class="col-md-4 col-form-label text-md-end">{{ __('Cantidad del producto') }}</label>
                            <div class="col-md-6">
                                <input id="cantidadProducto" type="number" class="form-control @error('cantidadProducto') is-invalid @enderror" name="cantidadProducto" value="{{ $stock['cantidad'] }}" required autofocus readonly>
                                @error('cantidadProducto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="precioProducto" class="col-md-4 col-form-label text-md-end">{{ __('Precio del producto') }}</label>
                            <div class="col-md-6">
                                <input id="precioProducto" type="number" step="any" class="form-control @error('precioProducto') is-invalid @enderror" name="precioProducto" value="{{ $stock['precio'] }}" required autofocus>
                                @error('precioProducto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection