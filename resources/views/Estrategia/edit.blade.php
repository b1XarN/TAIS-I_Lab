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
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Editar indicador</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="POST" action="{{ route('estrategia.update', $estrategia->est_id) }}" id="demo-form2"
                        data-parsley-validate class="form-horizontal form-label-left">
                        @method('put')
                        @csrf
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 col-lg-2 label-align"
                                for="first-name">Descripción
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-lg-8">
                                <input type="text" id="descripcion" name="descripcion" required="required"
                                    class="form-control" value="{{$estrategia->est_nombre}}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 col-lg-2 label-align" for="last-name">Perspectiva
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-lg-8">
                                <select id="perspectiva" name="perspectiva" class="form-control" required>
                                    @foreach ($perspectiva as $item)
                                        @if ($item === reset($perspectiva))
                                            <option selected value="{{ $item->per_id }}">{{ $item->per_nombre }}
                                            </option>
                                        @endif
                                        <option value="{{ $item->per_id }}">{{ $item->per_nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Registrar</button>
                                <a href="{{ route('cancelaestrategia', $estrategia->sub_id) }}" class="btn btn-primary"
                                    type="button"><i class="fa fa-ban"></i> Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
