@foreach ($administradores as $element)

@if ($_COOKIE["email_login"] == $element->email)

@if($element->rol == "administrador")

@extends('plantilla') 

@section('content')

<div class="content-wrapper" style="min-height: 247px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2 pr-3 pl-3">

        <div class="col-sm-6">

          <h1>Gestor Plantilla</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="{{url('/')}}">Plantilla</a></li>

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

         @foreach( $plantilla as $element )


         @endforeach

         <form action="{{ url('/')}}/plantilla/{{ $element->id }}" method="post" enctype="multipart/form-data">

          @method('PUT') 

          @csrf

          {{-- Default Box --}}
          <div class="card">

            <div class="card-header">

              <button type="submit" class="btn btn-primary float-right">Guardar Cambios</button>

            </div>

            {{-- Card Body --}}
            <div class="card-body">

             <div class="row">

              <div class="col-lg-7">

                <div class="card">

                  <div class="card-body">

                    {{-- Dominio --}}
                    <div class="input-group mb-3">

                      <div class="input-group-append">

                        <span class="input-group-text">Dominio</span>

                      </div>

                      <input type="text" class="form-control" name="dominio" value="{{ $element->dominio}}" required>
                      
                    </div>

                    {{-- Servidor --}}
                    <div class="input-group mb-3">

                      <div class="input-group-append">

                        <span class="input-group-text"

                        >Servidor</span>

                      </div>
                      
                      <input type="text" class="form-control" name="servidor" value="{{ $element->servidor}}" required>

                    </div>

                    {{-- Titulo --}}
                    <div class="input-group mb-3">

                      <div class="input-group-append">

                        <span class="input-group-text"

                        >Titulo</span>

                      </div>
                      
                      <input type="text" class="form-control" name="titulo" value="{{ $element->titulo }}" required>

                    </div>

                    {{-- Descripción --}}
                    <div class="input-group mb-3">

                      <div class="input-group-append">

                        <span class="input-group-text"

                        >Descripción</span>

                      </div>
                      
                      <textarea class="form-control" rows="5" name="descripcion" required>{{ $element->descripcion }}</textarea>

                    </div>

                    <hr class="pb-2">

                    {{-- Palabras Claves --}}

                    <div class="form-group mb-3">

                      <label>Palabras Claves</label>

                      @php

                      $tags = json_decode($element->palabras_claves, true);
                        // echo '<pre>'; print_r($tags); echo '</pre>';
                      $palabras_claves = "";

                      foreach($tags as $key => $value){

                        $palabras_claves .= $value.",";

                      }


                      @endphp

                      <input type="text" class="form-control" name="palabras_claves" data-role="tagsinput" value="{{ $palabras_claves }} required">

                    </div>

                    <hr class="pb-2">

                    {{-- Redes sociales --}}

                    {{-- Redes sociales --}}

                    <label>Redes Sociales</label>

                    <div class="row">

                      <div class="col-5">

                        <div class="input-group mb-3">

                          <div class="input-group-append">

                            <span class="input-group-text">Icono</span>

                          </div>

                          <select class="form-control" id="icono_red">

                            <option value="fab fa-facebook-f, #1475E0">

                              facebook

                            </option>

                            <option value="fab fa-instagram, #B18768">

                              instagram

                            </option>

                            <option value="fab fa-twitter, #00A6FF">

                              twitter

                            </option>

                            <option value="fab fa-youtube, #F95F62">

                              youtube

                            </option>

                            <option value="fab fa-snapchat-ghost, #FF9052">

                              snapchat

                            </option>

                            <option value="fab fa-facebook-messenger, #0E76A8">

                              messenger

                            </option>
                            <option value="fab fa-whatsapp, #0E76A8">

                              whatsapp

                            </option>
                            <option value="fab fa-linkedin-in, #0E76A8">

                              linkedin

                            </option>
                            <option value="fab fa-cart-plus, #0E76A8">

                              tienda

                            </option>


                          </select>

                        </div>

                      </div>
                      {{-- fin 5 col --}}

                      <div class="col-5">

                        <div class="input-group mb-3">

                          <div class="input-group-append">
                            <span class="input-group-text">Url</span>
                          </div>

                          <input type="text" class="form-control" id="url_red">

                        </div>


                      </div>

                      {{-- fin 5 col --}}

                      <div class="col-2">

                        <button type="button" class="btn btn-primary btn-xs w-100 agregarRed">Agregar</button>

                      </div>

                      {{-- fin 2 col --}}

                    </div>
                    {{-- fin del row --}}

                    <div class="row listadoRed">

                      @php

                      echo "<input type='hidden' name='redesSociales' value='".$element->redesSociales."' id='listaRed'>";

                      $redes = json_decode($element->redesSociales, true);                    

                      foreach ($redes as $key => $value) {

                        echo '<div class="col-lg-12">

                        <div class="input-group mb-3">

                        <div class="input-group-prepend">

                        <div class="input-group-text text-white" style="background:'.$value["background"].'">

                        <i class="'.$value["icono"].'"></i>

                        </div>

                        </div>

                        <input type="text" class="form-control" value="'.$value["url"].'">

                        <div class="input-group-prepend">

                        <div class="input-group-text" style="cursor:pointer">

                        <span class="bg-danger px-2 rounded-circle eliminarRed" red="'.$value["icono"].'" url="'.$value["url"].'">&times;</span>

                        </div>

                        </div>

                        </div>

                        </div>';

                      }

                      @endphp

                    </div>

                    <hr class="pb-2">

                    {{-- Paleta de Color --}}

                    <div class="box-body">

                      <div class="form-group">

                        <label>Color Barra Superior</label>

                        <div class="input-group">

                          <input type="text" class="form-control" name="barraSuperior" value="{{ $element->barraSuperior}}">

                          <div class="input-group-addon">
                            <i style="background-color: rgb(44, 44, 44);"></i>
                          </div>

                        </div>

                      </div>

                      <div class="form-group">

                        <label>Color Texto Superior:</label>

                        <div class="input-group">

                          <input type="text" class="form-control" name="textoSuperior" value="{{ $element->textoSuperior }}">

                          <div class="input-group-addon">
                            <i style="background-color: rgb(255, 255, 255);"></i>
                          </div>

                        </div>

                      </div>

                      <div class="form-group">

                        <label>Color Fondo:</label>

                        <div class="input-group">

                          <input type="text" class="form-control" name="colorFondo" value="{{ $element->colorFondo }}">

                          <div class="input-group-addon">
                            <i style="background-color: rgb(233, 104, 13);"></i>
                          </div>

                        </div>

                      </div>

                      <div class="form-group">

                        <label>Color Texto:</label>

                        <div class="input-group">

                          <input type="text" class="form-control" name="colorTexto" value="{{ $element->colorTexto }}">

                          <div class="input-group-addon">
                            <i style="background-color: rgb(255, 255, 255);"></i>
                          </div>

                        </div>

                      </div>  

                    </div>

                  </div>

                </div>

              </div>

              <div class="col-lg-5">

                <div class="card">

                  <div class="card-body">

                    <div class="row">

                      <div class="col-lg-12">

                        {{-- Cambiar Logo --}}

                        <div class="form-group my-2 text-center">

                          <div class="btn btn-default btn-file mb-3">

                            <i class="fas fa-paperclip"></i> Adjuntar Imagen de Logo

                            <input type="file" name="logo">

                            <input type="hidden" name="logo_actual" value="{{$element->logo}}" required>

                          </div>

                          <br>


                          <img src="{{url('/')}}/{{$element->logo}}" class="img-fluid py-2 bg-secondary previsualizarImg_logo">

                          <p class="help-block small mt-3">Dimensiones: 205px * 75px | Peso Max. 2MB | Formato: JPG o PNG</p>

                        </div>

                        <hr class="pb-2">

                        {{-- Cambiar Portada --}}

                        <div class="form-group my-2 text-center">

                          <div class="btn btn-default btn-file mb-3">

                            <i class="fas fa-paperclip"></i> Adjuntar Imagen de Portada

                            <input type="file" name="portada">

                            <input type="hidden" name="portada_actual" value="{{$element->portada}}" required>

                          </div>

                          <br>


                          <img src="{{url('/')}}/{{$element->portada}}" class="img-fluid py-2 previsualizarImg_portada">

                          <p class="help-block small mt-3">Dimensiones: 700px * 420px | Peso Max. 2MB | Formato: JPG o PNG</p>

                        </div>

                        <hr class="pb-2">

                        {{-- Cambiar Icono --}}

                        <div class="form-group my-2 text-center">

                          <div class="btn btn-default btn-file mb-3">

                            <i class="fas fa-paperclip"></i> Adjuntar Imagen de Icono

                            <input type="file" name="icono">

                            <input type="hidden" name="icono_actual" value="{{$element->icono}}" required>

                          </div>

                          <br>

                          <img src="{{url('/')}}/{{$element->icono}}" class="img-fluid py-2 rounded-circle previsualizarImg_icono" style="max-width: 150px;">

                          <p class="help-block small mt-3">Dimensiones: 150px * 150px | Peso Max. 2MB | Formato: JPG o PNG</p>

                        </div>


                      </div>

                      <hr class="pb-2 col-12">  

                      <div class="col-12">

                        <div class="form-group">

                          <label for="comment">Api de Facebook:</label>

                          <textarea class="form-control" rows="5" name="apiFacebook" required>

                            {{ $element->apiFacebook }}

                          </textarea>

                        </div>

                        <div class="form-group">

                          <label for="comment">Pixel de Facebook:</label>

                          <textarea class="form-control" rows="5" name="pixelFacebook" required>

                            {{ $element->pixelFacebook }}

                          </textarea>

                        </div>

                        <div class="form-group">

                          <label for="comment">Google Analytics</label>

                          <textarea class="form-control" rows="5" name="googleAnalytics" required>

                            {{ $element->googleAnalytics }}

                          </textarea>

                        </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </div>

            {{-- Card Footer --}}
            <div class="card-footer">

              <button type="submit" class="btn btn-primary float-right">Guardar Cambios</button>

            </div>

            {{-- Card --}}
          </div>

        </form>

      </div>

    </div>

  </div>


</section>


</div>

@if(Session::has("no-validacion"))

<script>

  notie.alert({

    type:2,
    text: 'Hay campos no validos en el formulario',
    time: 7

  })

</script>

@endif

@if(Session::has("no-validacion-imagen"))

<script>

  notie.alert({

    type:2,
    text: 'Las imágenes deben ser formato jpg o png',
    time: 7

  })

</script>

@endif

@if(Session::has("error"))

<script>

  notie.alert({

    type:3,
    text: 'Error en el Gestor de la Plantilla',
    time: 7

  })

</script>

@endif

@if(Session::has("ok-editar"))

<script>

  notie.alert({

    type:1,
    text: 'Actualizado correctamente',
    time: 7

  })

</script>

@endif

@endsection

@else

<script>window.location="{{ url('/slide') }}"</script>

@endif

@endif

@endforeach