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
        <h1>Matriz de Indicadores: <?=$_SESSION['ruc']?></h1>
        <table class="table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th scope="col" class="text-center" style="width: 40%;" colspan="3">Proceso</th>
                    <th scope="col" class="text-center" style="width: 60%;" colspan="4">Indicadores</th>
                </tr>
                <tr class="table-primary">
                    <th scope="col" class="text-center" style="width: 10%;">Titulo</th>
                    <th scope="col" class="text-center" style="width: 25%;">SubProceso</th>
                    <th scope="col" class="text-center" style="width: 5%;">Responsable</th>
                    <th scope="col" class="text-center" style="width: 5%;">Codigo</th>
                    <th scope="col" class="text-center" style="width: 45%;">Titulo</th>
                    <th scope="col" class="text-center" style="width: 5%;">Unidad</th>
                    <th scope="col" class="text-center" style="width: 5%;">Responsable</th>
                </tr>
            </thead>
            <tbody>
                <!-- @php
                    $i=0;
                    $j=0;
                @endphp
                @foreach($proceso as $proc)
                    <tr>
                        <td rowspan="{{$partProceso[$i]}}"  class="align-middle table-light text-center">{{$proc->pro_nombre}}</td>
                        @foreach($subproceso as $sub)
                            @if($proc->pro_id == $sub->pro_id)
                                <td class="align-middle table-light text-center">{{$sub->sub_nombre}}</td>
                                <td class="align-middle table-light text-center">{{$sub->sub_responsable}}</td>
                                @php
                                    echo $partSub[$j];
                                    $j=$j+1;
                                @endphp
                                @foreach($indicador as $ind)
                                    @if($sub->sub_id == $ind->sub_id)
                                        <td class="align-middle table-light text-center">{{$ind->ind_id}}</td>
                                        <td class="align-middle table-light text-center">{{$ind->ind_nombre}}</td>
                                        <td class="align-middle table-light text-center">{{$ind->ind_unidad}}</td>
                                        <td class="align-middle table-light text-center">{{$ind->ind_responsable}}</td>
                                       
                                    @endif
                                @endforeach
                            @endif
                            
                        @endforeach
                    </tr>
                    @php
                        $i=$i+1;
                    @endphp
                @endforeach -->
                <!-- <tr>
                    <td rowspan="4">Gestion Administrativa</td>
                    <td>Elaboracion del Plan de Trabajo</td>
                    <td rowspan="3">Administrador</td>
                    <td>1</td>
                    <td>Rentabilidad ventas</td>
                    <td>%</td>
                    <td>Aministrador</td>
                    
                </tr>
                <tr>
                    <td>Gestion Administrativa</td>
                    <td>Seguimiento procesos</td>
                    <td rowspan="1">Administrador</td>
                    <td>2</td>
                    <td>Rentabilidad sobre los activos</td>
                    <td>%</td>
                    <td>Administrador</td>
                </tr>
                <tr>
                    
                    <td>Administrador</td>
                    <td>3</td>
                    <td>Rentabilidad compras</td>
                    <td>%</td>
                    <td>Administrador</td>
                </tr>
                <tr>
                    <td>Gestion Administrativa</td>
                    <td>Seguimiento procesos</td>
                    <td>Administrador</td>
                    <td>4</td>
                    <td>Rentabilidad inversion</td>
                    <td>%</td>
                    <td>Administrador</td>
                </tr> -->
                <!-- <tr>
                    <td>Seguimiento</td>
                    <td>Administrador</td>
                    <td>2</td>
                    <td>Rentabilidad sobre los activos</td>
                    <td>%</td>
                    <td>Administrador</td>
                </tr> -->
                
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
