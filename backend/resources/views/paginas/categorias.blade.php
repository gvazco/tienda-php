@extends('plantilla') 

@section('content')

<div class="content-wrapper" style="min-height: 247px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2 pl-3 pr-3">

        <div class="col-sm-6">

          <h1>Gestor Categorias</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>

            <li class="breadcrumb-item active">Gestor Categorias</li>

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

              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearCategoria">Crear Nueva Categoria</button>

            </div>

            {{-- Card Body --}}
            <div class="card-body">

              <table class="table table-bordered table-striped dt-responsive"  width="100%" id="tablaCategorias">

                <thead>

                  <tr>

                    <th width="10px">#</th>
                    <th>Titulo</th>
                    <th>Ruta</th>
                    <th>Descripción</th>
                    <th>Palabras Claves</th>
                    <th>Icono</th>
                    <th>Estado</th>
                    <th>Oferta</th>
                    <th>Precio Oferta</th>
                    <th>Descuento Oferta</th>
                    <th>ImgOferta</th>
                    <th>Fin Oferta</th>
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

            {{-- Card --}}
          </div>

        </div>

      </div>

    </div>

  </section>

</div>

<!--===========================================
Crear Categorías
=============================================-->
<div class="modal" id="crearCategoria">

  <div class="modal-dialog">

    <div class="modal-content">

      <form action="{{ url('/') }}/categorias" method="post" enctype="multipart/form-data">
        @csrf

        <div class="modal-header bg-info">

          <h4 class="modal-title">Crear Categoria</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body">

          {{-- Titulo de Categoria --}}

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-list-ul"></i>
            </div>

            <input type="text" class="form-control" name="titulo_categoria" placeholder="Ingrese el titulo de la categoría" value="{{ old("titulo_categoria") }}" required>

          </div>

          {{-- Ruta de Categoria --}}

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-link"></i>
            </div>

            <input type="text" class="form-control inputRuta" name="ruta_categoria" placeholder="Ingrese la ruta de la categoría" value="{{ old("ruta_categoria") }}" required>

          </div>

          {{-- Descripción de Categoria --}}

          <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt"></i>
            </div>

            <input type="text" class="form-control" name="descripcion_categoria" placeholder="Ingrese la descripción de la categoría" value="{{ old("descripcion_categoria") }}" maxlength="30" required>

          </div>

          {{-- Palabras Claves Categoria --}}

          <div class="input-group mb-3">

            <label>Palabras Claves<span class="small">(Separar por comas)</span></label>

            <input type="text" class="form-control" name="p_claves_categoria" placeholder="Ingrese una palabra clave" value="categoría" data-role="tagsinput" required>

          </div>

          {{-- Icono de Categoría--}}

          <hr class="pb-2">

          <div class="form-group my-2 text-center">

            <div class="btn btn-default btn-file">

              <i class="fas fa-paperclip"></i> Adjuntar Icono de la Categoría

              <input type="file" name="icon_categoria" required>
              
            </div> 

            <img class="previsualizarImg_icon_categoria img-fluid py-2">

            <p class="help-block small">Dimensiones: 150px * 150px | Peso Max. 2MB | Formato JPG o PNG</p>

          </div>

          {{-- Foto de Portada --}}

          <hr class="pb-2">

          <div class="form-group my-2 text-center">

            <div class="btn btn-default btn-file">

              <i class="fas fa-paperclip"></i> Adjuntar Foto de Portada

              <input type="file" class="fotoPortada" name="fotoPortada">

            </div>

            <input type="hidden" class="antiguaFotoPortada" name="antiguaFotoPortada">

            <p class="help-block small">Dimensiones: 1280px * 720px | Peso Max. 2MB | Formato JPG o PNG</p>

            <img src="vistas/img/cabeceras/default/default.jpg" class="img-thumbnail previsualizarImg_fotoPortada previsualizarPortada" width="100%">

          </div>

             <!--=====================================
            ENTRADA PARA TIPO DE OFERTA
            ======================================-->

            <div class="form-group">

              <select name="selActivarOferta" class="form-control input-lg selActivarOferta">

                <option value="">No tiene oferta</option>
                <option value="oferta">Activar oferta</option>

              </select>

            </div>

            <div class="datosOferta" style="display:none">

              <!--=====================================
              ENTRADA PARA EL VALOR DE LA OFERTA
              ======================================-->

              <div class="form-group row">

                <div class="col-xs-6">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                    <input type="number" class="form-control input-lg valorOferta" id="precioOferta" name="precioOferta" min="0" step="any" placeholder="Precio"> 

                  </div>

                </div>

                <div class="col-xs-6">

                  <div class="input-group">

                    <input type="number" class="form-control input-lg valorOferta" id="descuentoOferta" name="descuentoOferta" min="0" placeholder="Descuento"> 

                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                  </div>

                </div>

              </div>

              <!--=====================================
              ENTRADA PARA LA FECHA FIN OFERTA
              ======================================-->

              <div class="form-group">

                <div class="input-group date">

                  <input type='text' class="form-control datepicker input-lg valorOferta finOferta" name="finOferta">

                  <span class="input-group-addon">

                    <span class="glyphicon glyphicon-calendar"></span>
                    
                  </span>                  

                </div>

              </div>

              <!--=====================================
              ENTRADA PARA SUBIR FOTO DE OFERTA
              ======================================-->

              <div class="form-group">

                <div class="panel">SUBIR FOTO OFERTA</div>

                <input type="file" class="fotoOferta" name="fotoOferta">
                <input type="hidden" class="antiguaFotoOferta" name="antiguaFotoOferta">

                <p class="help-block">Tamaño recomendado 640px * 430px <br> Peso máximo de la foto 2MB</p>

                <img src="vistas/img/ofertas/default/default.jpg" class="img-thumbnail previsualizarOferta" width="100px">

              </div>

            </div>

          </div>

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar</button>

          </div>

        </form>

      </div>

    </div>

  </div>

  @endsection