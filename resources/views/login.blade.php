<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/js/app.js'])
</head>
<body>
  <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh">
    <div class="card" style="width: 450px; height:550px;">
      <div class="card-body d-flex flex-column align-items-center justify-content-center" style="padding: 10%">        
        <img src="{{asset('images/todo.png')}}" alt="img_todo" style="height: 200px">
        <h1 style="font-weight: 800">Inicio de sesion</h1>
        <form method="POST" action="{{ route('iniciar-sesion') }}" class="d-flex flex-column justify-content-center align-items-center" style="width: 100%">
          @csrf
          <div class="form-group" style="width: 100%">
            <label for="correoUsuario">Correo electronico</label>
            <input type="email" class="form-control" name="Correo" id="correoUsuario" placeholder="Ingrese su correo electronico">
          </div>
          <div class="form-group mb-3" style="width: 100%">
            <label for="contraseniaUsuario">Contraseña</label>
            <input type="password" class="form-control" name="Contrasenia" id="contraseniaUsuario" placeholder="Ingrese su contraseña">
          </div>
          <div class="d-flex flex-column align-items-end justify-content-end mb-3" style="width: 100%">
            <a href="{{route('registro')}}">Registrate aquí</a>
          </div>
          <button type="submit" class="btn btn-primary" style="background-color:#4AC6B7; border-color: #4AC6B7">Iniciar sesión</button>
        </form>
      </div>
    </div>
  </div>

  <section class="container">
    @if ($message = Session::get('error'))
      <div class="alert alert-danger alert-block">
          {{ $message }}
      </div>
    @endif

    @foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-block">
        {{ $error }}
    </div>
    @endforeach
</section>
</body>
</html>