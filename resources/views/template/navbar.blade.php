<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
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
            {{ auth()->user()->encargado->nombre }}
          <i class="fas fa-caret-down"></i>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <span class="dropdown-item  font-weight-bold text-capitalize text-center">
            {{ auth()->user()->roles[0]->tipo }}
          </span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">
            <form action="{{ route('perfil.show') }}" method="get">
                <button style="border: none; background:none;"><i class="fas fa-user"></i> Perfil</button>
            </form>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
           
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">
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