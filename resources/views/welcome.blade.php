@extends('plantilla')

@section('estilos')
    <link href="gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="gentelella-master/build/css/custom.min.css" rel="stylesheet">
@endsection

@section('contenido')
    @php
    session_start();
    if (isset($usuario)) {
        $_SESSION['usuario_id'] = $usuario->usu_id;
        $_SESSION['usuario_name'] = $usuario->usu_apellido.' '.$usuario->usu_nombre;
    }
    @endphp
    <div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="/imagenes/1.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Para cualquier emprendedor: si quieres hacerlo, hazlo ahora. Si no lo haces te vas a arrepentir
                        </h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/imagenes/2.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>No es sobre las ideas. Sino hacer que éstas se vuelvan realidad</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="/imagenes/3.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Las ideas son fáciles, implementarlas es lo difícil</h5>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-custom-icon" aria-hidden="true">
                    <i class="fa fa-chevron-left"></i>
                </span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-custom-icon" aria-hidden="true">
                    <i class="fa fa-chevron-right"></i>
                </span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="gentelella-master/vendors/jquery/dist/jquery.min.js"></script>
    <script src="gentelella-master/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="gentelella-master/vendors/fastclick/lib/fastclick.js"></script>
    <script src="gentelella-master/vendors/nprogress/nprogress.js"></script>
    <script src="gentelella-master/vendors/Chart.js/dist/Chart.min.js"></script>
    <script src="gentelella-master/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <script src="gentelella-master/vendors/Flot/jquery.flot.js"></script>
    <script src="gentelella-master/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="gentelella-master/vendors/Flot/jquery.flot.time.js"></script>
    <script src="gentelella-master/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="gentelella-master/vendors/Flot/jquery.flot.resize.js"></script>
    <script src="gentelella-master/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="gentelella-master/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="gentelella-master/vendors/flot.curvedlines/curvedLines.js"></script>
    <script src="gentelella-master/vendors/DateJS/build/date.js"></script>
    <script src="gentelella-master/vendors/moment/min/moment.min.js"></script>
    <script src="gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="gentelella-master/build/js/custom.min.js"></script>
@endsection
