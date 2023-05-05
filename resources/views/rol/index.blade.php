@extends('layouts.app')

@section('estilos')
  <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

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
                {{-- mensaje flash --}}
                @if(session('mensaje'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Biblioteca </strong>{{ session('mensaje') }}
                </div>
                @endif
              <div class="card">
                  <div class="card-header bg-primary text-white">
                    <div class="row">
                      <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start">
                        <h5><i class="fas fa-users"></i> Roles</h5>
                      </div>
                      <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                            <a class="btn btn-outline-light" style="border:none" href="#"><i class="fas fa-plus"></i> asignar un rol</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body table-responsive">
                    <div class="row">
                      <div class="col-12 mb-2">

                      </div>
                    </div>
                    <table class="table table-hover table-bordered">
                        <thead class="">
                            <tr class="border">
                                <th>Nombre del Encargado</th>
                                <th>Correo Electrónico</th>
                                <th>Rol</th>
                                <th>Registrado</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $rol)
                                    <tr>
                                        <td>{{ $rol->encargado->nombre }} {{ $rol->encargado->apellido_paterno }} {{ $rol->encargado->apellido_materno }}</td>
                                        <td>{{ $rol->email }}</td>
                                        <td>{{ $rol->roles[0]->tipo }}</td>
                                        <td>{{ $rol->created_at->diffForHumans()}}</td>
                                        <td>
                                          <asignar-rol :usuario="{{ $rol }}"></asignar-rol>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                  </div>
                  <div class="card-footer"></div>
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
  <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('js/toastr.min.js') }}"></script>
  <script src="{{ asset('js/lightbox.min.js') }}"></script>
  <script src="{{ asset('js/toastr.min.js') }}"></script>
@endsection