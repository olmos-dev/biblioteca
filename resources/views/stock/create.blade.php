@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap4.min.css') }}">
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
                <form action="{{ route('stock.store') }}" method="post">
                    @csrf
                  <div class="card-header bg-primary text-white">
                    <div class="row">
                      <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start">
                        <h5><i class="fas fa-archive"></i> Asignar stock</h5>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="libro">Asignar libro</label>
                        <select name="libro" id="libro" class="form-control select2bs4 @error('isbn') is-invalid @enderror" style="width: 100%;">
                            <option value="" disabled selected>-seleccionar-</option>
                            @foreach ($libros as $libro)
                                <option value="{{ $libro->isbn }}">{{ $libro->isbn }} - {{ $libro->titulo }}</option>
                            @endforeach
                        </select>
                        @error('isbn')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                        </div>
                      <div class="form-group col-md-6">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control @error('cantidad') is-invalid @enderror" value="{{ old('cantidad') }}" placeholder="Escribe el cantidad de libro">
                        @error('cantidad')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                  </div>
                  <div class="card-footer d-flex justify-content-center justify-content-md-end">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Asignar</button>
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
<script src="{{ asset('js/select2.full.min.js') }}"></script>
<script>
    $(document).ready(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

    });
</script>
@endsection