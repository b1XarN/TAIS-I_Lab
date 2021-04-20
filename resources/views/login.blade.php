<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <link href="gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="gentelella-master/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="{{route('usuario.login')}}" method="POST">
                        @csrf
                        <h1>INICIAR SESION</h1>
                        <div>
                            <input type="text" class="form-control @error('usuario') is-invalid @enderror"
                                placeholder="Usuario" required="" id="usuario" name="usuario" />
                            @error('usuario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <input type="password" class="form-control @error('contraseña') is-invalid @enderror"
                                placeholder="Contraseña" required="" id="contraseña" name="contraseña" />
                            @error('contraseña')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">Ingresar</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>
