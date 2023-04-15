@extends('layouts.app')

@section('estilos')

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
                        <h5><i class="fas fa-archive"></i> Stock</h5>
                      </div>
                      <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                            <a class="btn btn-outline-light" style="border:none" href="{{ route('stock.create') }}"><i class="fas fa-plus"></i> asignar stock</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body table-responsive">
                    <div class="row">
                      <div class="col-12 mb-2">
                        <form action="{{ route('libro.index') }}" method="get" class="form-inline d-flex justify-content-start justify-content-md-end">
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
                                <th>Cantidad</th>
                                <th>Disponible</th>
                                <th colspan="3" style="width:10%;"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($asignados as $asignado)
                                    <tr>
                                        <td>{{ $asignado->libro->isbn}}</td>
                                        <td><img src="{{ asset('/storage/images/portadas/'.$asignado->libro->image->path) }}" alt="portada del libro" class="img-thumbnail" width="50" height="75"></td>
                                        <td>{{ $asignado->libro->titulo }}</td>
                                        <td>{{ $asignado->cantidad }}</td>
                                        <td>{{ $asignado->disponible }}</td>
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

@endsection