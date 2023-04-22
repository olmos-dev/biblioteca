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
                        <h5><i class="far fa-list-alt"></i> Prestamos</h5>
                      </div>
                      <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                            <a class="btn btn-outline-light" style="border:none" href="{{ route('prestamo.create') }}"><i class="fas fa-plus"></i> Realizar un prestamo de un libro</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body table-responsive">
                    <div class="row">
                      <div class="col-12 mb-2">
                        <form action="#" method="get" class="form-inline d-flex justify-content-start justify-content-md-end">
                          <div class="input-group mb-3">
                            <input type="search" name="buscar" id="buscar" class="form-control @error('buscar') is-invalid @enderror" placeholder="buscar">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-outline-primary" type="button"><i class="fas fa-search"></i></button>
                            </div>
                            @error('buscar')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>
                        </form>
                      </div>
                    </div>
                    <table class="table table-hover table-bordered">
                        <thead class="">
                            <tr class="border">
                                <th>ISBN</th>
                                <th>Portada</th>
                                <th>Titulo</th>
                                <th>Estudiante</th>
                                <th>Encargado</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th colspan="3" style="width:10%;"></th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($prestamos as $prestamo)
                                  <tr>
                                    <td>{{ $prestamo->libro->isbn }}</td>
                                    <td>
                                      <a href="{{ asset('/storage/images/portadas/'.$prestamo->libro->image->path) }}" data-lightbox="image-1" data-title="Portada del libro">
                                        <img src="{{ asset('/storage/images/portadas/'.$prestamo->libro->image->path) }}" alt="Portada del libro" class="img-thumbnail" width="50" height="75">
                                      </a>
                                    </td>
                                    <td>{{ $prestamo->libro->titulo }}</td>
                                    <td>{{ $prestamo->estudiante->matricula }} - {{ $prestamo->estudiante->nombre }} {{ $prestamo->estudiante->a_paterno }} {{ $prestamo->estudiante->a_materno }}</td>
                                    <td>{{ $prestamo->encargado->nombre }}</td>
                                    <td>{{ $prestamo->created_at->format('d/m/y') }}</td>
                                    <td>
                                      @if ($prestamo->estado == 0)
                                          <span class="badge badge-success">Entregado</span>
                                      @else
                                          <span class="badge badge-warning">Prestado</span>
                                      @endif
                                    </td>
                                    <td>
                                      <prestamo-estado :prestamo="{{ $prestamo }}"></prestamo-estado>
                                    </td>
                                    <td>
                                      <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                                    </td>
                                    <td>
                                      <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                  </tr>
                              @endforeach
                            </tbody>
                    </table>
                  </div>
                  <div class="card-foter">
                    <div class="row table-responsive">
                      <div class="col-12 d-flex ml-3 ml-md-0 justify-content-start justify-content-md-center ">
                       
                      </div>
                    </div>
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
  <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('js/toastr.min.js') }}"></script>
  <script src="{{ asset('js/lightbox.min.js') }}"></script>
  <script src="{{ asset('js/toastr.min.js') }}"></script>
@endsection