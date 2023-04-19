@extends('layouts.app')

@section('estilos')

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
                        <h5><i class="fas fa-users"></i> Estudiantes</h5>
                      </div>
                      <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                            <a class="btn btn-outline-light" style="border:none" href="{{ route('estudiante.create') }}"><i class="fas fa-plus"></i> Registar un nuevo estudiante</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body table-responsive">
                    <div class="row">
                      <div class="col-12 mb-2">
                        <form action="{{ route('estudiante.index') }}" method="get" class="form-inline d-flex justify-content-start justify-content-md-end">
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
                    @if ($estudiantes->count() > 0)
                    <table class="table table-hover table-bordered">
                        <thead class="">
                            <tr class="border">
                                <th>Matricula</th>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th colspan="2" style="width:10%;"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($estudiantes as $estudiante)
                                <tr>
                                    <td>{{ $estudiante->matricula }}</td>
                                    <td>{{ $estudiante->nombre }}</td>
                                    <td>{{ $estudiante->a_paterno }}</td>
                                    <td>{{ $estudiante->a_materno }}</td>
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
                    @else
                        <div class="alert alert-info" role="alert">
                            <strong>No se encontrarón resultados</strong>
                        </div>
                    @endif
                  </div>
                  <div class="card-foter">
                    <div class="row table-responsive">
                      <div class="col-12 d-flex ml-3 ml-md-0 justify-content-start justify-content-md-center ">
                        {{ $estudiantes->withQueryString()->links() }}
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

@endsection