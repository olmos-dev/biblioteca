@extends('layouts.app')

@section('content')
   <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mt-5">
                <div class="card shadow">
                    <form action="{{ url('/register') }}" method="post">
                        @csrf       
                        <div class="card-header bg-light">
                            <div class="login-logo">
                                <a href="#"><b>Biblioteca</b> - regístrate</a>
                            </div>
                        </div>
                        <div class="card-body">
                          {{-- validación --}}
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
                            {{-- Formulario --}}
                              <div class="form-row">
                                <div class="form-group col-md-4">
                                  <label for="inputEmail4">Nombre</label>
                                  <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" placeholder="Escribre tu nombre">
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="inputEmail4">Apellido materno</label>
                                  <input type="text" name="materno" id="materno" class="form-control" value="{{ old('materno') }}" placeholder="Escribre tu apellido materno">
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="inputEmail4">Apellido paterno</label>
                                  <input type="text" name="paterno" id="paterno" class="form-control" value="{{ old('paterno') }}" placeholder="Escribre tu apellido paterno">
                                </div>
                              </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nombre de usuario</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Escribre tu nombre de usuario">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputEmail4">Correo electrónico</label>
                                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Escribre tu correco electrónico">
                                  </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label for="inputPassword4">Contraseña</label>
                                      <input type="password" name="password" class="form-control" placeholder="Escribre una nueva contraseña">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="inputPassword4">Repetir contraseña</label>
                                      <input type="password" name="password_confirmation" class="form-control" placeholder="Repite la contraseña">
                                    </div>
                                </div>
                        </div>
                        <div class="car-body">
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                          </div>
                        </div>
                  </form>
                </div>
            </div>
        </div>
   </div>
@endsection