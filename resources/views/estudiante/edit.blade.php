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
                <form action="{{ route('estudiante.update',['estudiante' => $estudiante]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <div class="card-title"><h5><i class="fas fa-edit"></i> Editar un estudiante</h5></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <label for="matricula">Matricula</label>
                                    <input type="text" name="matricula" id="matricula" class="form-control @error('matricula') is-invalid @enderror" placeholder="Escribe la matricula" value="{{ old('matricula') ?? $estudiante->matricula }}">
                                    @error('matricula')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-3">
                                    <label for="nombre">Nombre(s)</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" placeholder="Escribe el nombre" value="{{ old('nombre') ?? $estudiante->nombre }}">
                                    @error('nombre')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-3">
                                    <label for="paterno">Apellido Paterno</label>
                                    <input type="text" name="paterno" id="paterno" class="form-control @error('paterno') is-invalid @enderror" placeholder="Escribre el apellido paterno" value="{{ old('paterno') ?? $estudiante->a_paterno }}">
                                    @error('paterno')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-3">
                                    <label for="materno">Apellido Materno</label>
                                    <input type="text" name="materno" id="materno" class="form-control @error('materno') is-invalid @enderror" placeholder="Escribre el apellido materno" value="{{ old('materno') ?? $estudiante->a_materno }}">
                                    @error('materno')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary"><i class="fas fa-sync-alt"></i> Actualizar</button>
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

@endsection