@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icheck-bootstrap.min.css') }}">
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
                <form action="{{ route('prestamo.update',['prestamo' => $prestamo]) }}" method="post">
                    @csrf
                    @method('put')
                  <div class="card-header bg-primary text-white">
                    <div class="row">
                      <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start">
                        <h5><i class="far fa-list-alt"></i> Editar prestamo de un libro</h5>
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
                              <option value="{{ $estudiante->id }}"{{ $estudiante->id == $prestamo->estudiante_id ? 'selected' : '' }} {{ $estudiante->id == old('estudiante') ? 'selected' : '' }}>{{$estudiante->matricula}} - {{ $estudiante->nombre }} {{ $estudiante->a_paterno }} {{ $estudiante->a_materno}}</option>
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
                              <option value="{{ $libro->id }}"{{ $libro->id == $prestamo->libro_id ? 'selected' : '' }} {{ $libro->id == old('libro') ? 'selected' : '' }}>{{ $libro->isbn }} - {{ $libro->titulo }}</option>
                          @endforeach
                        </select>
                        @error('libro')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="col-md-6 mt-2">
                        <!-- radio -->
                        <div class="form-group clearfix">
                          <div class="icheck-success d-inline">
                            <input type="radio" id="radioPrimary1" name="estado" value="1" @checked($prestamo->estado == 1)>
                            <label for="radioPrimary1"> Prestado</label>
                          </div>
                          <div class="icheck-success d-inline mx-3 my-5">
                            <input type="radio" id="radioPrimary2" name="estado" value="0" @checked($prestamo->estado == 0)>
                            <label for="radioPrimary2"> Entregado</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer d-flex justify-content-center justify-content-md-end bg-white">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Editar</button>
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