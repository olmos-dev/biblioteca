<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index3.html" class="brand-link text-center">
      <span class="brand-text font-weight-light">Biblioteca</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          {{-- Prestamos --}}
          <li class="nav-item has-treeview">
            <a href="{{ route('prestamo.index') }}" class="nav-link">
              <i class="nav-icon far fa-list-alt"></i>
              <p>
                Prestamos
              </p>
            </a>
          </li>
          {{-- libros --}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Libros
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('libro.index') }}" class="nav-link">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p>ver todos los libros</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('libro.create') }}" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>agregar un nuevo libro</p>
                </a>
              </li>
              
            </ul>
          </li>
          {{-- stock --}}
          <li class="nav-item has-treeview">
            <a href="{{ route('stock.index') }}" class="nav-link">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Stock

              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Estudiantes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            {{-- estudiantes --}}
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('estudiante.index') }}" class="nav-link">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p>todos los estudiantes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../index2.html" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>agregar un estudiante</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- roles --}}
          @if (auth()->user()->roles[0]->tipo === 'administrador')
          <li class="nav-item has-treeview">
            <a href="{{ route('rol.index') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Roles
               
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>