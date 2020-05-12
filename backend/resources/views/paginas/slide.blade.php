@extends('plantilla') 

@section('content')

<div class="content-wrapper" style="min-height: 247px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2 pl-3 pr-3">

        <div class="col-sm-6">

          <h1>Gestor Slide</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-right">

            <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>

            <li class="breadcrumb-item active">Gestor Slide</li>

          </ol>

        </div>

      </div>

      <div class="row d-flex justify-content-end pr-3">
        <button class="btn btn-sm btn-primary agregarSlide">Crear Nuevo Slide</button>
      </div>

    </div><!-- /.container-fluid -->

  </section>

  {{-- Main Content --}}
  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-12">

          {{-- Default Box --}} 

          <ul class="todo-list mt-2">

            @foreach( $slide as $key => $value )

            @php

            $estiloImgProducto = json_decode($value["estiloImgProducto"], true);
            $estiloTextoSlide = json_decode($value["estiloTextoSlide"], true);
            $titulo1 = json_decode($value["titulo1"], true);
            $titulo2 = json_decode($value["titulo2"], true);
            $titulo3 = json_decode($value["titulo3"], true);

            @endphp

            <li class="itemSlide" id="{{ $value->id }}">

              <form action="{{url('/')}}/slide/{{$value->id}}" method="post">

                @method('PUT') 

                @csrf

                <div class="card collapsed-card">

                  <div class="card-header d-flex">

                    <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>

                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse {{ $value->id }}" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">

                      @if($value->nombre != "")

                      <p class="text-uppercase" >{{ $value->nombre }}</p>

                      @else

                      Slide {{ $value->id }}

                      @endif

                    </a>

                    <div class="btn-group" style="position: absolute;
                    right: 30px;">

                    <button class="btn btn-primary guardarSlide">

                      <i class="fa fa-floppy-o"></i>

                    </button>

                    <button class="btn btn-danger eliminarSlide">

                      <i class="fa fa-times"></i>

                    </button>

                  </div>

                </div>

                <div class="card-body" style="display: none;">

                  <div class="my-4">

                    <div class="row">

                          <!--=====================================
                          PRIMER BLOQUE
                          ======================================-->
                          <div class="col-md-4 col-xs-12">

                            <div class="form-group">

                              <label>Nombre del Slide:</label>

                              <input type="text" class="form-control nombreSlide" indice="{{ $key }}" value="{{ $value->nombre }}">

                            </div>

                            <!--=====================================
                            MODIFICAR EL TIPO DE SLIDE
                            ======================================--> 

                            <div class="form-group d-flex">

                              <input type="hidden" class="tipoSlide" value="{{ $value->tipoSlide }}">

                              <label class="">Tipo de Slide:</label>

                              <label class="checkbox-inline selTipoSlide">

                                <input class="tipoSlideIzq" type="radio" value="slideOpcion1" name="tipoSlide{{ $key }}" indice="{{ $key }}">

                                Izquierda

                              </label>

                              <label class="checkbox-inline selTipoSlide">

                                <input class="tipoSlideDer" type="radio" value="slideOpcion2" name="tipoSlide{{ $key }}" indice="{{ $key }}">

                                Derecha

                              </label>

                            </div>

                            <!--=====================================
                            MODIFICAR EL FONDO DEL SLIDE
                            ======================================--> 

                            <div class="form-group">

                              <label>Cambiar Imagen Fondo:</label>

                              <br>

                              <p class="help-block">
                                <img src="{{ $value->imgFondo }}" class="img-thumbnail previsualizarFondo" width="200px">
                              </p>

                              <input type="file" class="subirFondo" style="font-size: small;" indice="{{ $key }}">

                              <p class="help-block">Tamaño recomendado 1600px * 520px</p>

                            </div>

                            <!--=====================================
                            MODIFICAR EL BOTÓN DEL SLIDE
                            ======================================--> 

                            <div class="form-group">

                              <label>Texto del botón:</label>

                              <input type="text" class="form-control botonSlide" indice="{{ $key }}" value="{{ $value->boton }}" placeholder="EJEMPLO: IR AL PRODUCTO">

                            </div>

                            <div class="form-group">

                              <label>Url del botón:</label>

                              <input type="text" class="form-control urlSlide" indice="{{ $key }}" value="{{ $value->url }}" placeholder="EJEMPLO: http://www.google.com">

                            </div> 

                          </div>
                          
                          <!--=====================================
                          SEGUNDO BLOQUE
                          ======================================--> 

                          <div class="col-md-4 col-xs-12">

                            <!--=====================================
                            MODIFICAR LA IMAGEN DEL PRODUCTO
                            ======================================--> 

                            <div class="form-group">

                              <label>Cambiar Imagen Producto:</label>

                              <br>

                              <p class="help-block">
                                <img src="{{ $value->imgProducto }}" class="img-thumbnail previsualizarProducto" width="200px">
                              </p>

                              <input type="file" class="subirImgProducto" style="font-size: small;"indice="{{ $key }}">

                              <p class="help-block">Tamaño recomendado 600px * 600px</p>

                            </div>

                            <!--=====================================
                            MODIFICAR LA POSICIÓN DE LA IMAGEN PRODUCTO
                            ======================================--> 

                            <div class="form-group">

                              <label>Posición VERTICAL de la imagen del producto: </label>

                              <input type="text" indice="{{ $key }}" value="" class="slider form-control posVertical posVertical{{ $key }}" data-slider-min="0" 
                              data-slider-max="50"
                              data-slider-step="5"
                              data-slider-value="{{ $estiloImgProducto["top"] }}" 
                              data-slider-orientation="horizontal"
                              data-slider-selection="before" 
                              data-slider-tooltip="show" 
                              data-slider-id="red">

                              <label>Posición HORIZONTAL de la imagen del producto: </label>

                              @if($value->tipoSlide == "slideOpcion1")

                              <input type="text" indice="{{ $key }}" value="" class="slider form-control posHorizontal posHorizontal{{ $key }}" 
                              tipoSlide = "{{ $value->tipoSlide }}"
                              data-slider-min="0" 
                              data-slider-max="50"
                              data-slider-step="5"
                              data-slider-value="{{ $estiloImgProducto["right"] }}" 
                              data-slider-orientation="horizontal"
                              data-slider-selection="before" 
                              data-slider-tooltip="show" 
                              data-slider-id="blue">

                              @else

                              <input type="text" indice="{{ $key }}" value="" class="slider form-control posHorizontal posHorizontal{{ $key }}" 
                              tipoSlide = "{{ $value->tipoSlide }}"
                              data-slider-min="0" 
                              data-slider-max="50"
                              data-slider-step="5"
                              data-slider-value="{{ $estiloImgProducto["left"] }}" 
                              data-slider-orientation="horizontal"
                              data-slider-selection="before" 
                              data-slider-tooltip="show" 
                              data-slider-id="blue">

                              @endif


                              <label>ANCHO de la imagen del producto: </label>

                              <input type="text" indice="{{ $key }}" value="" class="slider form-control anchoImagen anchoImagen{{ $key }}" data-slider-min="0" 
                              data-slider-max="50"
                              data-slider-step="5"
                              data-slider-value="{{ $estiloImgProducto["width"] }}" 
                              data-slider-orientation="horizontal"
                              data-slider-selection="before" 
                              data-slider-tooltip="show" 
                              data-slider-id="green">

                            </div>

                          </div>

                          <!--=====================================
                          TERCER BLOQUE
                          ======================================--> 

                          <div class="col-md-4 col-xs-12">

                            <!--=====================================
                            CAMBIO TÍTULO 1
                            ======================================--> 

                            <div class="form-group">

                              <label>Título 1:</label>

                              <input type="text" class="form-control cambioTituloTexto1" indice="{{ $key }}"  value="{{ $titulo1["texto"] }}">

                              <div class="input-group my-colorpicker">

                                <input type="text" class="form-control cambioColorTexto1" indice="{{ $key }}" value="{{ $titulo1["color"] }}">

                                <div class="input-group-addon">

                                  <i></i>

                                </div>

                              </div>

                            </div>

                            <!--=====================================
                            CAMBIO TÍTULO 2
                            ======================================--> 

                            <div class="form-group">

                              <label>Título 2:</label>

                              <input type="text" class="form-control cambioTituloTexto2" indice="{{ $key }}" value="{{ $titulo2["texto"] }}">

                              <div class="input-group my-colorpicker">

                                <input type="text" class="form-control cambioColorTexto2" indice="{{ $key }}" value="{{ $titulo2["color"] }}">

                                <div class="input-group-addon">

                                  <i></i>

                                </div>

                              </div>

                            </div>

                            <!--=====================================
                            CAMBIO TÍTULO 3
                            ======================================--> 

                            <div class="form-group">

                              <label>Título 3:</label>

                              <input type="text" class="form-control cambioTituloTexto3" indice="{{ $key }}" value="{{ $titulo3["texto"] }}">

                              <div class="input-group my-colorpicker">

                                <input type="text" class="form-control cambioColorTexto3" indice="{{ $key }}" value="{{ $titulo3["color"] }}">

                                <div class="input-group-addon">

                                  <i></i>

                                </div>

                              </div>

                            </div>

                            <!--=====================================
                            MODIFICAR LA POSICIÓN DEL TEXTO
                            ======================================--> 

                            <div class="form-group">

                              <label>Posición VERTICAL del texto: </label>

                              <input type="text" indice="{{ $key }}" value="" class="slider form-control posVerticalTexto posVerticalTexto{{ $key }}" data-slider-min="0" 
                              data-slider-max="50"
                              data-slider-step="5"
                              data-slider-value="{{ $estiloTextoSlide["top"] }}" 
                              data-slider-orientation="horizontal"
                              data-slider-selection="before" 
                              data-slider-tooltip="show" 
                              data-slider-id="red">

                              <label>Posición HORIZONTAL del texto: </label>

                              @if($value->tipoSlide == "slideOpcion1")

                              <input type="text" indice="{{ $key }}" value="" class="slider form-control posHorizontalTexto posHorizontalTexto{{ $key }}" 
                              tipoSlide = "{{ $value->tipoSlide }}"
                              data-slider-min="0" 
                              data-slider-max="50"
                              data-slider-step="5"
                              data-slider-value="{{ $estiloTextoSlide["left"] }}" 
                              data-slider-orientation="horizontal"
                              data-slider-selection="before" 
                              data-slider-tooltip="show" 
                              data-slider-id="blue">

                              @else

                              <input type="text" indice="{{ $key }}" value="" class="slider form-control posHorizontalTexto posHorizontalTexto{{ $key }}" 
                              tipoSlide = "{{ $value->tipoSlide }}"
                              data-slider-min="0" 
                              data-slider-max="50"
                              data-slider-step="5"
                              data-slider-value="{{ $estiloTextoSlide["right"] }}" 
                              data-slider-orientation="horizontal"
                              data-slider-selection="before" 
                              data-slider-tooltip="show" 
                              data-slider-id="blue">

                              @endif


                              <label>ANCHO del texto: </label>

                              <input type="text" indice="{{ $key }}" value="" class="slider form-control anchoTexto anchoTexto{{ $key }}" data-slider-min="0" 
                              data-slider-max="50"
                              data-slider-step="5"
                              data-slider-value="{{ $estiloTextoSlide["width"] }}" 
                              data-slider-orientation="horizontal"
                              data-slider-selection="before" 
                              data-slider-tooltip="show" 
                              data-slider-id="green">

                            </div>

                          </div>

                          <!--=====================================
                        VISOR SLIDE
                        ======================================-->      

                        <div class="slide">

                          <img class="cambiarFondo" src="{{ $value->imgFondo }}">

                          <div class="slideOpciones {{ $value->tipoSlide }}">

                            <img class="imgProducto" src="{{ $value->imgProducto }}" style="top:{{ $estiloImgProducto["top"] }}%; right:{{ $estiloImgProducto["right"] }}%; width:{{ $estiloImgProducto["width"] }}%; left:{{ $estiloImgProducto["left"] }}%">        

                            <div class="textosSlide" style="top:{{ $estiloTextoSlide["top"] }}%; left:{{ $estiloTextoSlide["left"] }}%; width:{{ $estiloTextoSlide["width"] }}%; right:{{ $estiloTextoSlide["right"] }}%">

                              <h1 style="color:{{ $titulo1["color"] }}">{{ $titulo1["texto"] }}</h1>

                              <h2 style="color:{{ $titulo2["color"] }}">{{ $titulo2["texto"] }}</h2>

                              <h3 style="color:{{ $titulo3["color"] }}">{{ $titulo3["texto"] }}</h3>

                              @if($value->boton != "")

                              <a href="{{ $value->url }}">

                                <button class="btn btn-default backColor text-uppercase">

                                  {{ $value->boton }} <span class="fa fa-chevron-right"></span>

                                </button>

                              </a>

                              @endif

                            </div>  

                          </div>

                        </div>

                      </div>

                    </div>  

                  </div>

                </div>

                {{-- Collapsed Card --}}

              </form>

            </li>

            @endforeach

          </ul>

        </div>

      </div>

    </div>

  </section>

</div>

@endsection