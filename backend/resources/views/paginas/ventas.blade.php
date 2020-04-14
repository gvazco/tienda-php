@extends('plantilla') 

@section('content')

<div class="content-wrapper" style="min-height: 247px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Gestor Ventas</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>

            <li class="breadcrumb-item active">Gestor Ventas</li>

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

              <h3 class="card-title">Title</h3>

              <div class="card-tools">

                <button></button>

                <button></button>

              </div>

            </div>

            {{-- Card Body --}}
            <div class="card-body">


             @foreach( $ventas as $element )

             {{ $element }}

             @endforeach

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

@endsection