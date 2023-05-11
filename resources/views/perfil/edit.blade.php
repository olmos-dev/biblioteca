@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
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
            <div class="col-sm-12">
                <form action="{{ route('perfil.update') }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title"><i class="fas fa-user-edit"></i> Editar nombre</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <label for="nombre">Nombre(s)</label>
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $encargado->nombre }}">
                                    @error('nombre')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-4">
                                    <label for="apaterno">Apellido paterno</label>
                                    <input type="text" class="form-control @error('apaterno') is-invalid @enderror" name="apaterno" id="apaterno" value="{{ $encargado->apellido_paterno }}">
                                    @error('apaterno')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-4">
                                    <label for="amaterno">Apellido materno</label>
                                    <input type="text" class="form-control @error('amaterno') is-invalid @enderror" name="amaterno" id="amarteno" value="{{ $encargado->apellido_materno }}">
                                    @error('amaterno')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary"><i class="fas fa-sync-alt"></i> Actualizar Perfil</button>
                        </div>
                    </div>

                </form>
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
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    {{-- alerta al subit una imagen --}}
    <script src="{{ asset('js/main/alertupload.js') }}"></script>
@endsection