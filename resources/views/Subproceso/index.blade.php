@extends('plantilla')

@section('estilos')
    <link href="../gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="../gentelella-master/build/css/custom.min.css" rel="stylesheet">
@endsection

@section('contenido')
    @php
    session_start();
    @endphp
    <div class="container">
        <h2 class="text-center fs-3 fw-bolder">LISTA DE SUBPROCESOS</h2>
        <a href="{{ route('subproceso.create', 12345678901) }}" class="btn btn-primary"><i class="fa fa-plus-square-o"></i> Nuevo Registro</a>
        <form class="d-flex float-right">
            <input name="buscarpor1" class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search"
                value="{{ $buscarpor }}">
            <button name="buscar1" class="btn btn-success" type="submit" value="buscar">Buscar</button>
        </form>
        @if (session('datos'))
            <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                {{ session('datos') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th scope="col" class="text-center" style="width: 10px;">N°</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Responsable</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $int = 1;
                @endphp
                @foreach ($subproceso as $item)
                    <tr>
                        <th class="align-middle" scope="row">{{ $int }}</th>
                        <td class="align-middle">{{ $item->sub_nombre }}</td>
                        <td class="align-middle">{{ $item->sub_responsable }}</td>
                        <td class="align-middle">
                            <a href="{{ route('subproceso.edit', $item->sub_id) }}" class="btn btn-info btn-sm"><i
                                    class="fa fa-edit"> </i>Editar</a>
                            <a href="{{ route('subproceso.show', $item->sub_id) }}" class="btn btn-danger btn-sm"><i
                                    class="fa fa-trash"></i>Eliminar</a>
                        </td>
                    </tr>
                    @php
                        $int = $int + 1;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script src="../gentelella-master/vendors/jquery/dist/jquery.min.js"></script>
    <script src="../gentelella-master/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../gentelella-master/vendors/fastclick/lib/fastclick.js"></script>
    <script src="../gentelella-master/vendors/nprogress/nprogress.js"></script>
    <script src="../gentelella-master/vendors/Chart.js/dist/Chart.min.js"></script>
    <script src="../../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <script src="../gentelella-master/vendors/Flot/jquery.flot.js"></script>
    <script src="../gentelella-master/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../gentelella-master/vendors/Flot/jquery.flot.time.js"></script>
    <script src="../gentelella-master/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../gentelella-master/vendors/Flot/jquery.flot.resize.js"></script>
    <script src="../gentelella-master/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../gentelella-master/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../gentelella-master/vendors/flot.curvedlines/curvedLines.js"></script>
    <script src="../gentelella-master/vendors/DateJS/build/date.js"></script>
    <script src="../gentelella-master/vendors/moment/min/moment.min.js"></script>
    <script src="../gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="../gentelella-master/build/js/custom.min.js"></script>
@endsection
