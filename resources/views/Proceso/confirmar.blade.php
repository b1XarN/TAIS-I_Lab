@extends('plantilla')

@section('estilos')
    <link href="../../gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../../gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="../../gentelella-master/build/css/custom.min.css" rel="stylesheet">
@endsection


@section('contenido')
@php
  session_start();
@endphp
<div class="container">
  <h1>Desea eliminar registro? {{$proceso->descripcion}}</h1>
  <form method="POST" action="{{ route('proceso.destroy', $proceso->pro_id)}}">
    @method ('delete')
    @csrf
    <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i>SI</button>
    <a href="{{route('cancelarproceso',$proceso->emp_ruc)}}" class="btn btn-primary" ><i class="fas fa-times-circle"> </button></i>NO</a>
  </form>
</div>
@endsection


@section('scripts')
    <script src="../../gentelella-master/vendors/jquery/dist/jquery.min.js"></script>
    <script src="../../gentelella-master/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../gentelella-master/vendors/fastclick/lib/fastclick.js"></script>
    <script src="../../gentelella-master/vendors/nprogress/nprogress.js"></script>
    <script src="../../gentelella-master/vendors/Chart.js/dist/Chart.min.js"></script>
    <script src="../../../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <script src="../../gentelella-master/vendors/Flot/jquery.flot.js"></script>
    <script src="../../gentelella-master/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../../gentelella-master/vendors/Flot/jquery.flot.time.js"></script>
    <script src="../../gentelella-master/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../../gentelella-master/vendors/Flot/jquery.flot.resize.js"></script>
    <script src="../../gentelella-master/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../../gentelella-master/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../../gentelella-master/vendors/flot.curvedlines/curvedLines.js"></script>
    <script src="../../gentelella-master/vendors/DateJS/build/date.js"></script>
    <script src="../../gentelella-master/vendors/moment/min/moment.min.js"></script>
    <script src="../../gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="../../gentelella-master/build/js/custom.min.js"></script>
@endsection