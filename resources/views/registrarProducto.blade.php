@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar producto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('productos.store') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="nombreProducto" class="col-md-4 col-form-label text-md-end">{{ __('Nombre del producto') }}</label>
                            <div class="col-md-6">
                                <input id="nombreProducto" type="text" class="form-control @error('nombreProducto') is-invalid @enderror" name="nombreProducto" value="{{ old('nombreProducto') }}" required autofocus>
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
                                <input id="codigoProducto" type="text" class="form-control @error('codigoProducto') is-invalid @enderror" name="codigoProducto" value="{{ old('codigoProducto') }}" required autofocus>
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
                                <select for="categoriaProducto" id="categoriaProducto" name="categoriaProducto" required class="form-select" aria-label="Default select example">
                                    <option selected disabled value="">Seleccionar categoria</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}" >{{$categoria->nombre}}</option>
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
                                <select required for="sucursalProducto" id="sucursalProducto" name="sucursalProducto"  class="form-select" aria-label="Default select example">
                                    <option selected disabled >Seleccionar sucursal</option>
                                        @foreach ($sucursales as $sucursal)
                                            <option value="{{$sucursal->id}}" >{{$sucursal->nombre}}</option>
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
                                <input id="descripcionProducto" type="text" class="form-control @error('descripcionProducto') is-invalid @enderror" name="descripcionProducto" value="{{ old('descripcionProducto') }}" required autofocus>
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
                                <input id="cantidadProducto" type="number" class="form-control @error('cantidadProducto') is-invalid @enderror" name="cantidadProducto" value="{{ old('cantidadProducto') }}" required autofocus>
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
                                <input id="precioProducto" type="number" step="any" class="form-control @error('precioProducto') is-invalid @enderror" name="precioProducto" value="{{ old('precioProducto') }}" required autofocus>
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
                                    {{ __('registrar') }}
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