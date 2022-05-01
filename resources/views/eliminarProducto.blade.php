@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Desactivar productos') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('productos.desactivar') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="opcionBuscar" class="col-md-4 col-form-label text-md-end">{{ __('Sucursal/es') }}</label>
                            <div class="col-md-6">
                                <select for="opcionBuscar" id="opcionBuscar" name="opcionBuscar" required class="form-select" aria-label="Default select example">
                                    <option selected disabled >Seleccionar sucursal</option>
                                    <option value="all" >Todas las sucursales</option>
                                        @foreach ($sucursales as $sucursal)
                                            <option value="{{$sucursal->id}}" >{{$sucursal->nombre}}</option>
                                        @endforeach                                
                                  </select>
                                @error('opcionBuscar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        
                        <div class="row mb-3">
                            <label for="opcionBuscar" class="col-md-4 col-form-label text-md-end">{{ __('Codigo Producto') }}</label>
                            <div class="col-md-6">
                                <input id="textoBuscar" type="text" class="form-control @error('textoBuscar') is-invalid @enderror" name="textoBuscar" value="{{ old('textoBuscar') }}" required autofocus>
                                @error('textoBuscar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Desactivar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Eliminar productos') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('productos.delete') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="opcionBuscar" class="col-md-4 col-form-label text-md-end">{{ __('Sucursal/es') }}</label>
                            <div class="col-md-6">
                                <select for="opcionBuscar" id="opcionBuscar" name="opcionBuscar" required class="form-select" aria-label="Default select example">
                                    <option selected disabled >Seleccionar sucursal</option>
                                    <option value="all" >Todas las sucursales</option>
                                        @foreach ($sucursales as $sucursal)
                                            <option value="{{$sucursal->id}}" >{{$sucursal->nombre}}</option>
                                        @endforeach                                
                                  </select>
                                @error('opcionBuscar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        
                        <div class="row mb-3">
                            <label for="opcionBuscar" class="col-md-4 col-form-label text-md-end">{{ __('Codigo Producto') }}</label>
                            <div class="col-md-6">
                                <input id="textoBuscar" type="text" class="form-control @error('textoBuscar') is-invalid @enderror" name="textoBuscar" value="{{ old('textoBuscar') }}" required autofocus>
                                @error('textoBuscar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Eliminar') }}
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