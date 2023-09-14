<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    @vite(['resources/js/app.js'])
</head>
<body >
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh">
        <div class="card" style="width: 500px; height:600px;">
            <div class="card-body d-flex flex-column align-items-center justify-content-center" style="padding: 10%">        
                <img src="{{asset('images/usuario.png')}}" alt="img_todo" style="height: 200px">
                <h1 style="font-weight: 800">Alta de usuario</h1>
                
                <form method="POST" action="{{ route('altaUsuario') }}" enctype="multipart/form-data" 
                        class="d-flex flex-column justify-content-center align-items-center" style="width: 100%">
                    @csrf
                    <div class="form-group" style="width: 80%">
                        <label for="nombreUsuario">Nombre</label>
                        <input type="text" class="form-control" name="Nombre" id="nombreUsuario" placeholder="Ingrese su nombre" required>
                    </div>
                    <div class="form-group" style="width: 80%">
                        <label for="correoUsuario">Correo electronico</label>
                        <input type="email" class="form-control" name="Correo" id="correoUsuario" placeholder="Ingrese su correo electronico" required>
                    </div>
                    <div class="form-group mb-3" style="width: 80%">
                        <label for="contraseniaUsuario">Contraseña</label>
                        <input type="password" class="form-control" name="Contrasenia" id="contraseniaUsuario" placeholder="Ingrese su contraseña" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color:#4AC6B7; border-color: #4AC6B7">Crear cuenta</button>
                </form>
                <a class="mt-3" href="{{route('login')}}">Inicia sesion aquí</a>
            </div>
        </div>
    </div>

    <section class="container">
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-block">
            {{ $error }}
        </div>
        @endforeach
    </section>
</body>
</html>