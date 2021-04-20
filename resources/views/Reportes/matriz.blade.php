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
        <h2 class="text-center text-uppercase">MATRIZ DE INDICADORES ({{ $empresa->emp_nombre }})</h2>
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
                @php
                    $i = 0;
                    $j = 0;
                    $k = 0;
                    $l = 0;
                @endphp
                @foreach ($proceso as $item)
                    @php
                        $j = 0;
                    @endphp
                    <tr>
                        <td rowspan="{{ $partProceso[$i] }}">{{ $item->pro_nombre }}</td>
                        @foreach ($subproceso as $item2)
                            @php
                                $l = 0;
                            @endphp
                            @if ($item2->pro_id == $proceso[$i]->pro_id)
                                @if ($j == 0)
                                    <td rowspan="{{$partSub[$k]}}">{{ $item2->sub_nombre }}</td>
                                    <td rowspan="{{$partSub[$k]}}">{{ $item2->sub_responsable }}</td>
                                    @php
                                        $j=1;
                                    @endphp
                                    @foreach($indicador as $item3)
                                        @if ($item3->sub_id==$subproceso[$k]->sub_id)
                                            @if ($l==0)
                                                <td>{{$item3->ind_id}}</td>
                                                <td>{{$item3->ind_nombre}}</td>
                                                <td>{{$item3->ind_unidad}}</td>
                                                <td>{{$item3->ind_responsable}}</td></tr>
                                                @php
                                                    $l=1;
                                                @endphp
                                            @else
                                                <tr>
                                                    <td>{{$item3->ind_id}}</td>
                                                    <td>{{$item3->ind_nombre}}</td>
                                                    <td>{{$item3->ind_unidad}}</td>
                                                    <td>{{$item3->ind_responsable}}</td>
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                    @if ($l==0)
                                        <td></td><td></td><td></td><td></td></tr>
                                    @endif
                                    
                                @else
                                    <tr>
                                        <td rowspan="{{$partSub[$k]}}">{{ $item2->sub_nombre }}</td>
                                        <td rowspan="{{$partSub[$k]}}">{{ $item2->sub_responsable }}</td>
                                        @foreach($indicador as $item3)
                                            @if ($item3->sub_id==$subproceso[$k]->sub_id)
                                                @if ($l==0)
                                                    <td>{{$item3->ind_id}}</td>
                                                    <td>{{$item3->ind_nombre}}</td>
                                                    <td>{{$item3->ind_unidad}}</td>
                                                    <td>{{$item3->ind_responsable}}</td></tr>
                                                    @php
                                                        $l=1;
                                                    @endphp
                                                @else
                                                    <tr>
                                                        <td>{{$item3->ind_id}}</td>
                                                        <td>{{$item3->ind_nombre}}</td>
                                                        <td>{{$item3->ind_unidad}}</td>
                                                        <td>{{$item3->ind_responsable}}</td>
                                                    </tr>
                                                @endif
                                            @endif
                                        @endforeach
                                        @if ($l==0)
                                            <td></td><td></td><td></td><td></td></tr>
                                        @endif      
                                @endif
                                @php
                                    $k++;
                                @endphp
                            @endif
                        @endforeach
                        @if ($j==0)
                            <td></td><td></td><td></td><td></td><td></td><td></td></tr>
                        @endif                                
                    @php
                        $i++;
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
    <script src="../gentelella-master/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
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
