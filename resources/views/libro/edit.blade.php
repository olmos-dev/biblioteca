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
              <div class="card">
                <form action="{{ route('libro.update',['libro' => $libro]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                
                  <div class="card-header bg-success text-white">
                    <div class="row">
                      <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start">
                        <h5><i class="fas fa-book"></i> Editar un libro</h5>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="isbn">ISBN</label>
                        <input type="text" name="isbn" id="isbn" class="form-control @error('isbn') is-invalid @enderror" value="{{ old('isbn') ?? $libro->isbn }}" placeholder="Esbribe el isbn del libro">
                        @error('isbn')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                      <div class="form-group col-md-6">
                        <label for="titulo">Titulo</label>
                        <input type="text" name="titulo" id="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo') ?? $libro->titulo }}" placeholder="Escribe el titulo de libro">
                        @error('titulo')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group col-md-6">
                        <label for="autor">Autor</label>
                        <input type="text" name="autor" id="autor" class="form-control @error('autor') is-invalid @enderror" value="{{ old('autor') ?? $libro->autor}}" placeholder="Escribe el autor del libro">
                        @error('autor')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                      <div class="form-group col-md-6">
                        <label for="editorial">Editorial</label>
                        <input type="text" name="editorial" id="editorial" class="form-control @error('editorial') is-invalid @enderror" value="{{ old('editorial') ?? $libro->editorial }}" placeholder="Escribe el autor del libro">
                        @error('editorial')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                      </div>
                      <div class="form-group col-md-12">
                        <label for="">Portada actual</label><br>
                        {{-- ligthbox  --}}
                        <a href="{{ asset('/storage/images/portadas/'.$libro->image->path) }}" data-lightbox="image-1" data-title="Portada del libro">
                          <img src="{{ asset('/storage/images/portadas/'.$libro->image->path) }}" alt="Portada del libro" class="img-thumbnail" width="100" height="150">
                        </a>
                      </div>
                      <div class="form-group col-md-12">
                        <label for="portada">Cambiar la portada del libro</label>
                        <input type="file" name="portada" id="portada" class="form-control @error('portada') is-invalid @enderror" style="padding-bottom: 35px"  accept="image/png, image/jpeg">
                        @error('portada')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                  </div>
                  <div class="card-footer d-flex justify-content-center justify-content-md-end">
                    <button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i> Actualizar</button>
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