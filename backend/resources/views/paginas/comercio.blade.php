@extends('plantilla') 

@section('content')

<div class="content-wrapper" style="min-height: 247px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2 pl-3 pr-3">

        <div class="col-sm-6">

          <h1>Gestor Comercio</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>

            <li class="breadcrumb-item active">Gestor comercio</li>

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

          @foreach( $comercio as $element )

          @endforeach

          <form action="{{url('/')}}/comercio/{{$element->id}}" method="post">

            @method('PUT') 

            @csrf

            {{-- Default Box --}}
            <div class="card">

              <div class="card-header">

                <button type="submit" class="btn btn-primary guardarInformacion float-right">Guardar Cambios</button>

              </div>

              {{-- Card Body --}}
              <div class="card-body">

                <div class="row">

                  <div class="col-lg-6">

                    <div class="card">

                      <div class="card-body">

                        <!-- IMPUESTO -->
                        <div class="form-group">

                          <label for="usr">Impuesto:</label>

                          <div class="input-group">

                            <span class="input-group-addon border p-1">
                              <i class="fas fa-percent"></i>
                            </span>

                            <input type="number" min="1" 
                            class="form-control" 
                            name="impuesto" 
                            value="{{ $element->impuesto}}">

                          </div>

                        </div>

                        <!-- ENVÍO NACIONAL -->
                        <div class="form-group">

                          <label for="usr">Envío Nacional:</label>

                          <div class="input-group">

                            <span class="input-group-addon border p-1">
                              <i class="fas fa-dollar-sign"></i>
                            </span>

                            <input type="number" min="1" 
                            class="form-control cambioInformacion" 
                            name="envioNacional" 
                            value="{{ $element->envioNacional }}">

                          </div>

                        </div>


                        <!-- ENVÍO INTERNACIONAL -->
                        <div class="form-group">

                          <label for="usr">Envío Internacional:</label>

                          <div class="input-group">

                            <span class="input-group-addon border p-1">
                              <i class="fas fa-dollar-sign"></i>
                            </span>

                            <input type="number" min="1" 
                            class="form-control" 
                            name="envioInternacional" 
                            value="{{ $element->envioInternacional }}">

                          </div>

                        </div>

                        <!-- TASA MÍNIMA NACIONAL -->
                        <div class="form-group">

                          <label for="usr">Tasa Mínima Nacional:</label>

                          <div class="input-group">

                            <span class="input-group-addon border p-1">
                              <i class="fas fa-dollar-sign"></i>
                            </span>

                            <input type="number" min="1" 
                            class="form-control" 
                            name="tasaMinimaNal" 
                            value="{{ $element->tasaMinimaNal }}">

                          </div>

                        </div>

                        <!-- TASA MÍNIMA INTERNACIONAL -->
                        <div class="form-group">

                          <label for="usr">Tasa Mínima Internacional:</label>

                          <div class="input-group">

                            <span class="input-group-addon border p-1">
                              <i class="fas fa-dollar-sign"></i>
                            </span>

                            <input type="number" min="1" 
                            class="form-control" 
                            name="tasaMinimaInt" 
                            value="{{ $element->tasaMinimaInt }}">

                          </div>

                        </div>

                        <!-- SELECCIONAR REGIÓN -->
                        <div class="form-group">

                          <label for="sel1">Seleccione Región:</label>

                          <input type="hidden" id="paisSeleccionado" name="pais" value="{{ $element->pais }}">

                          {{-- <input type="hidden" id="codigoPais" name="pais" value="{{ $element->pais }}"> --}}

                          <select id="seleccionarPais" class="form-control">

                              <option></option>

                          </select>
                          
                         {{--  @include('partials.listaPaises') --}}

                        </div>

                      </div>

                    </div>

                  </div>

                  <div class="col-lg-6">

                    <div class="card"> 

                      <div class="card-body"> 

                        <!-- PASARELA DE PAGO PAYPAL -->
                        <div class="panel panel-default">

                          <div class="card-header-pills">

                            <h4 class="text-uppercase">Configuración de Paypal</h4>

                          </div>

                          <div class="panel-body">

                            <div class="form-group row">

                              <div class="col-xs-3">

                                <label>Modo:</label>

                                @php
                                
                                if($element->modoPaypal == "sandbox"){

                                  echo '<label class="checkbox">

                                  <input class="cambioInformacion" type="radio" value="sandbox" name="modoPaypal" checked> 

                                  Sandbox

                                  </label>

                                  <label class="checkbox">

                                  <input class="cambioInformacion" type="radio" value="live" name="modoPaypal"> 

                                  Live

                                  </label>';


                                }else{

                                  echo '<label class="checkbox">

                                  <input class="cambioInformacion" type="radio" value="sandbox" name="modoPaypal"> 

                                  Sandbox

                                  </label>

                                  <label class="checkbox">

                                  <input class="cambioInformacion" type="radio" value="live" name="modoPaypal" checked> 

                                  Live

                                  </label>';


                                }

                                @endphp

                              </div>

                            </div>

                            <div class="col-xs-6">

                              <label for="comment">Cliente:</label>

                              <input type="text" class="form-control cambioInformacion" name="clienteIdPaypal" value="{{ $element->clienteIdPaypal }}">

                            </div>

                            <div class="col-xs-5">

                              <label for="comment">Llave Secreta:</label>

                              <input type="text" class="form-control cambioInformacion" name="llaveSecretaPaypal" value="{{ $element->llaveSecretaPaypal }}">

                            </div>

                          </div>

                        </div>

                        <hr class="pb-2">  

                        <!-- PASARELA DE PAGO MERCADOPAGO -->
                        <div class="panel panel-default">

                          <div class="card-header-pills">

                            <h4 class="text-uppercase">Configuración de Mercado Pago</h4>

                          </div>

                          <div class="panel-body">

                            <div class="form-group row">

                              <div class="col-xs-3">

                                <label>Modo:</label>

                                @php
                                
                                if($element->modoMercado == "sandbox"){

                                  echo '<label class="checkbox">

                                  <input class="cambioInformacion" type="radio" value="sandbox" name="modoMercado" checked> 

                                  Sandbox

                                  </label>

                                  <label class="checkbox">

                                  <input class="cambioInformacion" type="radio" value="live" name="modoMercado"> 

                                  Live

                                  </label>';


                                }else{

                                  echo '<label class="checkbox">

                                  <input class="cambioInformacion" type="radio" value="sandbox" name="modoMercado"> 

                                  Sandbox

                                  </label>

                                  <label class="checkbox">

                                  <input class="cambioInformacion" type="radio" value="live" name="modoMercado" checked> 

                                  Live

                                  </label>';


                                }

                                @endphp

                              </div>

                            </div>

                            <div class="col-xs-3">

                              <label for="comment">Public Key</label>

                              <input type="text" class="form-control cambioInformacion" name="publicKeyMercado" value="{{ $element->publicKeyMercado }}9">

                            </div>

                            <div class="col-xs-3">

                              <label for="comment">Access Token:</label>

                              <input type="text" class="form-control cambioInformacion" name="accessTokenMercado" value="{{ $element->accessTokenMercado }}">

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

              {{-- Card Footer --}}
              <div class="card-footer">

                <button type="submit" class="btn guardarInformacion btn-primary float-right">Guardar Cambios</button>

              </div>

              {{-- Card --}}
            </div>

          </form>

        </div>

      </div>

    </div>


  </section>


</div>




@endsection