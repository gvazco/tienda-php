<body class="login-page" style="min-height: 621px;">
  <div class="login-box">
    <div class="login-logo">

      <b>Backend</b> | Mevasa

    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Iniciar Sesión</p>

        <form method="POST" action="{{ route('login') }}">
          @csrf

          {{-- email --}}

          <div class="imput-group mb-3">

            <div class="input-group-append">

              <div class="input-group-text">

                <i class="fas fa-envelope"></i>

              </div>

              <input id="email" type="email" class="form-control email_login @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Ingresa tu email" autofocus>

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

            </div>

          </div>

          {{-- password --}}

          <div class="imput-group mb-3">

            <div class="input-group-append">

              <div class="input-group-text">

                <i class="fas fa-key"></i>

              </div>

              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Ingresa tu contraseña" required autocomplete="current-password">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

            </div>

          </div>
          
          <div class="text-center">
            
            <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>

          </div>
          
        </form>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <script src="{{ url('/') }}/js/login.js"></script>

</body>