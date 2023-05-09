@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 my-5">
                {{-- Alerta de link reenviado --}}
                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        Se reenvio un nuevo enlace de confirmación a tu correo.
                    </div>
                @endif
                {{-- formulario para reenviar el link --}}
                <div class="card shadow">
                    <div class="card-header">
                        <div class="card-title">Confirma tu correo electrónico</div>
                    </div>
                    <div class="card-body">
                        <p>Antes de poder continuar, por favor, <span class="font-weight-bold">confirma tu correo electrónico</span>
                            con el enlace que te hemos enviado. Si no has recibido el email,
                            <span class="font-weight-bold">pulsa aqui</span>, para que te enviemos otro. 
                        </p>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('verification.send') }}" method="post">
                            @csrf
                            <button class="btn btn-primary btn-block">Reenviar enlace de confirmación</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection