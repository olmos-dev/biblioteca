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
            <div class="col-12">
                <form action="{{ route('foto.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5><i class="fas fa-camera"></i> Foto de perfil</h5>
                        </div>
                        <div class="card-body">
                            <label for="foto">Subir foto de perfil</label>
                            <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror" style="padding-bottom: 35px" accept="image/*">
                            @error('foto')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary"><i class="fas fa-upload"></i> Subir</button>
                        </div>
                    </div>
                </form>
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
<script>
document.addEventListener("DOMContentLoaded", (event) => {
    const foto = document.getElementById('foto');
    foto.addEventListener("change", (event) => {
        toastr.info('La foto de perfil esta lista para subirse', 'Subir');
    });
});
</script>
@endsection