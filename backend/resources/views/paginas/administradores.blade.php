@foreach ($administradores as $element)

@if ($_COOKIE["email_login"] == $element->email)

@if($element->rol == "administrador")

@extends('plantilla') 

@section('content')

<div class="content-wrapper" style="min-height: 247px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Gestor Administradores</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>

            <li class="breadcrumb-item active">Gestor Administradores</li>

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->

  </section>
  
  {{-- Main Content --}}
  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-12">

          {{-- Default Box --}}
          <div class="card">

            <div class="card-header">

              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearAdministrador">Crar nuevo administrador</button>

            </div>

            {{-- Card Body --}}
            <div class="card-body">

              <table class="table table-bordered table-striped dt-responsive"  width="100%" id="tablaAdministradores">

                <thead>

                  <tr>

                    <th>#</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th width="50px">Foto</th>
                    <th>Rol</th>
                    <th>Acciones</th>

                  </tr>

                </thead>

                <tbody>


                  {{-- @foreach ($administradores as $key => $value)

                  <tr>

                    <td>{{ $key+1 }}</td>
                    <td>{{ $value["name"] }}</td>
                    <td>{{ $value["email"] }}</td>

                    @if($value["foto"] == "")

                    <td><img src="{{ url('/') }}/img/perfiles/default/anonymous.png" class="img-fluid rounded-circle"></td>

                    @else

                    <td><img src="{{ url('/') }}/{{ $value['foto'] }}" class="img-fluid rounded-circle"></td>

                    @endif

                    @if($value["rol"] == "")

                    <td>administrador</td>

                    @else

                    <td>{{ $value["rol"] }}</td>

                    @endif
                    

                    <td>

                      <div class="btn-group">

                        <a href="{{ url('/') }}/administradores/{{ $value["id"] }}" class="btn btn-warning btn-sm">

                          <i class="fas fa-pencil-alt text-white"></i>

                        </a>

                        <button class="btn btn-danger btn-sm eliminarRegistro" action="{{ url('/') }}/administradores/{{ $value["id"] }}" method="DELETE" pagina="administradores">
                          @csrf

                          <i class="fas fa-trash-alt"></i>

                        </button> --}}

                        {{-- <form method="post" action="{{ url('/') }}/administradores/{{ $value["id"] }}">

                          <input type="hidden" name="_method" value="DELETE">
                          @csrf

                          <button type="submit" class="btn btn-danger btn-sm">

                            <i class="fas fa-trash-alt"></i>

                          </button>

                        </form> --}}

                      {{-- </div>

                    </td>

                  </tr>

                  @endforeach --}}
                  
                </tbody>

              </table>

            </div>

            {{-- Card Footer --}}
            <div class="card-footer">

              Footer

            </div>

            {{-- Card --}}
          </div>

        </div>

      </div>

    </div>


  </section>


</div>

<!--=====================================================
=            Modal Registrar Administradores            =
======================================================-->

<div class="modal" id="crearAdministrador">

  <div class="modal-dialog">

    <div class="modal-content">

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="modal-header bg-info">

          <h4 class="modal-title">Crear Administrador</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body">

          {{-- Nombre --}}

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-user"></i>
            </div>

            <input  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre de Administrador">

            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>

          {{-- Email --}}

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-envelope"></i>
            </div>

            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo Electrónica">

            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>

          {{-- Password --}}

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-key"></i>
            </div>

            <input  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña con 8 caracteres como minimo">

            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>

          {{-- Confirm Password --}}

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-key"></i>
            </div>

            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Contraseña">

          </div>

        </div>

        <div class="modal-footer d-flex justify-content-between">

          <div>

            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

          </div>

          <div>

            <button type="submit" class="btn btn-success">Guardar</button>

          </div>

        </div>

      </form>

    </div>

  </div>

</div>


<!--====  End of Modal Registrar Administradores  ====-->



<!--=====================================================
=            Modal Editar Administradores            =
======================================================-->

@if (isset($status))

@if ($status == 200)

@foreach ($administradores as $key => $value)

<div class="modal" id="editarAdministrador">

  <div class="modal-dialog">

    <div class="modal-content">

      <form method="POST" action="{{ url('/') }}/administradores/{{ $value["id"] }}" enctype="multipart/form-data" >

        @method('PUT')
        @csrf

        <div class="modal-header bg-info">

          <h4 class="modal-title">Editar Administrador</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body">

          {{-- Nombre --}}

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-user"></i>
            </div>

            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $value["name"] }}" autocomplete="name" autofocus placeholder="Nombre de Administrador">

            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>

          {{-- Email --}}

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-envelope"></i>
            </div>

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $value["email"] }}" autocomplete="email" placeholder="Correo Electrónica">

            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>

          {{-- Password --}}

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-key"></i>
            </div>

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Contraseña con 8 caracteres como minimo">

            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>

          <input type="hidden" name="password_actual" value="{{ $value["password"] }}">

          {{-- Rol --}}

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">

              <i class="fa fa-list-ul"></i>
              
            </div>

            <select class="form-control" name="rol" required>

              @if ($value["rol"] =="administrador" || $value["rol"] == "")

              <option value="administradror">Administrador</option>
              <option value="editor">Editor</option>

              @else

              <option value="editor">Editor</option>
              <option value="administrador">Administrador</option>
              
              @endif

            </select>

          </div>

          {{-- Foto --}}

          <hr class="pb-2">

          <div class="form-group my-2 text-center">

            <div class="btn btn-default btn-file">

              <i class="fas fa-paperclip"></i> Adjuntar Foto

              <input type="file" name="foto">

            </div>

            <br>

            @if ($value["foto"] == "")

            <img src="{{ url('/') }}/img/perfiles/default/anonymous.png" class="previsualizarImg_foto img-fluid py-2 w-25 rounded-circle">

            @else

            <img src="{{ url('/') }}/{{ $value["foto"] }}" class="previsualizarImg_foto img-fluid py-2 w-25 rounded-circle">

            @endif

            <input type="hidden" value="{{ $value["foto"] }}" name="imagen_actual" >

            <p class="help-block small">Dimensiones: 200px * 200px | Peso Max. 2MB Formato: JPG o PNG</p>

          </div>

        </div>

        <div class="modal-footer d-flex justify-content-between">

          <div>

            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

          </div>

          <div>

            <button type="submit" class="btn btn-success">Guardar</button>

          </div>

        </div>

      </form>

    </div>

  </div>

</div>

@endforeach

<script>

  $("#editarAdministrador").modal();

</script>

@else

{{ $status }}

@endif

@endif

@if (Session::has("no-validacion"))

<script>

  notie.alert({ type: 2, text: '¡Hay campos no validos en el formulario!', time:10 })

</script>

@endif

@if (Session::has("error"))

<script>

  notie.alert({ type: 3, text: '¡Error en el gestor de administradores!', time:10 })

</script>

@endif

@if (Session::has("ok-editar"))

<script>

  notie.alert({ type: 1, text: '¡El administrador ha sido actualizado correctamente!', time:10 })

</script>

@endif

@if (Session::has("ok-eliminar"))

<script>
  notie.alert({ type: 1, text: '¡El administrador ha sido eliminado correctamente!', time: 10 })
</script>

@endif

@if (Session::has("no-borrar"))

<script>
  notie.alert({ type: 2, text: '¡Este administrador no se puede borrar!', time: 10 })
</script>

@endif

<!--====  End of Modal Editar Administradores  ====-->

@endsection

@else

<script>window.location="{{ url('/slide') }}"</script>

@endif

@endif

@endforeach