@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">    
@endsection


@section('content')
<div class="wrapper">
    {{-- menu de navegación --}}
    @include('template.navbar')
    {{-- menu lateral --}}
    @include('template.asidebar')
    {{-- contenido --}}
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class=""><i class="fas fa-user"></i> Perfil </h5>
                    </div>
                    <div class="card-body">
                        {{-- mensaje de alerta --}}
                        @if (session('biblioteca'))
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Biblioteca - </strong> {{ session('biblioteca') }}
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                    <a href="{{ route('perfil.edit') }}" class="btn btn-secondary"><i class="fas fa-user"></i> Editar nombre</a>
                                  
                                    <div class="btn-group" role="group">
                                      <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-camera"></i> Foto de perfil
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('foto.create') }}"><i class="fas fa-upload"></i> Subir foto de perfil</a>
                                       
                                            <form action="{{ route('foto.destroy') }}" method="post" class="px-1">
                                                @csrf
                                                @method('delete')
                                                <button class="border-0 bg-white p-0" style="background: red;" ><i class="fas fa-trash-alt"></i> Eliminar foto de perfil</button>
                                            </form>
                                        
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- si existe la foto de perfil --}}
                            @if (auth()->user()->image != null)
                            <div class="col-12 col-md-4 form-group">
                                <a href="{{ asset('/storage/images/perfiles/'.auth()->user()->image->path) }}" data-lightbox="image-1" data-title="Foto de perfil">
                                    <img src="{{ asset('/storage/images/perfiles/'.auth()->user()->image->path) }}" alt="Foto de perfil" class="img-fluid">
                                </a>
                            </div>
                            @else
                            <div class="col-12 col-md-4 mb-4 form-group">
                                <img src="{{ asset('blank-profile-picture-gb21b7bce2_640.png') }}" alt="Foto de perfil" class="img-fluid">
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 form-group">
                                <label for="nombre">Nombre del encargado</label>
                                <input type="text" class="form-control bg-light text-capitalize" value="{{ $encargado->nombre }} {{ $encargado->apellido_paterno }} {{ $encargado->apellido_materno }}" readonly>
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label for="rol">Rol asigado</label>
                                <input type="text" class="form-control text-capitalize bg-light" value="{{ $rol }}" readonly>
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label for="email">Correo electrónico</label>
                                <input type="email" class="form-control bg-light" value="{{ auth()->user()->email }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <small class="text-muted">Registrado {{ auth()->user()->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- ./wrapper -->
@endsection

@section('scripts')
<script src="{{ asset('js/lightbox.min.js') }}"></script>
@endsection