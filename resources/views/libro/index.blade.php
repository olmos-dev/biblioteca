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
                        <h5><i class="fas fa-book"></i> Libros</h5>
                      </div>
                      <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                            <a class="btn btn-outline-light" style="border:none" href="{{ route('libro.create') }}"><i class="fas fa-plus"></i> agregar un nuevo libro</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body table-responsive">
                    {{-- listado de libros --}}
                    <table class="table table-striped">
                        <thead class="">
                            <tr>
                                <th>ISBN</th>
                                <th>Portada</th>
                                <th>Titulo</th>
                                <th>Autor</th>
                                <th>Editorial</th>
                                <th colspan="3" style="width:10%;"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($libros as $libro)
                                <tr>
                                    <td>{{ $libro->isbn }}</td>
                                    <td>
                                      <a href="{{ asset('/storage/images/portadas/'.$libro->image->path) }}" data-lightbox="image-1" data-title="Portada del libro">
                                        <img src="{{ asset('/storage/images/portadas/'.$libro->image->path) }}" alt="Portada del libro" class="img-thumbnail" width="50" height="75">
                                      </a>
                                    </td>
                                    <td>{{ $libro->titulo }}</td>
                                    <td>{{ $libro->autor }}</td>
                                    <td>{{ $libro->editorial }}</td>
                                    <th>
                                        <a href="{{ route('libro.show',['libro' => $libro]) }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{ route('libro.edit',['libro' => $libro]) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" id="eliminar"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                  </div>
                  <div class="card-foter">

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
  <script src="{{ asset('js/sweetalert.js') }}"></script>
  <script src="{{ asset('js/lightbox.min.js') }}"></script>
@endsection