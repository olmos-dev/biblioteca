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
                        <h5><i class="fas fa-book"></i> Ver la información de un libro</h5>
                        
                      </div>
                    </div>
                </div>
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <a href="{{ asset('/storage/images/portadas/'.$libro->image->path) }}" data-lightbox="image-1" data-title="Portada del libro">
                                <img src="{{ asset('/storage/images/portadas/'.$libro->image->path) }}" alt="Portada del libro">
                            </a>
                        </div>
                        <div class="col-12 col-md-6">
                            <p class="text-right font-weight-bold">ISBN - {{ $libro->isbn }}</p>
                            <h3 class="text-left">{{ $libro->titulo }}</h3>
                            <p class="text-left font-weight-bold">{{ $libro->autor }}</p>
                            <p class="text-left font-weight-bold">{{ $libro->editorial }}</p>   
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