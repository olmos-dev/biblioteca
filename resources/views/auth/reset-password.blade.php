@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 my-5">
            <form action="{{ url('/reset-password') }}" method="post">
                @csrf
                <div class="card shadow">
                    <div class="card-header">
                        <div class="card-title">Restablecimiento de contraseña</div>
                    </div>
                    <div class="card-body">
                        @if ($errors->all())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Verificar formulario</strong>
                            @foreach ($errors->all() as $error)
                            <ul>
                                <li>{{ $error }}</li>
                            </ul>                              
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="">Correo electrónico</label>
                            <input type="email" name="email" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Contraseña</label>
                            <input type="password" name="password" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Repetir contraseña</label>
                            <input type="password" name="password_confirmation" id="" class="form-control">
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