@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 my-5">
                {{-- Alerta de enlace enviado --}}
                @if ((session('status')))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    {{ session('status') }}
                </div>
                @endif
                {{-- Formulario para enviar el enlace del restablecimeinto de contraseña --}}
                <form action="{{ route('password.email') }}" method="post" novalidate>
                    @csrf
                    <div class="card shadow">
                        <div class="card-header">
                            <div class="card-title">Restablecer contraseña</div>
                        </div>
                        <div class="card-body">
                            <label for="email">Correo electrónico</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <small class="text-muted">Escribe tu correo para enviar un enlace de restablecimiento de contraseña</small>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Enviar enlace para restablecer contraseña</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection