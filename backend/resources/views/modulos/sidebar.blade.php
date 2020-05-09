<aside class="main-sidebar sidebar-light-primary elevation-4" style="overflow-x:hidden;">
  <!-- Brand Logo -->
  <!-- Brand Logo -->
  <a href="{{url('/')}}" class="brand-link">
    <img src="{{url('/')}}/vistas/img/icono.png" alt="Mevasa Logo" class="logo-image" style="max-width: 60px; margin-left: 0.5rem; margin-right: 0.6rem;"><span class="align-middle" style="color: black;">Admin | Tienda</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition"><div class="os-resize-observer-host"><div class="os-resize-observer observed" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer observed"></div></div><div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 296px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">

        @foreach ($administradores as $element)

        @if ($_COOKIE["email_login"] == $element->email)

        @if($element->foto == "")

        <img src="{{url('/')}}/vistas/img/499.png" class="img-circle elevation-2" alt="User Image">

        @else

        <img src="{{url('/')}}/{{ $element->foto }}" class="img-circle elevation-2" alt="User Image">

        @endif

        @endif

        @endforeach

      </div>
      <div class="info">
        <a href="#" class="d-block">

          @foreach ($administradores as $element)

          @if ($_COOKIE["email_login"] == $element->email)

          {{ $element->name }}

          @endif

          @endforeach

        </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


        @foreach ($administradores as $element)

        @if ($_COOKIE["email_login"] == $element->email)

        @if($element->rol == "administrador")

        <li class="nav-item">
          <a href="{{ url('/') }}" class="nav-link">
            <i class="fas fa-home nav-icon"></i>
            <p>Plantilla</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/comercio') }}" class="nav-link">
            <i class="fas fa-store-alt nav-icon"></i>
            <p>Comercio</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('/usuarios')}}" class="nav-link">
            <i class="nav-icon fas fa-user-tag"></i>
            <p>
              Usuarios

            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('/administradores')}}" class="nav-link">
            <i class="nav-icon fas fa-user-shield"></i>
            <p>
              Administradores

            </p>
          </a>
        </li>

        @endif

        @endif

        @endforeach

        
        <li class="nav-item">
          <a href="{{ url('/slide')}}" class="nav-link">
            <i class="far fa-images nav-icon"></i>
            <p>Slide</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('/banner')}}" class="nav-link">
            <i class="fas fa-image nav-icon"></i>
            <p>Banner</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('/categorias')}}" class="nav-link">
            <i class="fas fa-list-ul nav-icon"></i>
            <p>Categorias</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('/subcategorias')}}" class="nav-link">
            <i class="fas fa-stream nav-icon"></i>
            <p>Sub-Categorias</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('/productos')}}" class="nav-link">
            <i class="nav-icon fas fa-icons"></i>
            <p>
              Productos

            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('/ventas')}}" class="nav-link">
            <i class="nav-icon fas fa-cash-register"></i>
            <p>
              Ventas

            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('/visitas')}}" class="nav-link">
            <i class="nav-icon fas fa-eye"></i>
            <p>
              Visitas

            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ substr(url('/'),0,-15) }}" target="_blank" class="nav-link">
            <i class="nav-icon fas fa-globe"></i>
            <p>
              Ver Tienda

            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>