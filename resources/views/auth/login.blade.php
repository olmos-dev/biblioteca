@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-4 mt-5">
            <form action="{{ url('/login') }}" method="post">
                @csrf
                <div class="login-box shadow">
                    <div class="login-logo mt-5">
                    <a href="../../index2.html"><b>Biblioteca</b></a>
                    </div>
                    <!-- /.login-logo -->
                    <div class="card">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg">Accede para comenzar</p>

                        @if ($errors->all())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Autenticación</strong>
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
                
                        <form action="../../index3.html" method="post">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="usuario o correo electrónico">
                            <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="contraseña">
                            <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                Recordarme
                                </label>
                            </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Acceder</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <p class="mb-1">
                      <a href="{{ url('/forgot-password') }}">Olvide mi contraseña</a>
                    </p>
                    <p class="mb-0">
                      <a href="{{ url('/register') }}" class="text-center">Registrar un nuevo usuario</a>
                    </p>
                  </div>
                  <!-- /.login-card-body -->
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection