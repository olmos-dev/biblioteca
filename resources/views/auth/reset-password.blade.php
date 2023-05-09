@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 my-5">
            {{-- Alerta de cambio de contraseña --}}
            @if (session('status'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                {{ session('status') }}
            </div>
            @endif
            {{-- Formulario para el restablecimiento de contraseña --}}
            <form action="{{ route('password.update') }}" method="post">
                @csrf
                <div class="card shadow">
                    <div class="card-header">
                        <div class="card-title">Restablecimiento de contraseña</div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Correo electrónico</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Escribe tu correo electrónico" value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Escribe una nueva contraseña">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Repetir contraseña</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Repite la contraseña nuevamente">
                          
                        </div>
                        <input type="hidden" name="token" value="{{request()->route('token')}}">
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Restablecer contraseña</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection