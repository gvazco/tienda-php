@extends('plantilla') 

@section('content')

<div class="content-wrapper" style="min-height: 247px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Gestor Slide</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>

            <li class="breadcrumb-item active">Gestor Slide</li>

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

          @foreach( $slide as $element )

          @endforeach

          <form action="{{url('/')}}/slide/{{$element->id}}" method="post">

            @method('PUT') 

            @csrf

            {{-- Default Box --}}
            <div class="card">

              <div class="card-header">

                <button class="btn btn-sm btn-primary">Crear Nuevo Slide</button>

              </div>

              {{-- Card Body --}}
              <div class="card-body">




               {{ $element }}



             </div>

             {{-- Card Footer --}}
             <div class="card-footer">

              Footer

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