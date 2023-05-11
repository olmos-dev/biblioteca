<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light pb-4">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          {{-- si existe una foto en la base de datos --}}
          @if (auth()->user()->image != null)
          <img src="{{ asset('/storage/images/perfiles/'.auth()->user()->image->path) }}" alt="foto de perfil" width="50" height="50" class="rounded-circle">
          @else
          <img src="{{ asset('blank-profile-picture-gb21b7bce2_640.png') }}" alt="foto de perfil" width="50" height="50" class="rounded-circle">
          @endif
          {{ auth()->user()->encargado->nombre }} 
          <i class="fas fa-caret-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <span class="dropdown-item  font-weight-bold text-capitalize text-center">
            {{ auth()->user()->roles[0]->tipo }}
          </span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer pb-1">
            <form action="{{ route('perfil.show') }}" method="get">
                <button style="border: none; background:none;"><i class="fas fa-user"></i> Perfil</button>
            </form>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer pb-1">
            <form action="{{ url('/logout') }}" method="post">
                @csrf
                <button style="border: none; background:none;"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</button>
            </form>
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->