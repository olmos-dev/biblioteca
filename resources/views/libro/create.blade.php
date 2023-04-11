@extends('layouts.app')

@section('estilos')
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
                <form action="{{ route('libro.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-header bg-primary text-white">
                    <div class="row">
                      <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start">
                        <h5><i class="fas fa-book"></i> Agregar un nuevo libro</h5>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="isbn">ISBN</label>
                        <input type="text" name="isbn" id="isbn" class="form-control @error('isbn') is-invalid @enderror" value="{{ old('isbn') }}" placeholder="Esbribe el isbn del libro">
                        @error('isbn')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                        </div>
                      <div class="form-group col-md-6">
                        <label for="titulo">Titulo</label>
                        <input type="text" name="titulo" id="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo') }}" placeholder="Escribe el titulo de libro">
                        @error('titulo')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group col-md-6">
                        <label for="autor">Autor</label>
                        <input type="text" name="autor" id="autor" class="form-control @error('autor') is-invalid @enderror" value="{{ old('autor') }}" placeholder="Escribe el autor del libro">
                        @error('autor')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                        </div>
                      <div class="form-group col-md-6">
                        <label for="editorial">Editorial</label>
                        <input type="text" name="editorial" id="editorial" class="form-control @error('editorial') is-invalid @enderror" value="{{ old('editorial') }}" placeholder="Escribe el autor del libro">
                        @error('editorial')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                        </div>
                      </div>
                      <div class="form-group col-md-12">
                        <label for="portada">Portada del libro</label>
                        <input type="file" name="portada" id="portada" class="form-control @error('portada') is-invalid @enderror" style="padding-bottom: 35px"  accept="image/png, image/jpeg">
                        @error('portada')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                  </div>
                  <div class="card-footer d-flex justify-content-center justify-content-md-end">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Agregar</button>
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
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script>
  //es para enviar una alerta cuando se ha subido la portada del libro
  document.addEventListener("DOMContentLoaded", (event) => {
    const portada = document.getElementById('portada'); 
    portada.addEventListener("change", (event) => {
      toastr.info('la portada del libro se ha subido','Carga');
    });
  });
</script>
@endsection