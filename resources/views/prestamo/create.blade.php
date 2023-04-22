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
                <form action="{{ route('prestamo.store') }}" method="post">
                    @csrf
                  <div class="card-header bg-primary text-white">
                    <div class="row">
                      <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start">
                        <h5><i class="far fa-list-alt"></i> Realizar un prestamo de un libro</h5>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="estudiante">Estudiante</label>
                        <select name="estudiante" id="estudiante" class="form-control select2bs4 @error('estudiante') is-invalid @enderror" style="width: 100%;">
                          <option value="" disabled selected>-seleccionar-</option>
                          @foreach ($estudiantes as $estudiante)
                              <option value="{{ $estudiante->id }}" {{ $estudiante->id == old('estudiante') ? 'selected' : '' }}>{{$estudiante->matricula}} - {{ $estudiante->nombre }} {{ $estudiante->a_paterno }} {{ $estudiante->a_materno}}</option>
                          @endforeach
                        </select>
                        @error('estudiante')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group col-md-6">
                        <label for="libro">Libro</label>
                        <select name="libro" id="libro" class="form-control select2bs4 @error('libro') is-invalid @enderror" style="width: 100%;">
                          <option value="" disabled selected>-seleccionar-</option>
                          @foreach ($libros as $libro)
                              <option value="{{ $libro->id }}" {{ $libro->id == old('libro') ? 'selected' : '' }}>{{ $libro->isbn }} - {{ $libro->titulo }}</option>
                          @endforeach
                        </select>
                        @error('libro')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="card-footer d-flex justify-content-center justify-content-md-end bg-white">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Prestar</button>
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
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
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