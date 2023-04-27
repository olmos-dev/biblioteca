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
              <div class="card">
                <div class="card-header bg-success text-white">
                    <div class="row">
                      <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start">
                        <h5><i class="fas fa-archive"></i> Ver la información de un libro en el stock</h5>
                        
                      </div>
                    </div>
                </div>
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <a href="{{ asset('/storage/images/portadas/'.$stock->libro->image->path) }}" data-lightbox="image-1" data-title="Portada del libro">
                                <img src="{{ asset('/storage/images/portadas/'.$stock->libro->image->path) }}" alt="Portada del libro">
                            </a>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="text-right font-weight-bold">ISBN - {{ $stock->libro->isbn }}</p>
                            <h3 class="text-left">{{ $stock->libro->titulo }}</h3>
                            <p class="text-left font-weight-bold">{{ $stock->libro->autor }}</p>
                            <p class="text-left font-weight-bold">{{ $stock->libro->editorial }}</p>   
                            <table class="table mt-5">
                                <thead>
                                    <tr>
                                        <th>Cantidad</th>
                                        <th>Disponible</th>
                                        <th>Prestado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $stock->cantidad }}</td>
                                        <td>
                                          @if ($stock->disponible == 0)
                                           <span class="badge badge-danger">Agotado</span>   
                                          @else
                                           {{ $stock->disponible }}      
                                          @endif
                                        </td>
                                        <td>{{ $stock->prestado }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                   
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