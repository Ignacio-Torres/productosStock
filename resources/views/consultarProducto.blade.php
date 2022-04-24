@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Buscar producto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('productos.consultar') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="opcionBuscar" class="col-md-4 col-form-label text-md-end">{{ __('Buscar por: ') }}</label>
                            <div class="col-md-6">
                                <select for="opcionBuscar" id="opcionBuscar" name="opcionBuscar" required class="form-select" aria-label="Default select example">
                                    <option selected disabled value="">Seleccionar</option>
                                    <option value="0" >Categoria</option>    
                                    <option value="1" >Nombre</option> 
                                    <option value="2" >Sucursal</option>                                 
                                  </select>
                                @error('opcionBuscar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                        
                        <div class="row mb-3">
                            <label for="opcionBuscar" class="col-md-4 col-form-label text-md-end">{{ __('') }}</label>
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
                                    {{ __('Buscar') }}
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