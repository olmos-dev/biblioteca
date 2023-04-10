@extends('layouts.app')

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
            <div class="col-sm-6">
                @yield('agregar')
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- ./wrapper -->
@endsection