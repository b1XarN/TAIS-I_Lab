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
    
    @foreach($estrategiaP1 as $est1)
        <input type="hidden" class="estrat1" value="{{$est1->est_nombre}}">
    @endforeach

    @foreach($estrategiaP2 as $est2)
        <input type="hidden" class="estrat2" value="{{$est2->est_nombre}}">
    @endforeach

    @foreach($estrategiaP3 as $est3)
        <input type="hidden" class="estrat3" value="{{$est3->est_nombre}}">
    @endforeach

    @foreach($estrategiaP4 as $est4)
        <input type="hidden" class="estrat4" value="{{$est4->est_nombre}}">
    @endforeach

    <canvas></canvas>


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
    <script src="https://frogcat.github.io/canvas-arrow/canvas-arrow.js"></script>
    <script type="text/javascript">
        var canvas = document.querySelector('canvas');

        // var x = 220;
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        var c = canvas.getContext('2d');
        
        c.font="italic 35px Verdana";
        c.fillText('Mapa Estrategico',450,100,1000);

        c.font="25px Verdana";
        c.fillStyle="black";
        c.fillText('Financiera',80,230,1000);
        c.strokeStyle="green";
        c.strokeRect(80,180,170,100);

        c.beginPath();
        c.arrow(160,320, 160,280, [0, 1, -10, 1, -10, 5]);
        c.fill();

        c.font="25px Verdana";
        c.fillText('Clientes',80,360,1000);
        c.strokeStyle="yellow";
        c.strokeRect(80,320,170,100);

        c.beginPath();
        c.arrow(160,460, 160, 420, [0, 1, -10, 1, -10, 5]);
        c.fill();


        c.font="25px Verdana";
        c.fillText('Procesos',80,490,1000);
        c.fillText('Internos',80,510,1000);
        c.strokeStyle="orange";
        c.strokeRect(80,460,170,100);

        c.beginPath();
        
        c.arrow(160,600, 160, 560, [0, 1, -10, 1, -10, 5]);
        c.fill();

        c.font="25px Verdana";
        c.fillText('Aprendizaje',80,640,1000);
        c.fillText('y Crecimiento',80,660,1000);
        c.strokeStyle="blue";
        c.strokeRect(80,600,170,100);

        c.strokeStyle="black";
        c.beginPath();
        c.moveTo(300,580);
        c.lineTo(1100,580);
        c.stroke();

        c.beginPath();
        c.moveTo(300,440);
        c.lineTo(1100,440);
        c.stroke();


        c.beginPath();
        c.moveTo(300,300);
        c.lineTo(1100,300);
        c.stroke();

        let estrat1 = document.getElementsByClassName("estrat1");
        let estrat2 = document.getElementsByClassName("estrat2");
        let estrat3 = document.getElementsByClassName("estrat3");
        let estrat4 = document.getElementsByClassName("estrat4");

        let estrat1_array = [];
        for(let i = 0; i<estrat1.length; i++){
            estrat1_array.push(estrat1[i].value);
        }

        let estrat2_array = [];
        for(let i = 0; i<estrat2.length; i++){
            estrat2_array.push(estrat2[i].value);
        }
        
        let estrat3_array = [];
        for(let i = 0; i<estrat3.length; i++){
            estrat3_array.push(estrat3[i].value);
        }

        let estrat4_array = [];
        for(let i = 0; i<estrat4.length; i++){
            estrat4_array.push(estrat4[i].value);
        }

        console.log(estrat1_array);
        console.log(estrat2_array);
        console.log(estrat3_array);
        console.log(estrat4_array);
        
        let cont1=0;
        let aux1="";
        for(let i=0; i<estrat1_array.length; i++){
            c.beginPath();
            c.font="16px Times New Roman";
            if(estrat1_array[i].length>20){
                c.fillText(estrat1_array[i].substring(0,20),310+cont1,650,1000);
                c.fillText(estrat1_array[i].substring(20,estrat1_array[i].length),310+cont1,660,1000);
            }else{
                c.fillText(estrat1_array[i],310+cont1,650,1000);
            }
            c.strokeStyle="blue";
            c.arc(380+cont1,650,69,0, Math.PI * 2, false);
            c.stroke();
            cont1=cont1+150;
        }

        let cont2=0;
        for(let i=0; i<estrat2_array.length; i++){
            c.beginPath();
            c.font="16px Times New Roman";
            if(estrat2_array[i].length>20){
                c.fillText(estrat2_array[i].substring(0,20),330+cont2,510,1000);
                c.fillText(estrat2_array[i].substring(20,estrat2_array[i].length),330+cont2,520,1000);
            }else{
                c.fillText(estrat2_array[i],330+cont2,510,1000);
            }
            // c.fillText(estrat2_array[i],330+cont2,510,1000);
            c.strokeStyle="orange";
            c.arc(400+cont2,510,69,0, Math.PI * 2, false);
            c.stroke();
            cont2=cont2+150;
        }


        let cont3=0;
        for(let i=0; i<estrat3_array.length; i++){
            c.beginPath();
            c.font="16px Times New Roman";
            if(estrat3_array[i].length>20){
                c.fillText(estrat3_array[i].substring(0,20),350+cont3,370,1000);
                c.fillText(estrat3_array[i].substring(20,estrat3_array[i].length),350+cont3,380,1000);
            }else{
                c.fillText(estrat3_array[i],350+cont3,370,1000);
            }
            // c.fillText(estrat3_array[i],350+cont3,370,1000);
            c.strokeStyle="yellow";
            c.arc(420+cont3,370,69,0, Math.PI * 2, false);
            c.stroke();
            cont3=cont3+150;
        }

        let cont4=0;
        for(let i=0; i<estrat4_array.length; i++){
            c.beginPath();
            c.font="16px Times New Roman";
            if(estrat4_array[i].length>20){
                c.fillText(estrat4_array[i].substring(0,20),370+cont4,230,1000);
                c.fillText(estrat4_array[i].substring(20,estrat4_array[i].length),370+cont4,240,1000);
            }else{
                c.fillText(estrat4_array[i],370+cont4,230,1000);
            }
            // c.fillText(estrat4_array[i],370+cont4,230,1000);
            c.strokeStyle="green";
            c.arc(440+cont4,230,69,0, Math.PI * 2, false);
            c.stroke();
            cont4=cont4+150;
        }


        

    </script>
@endsection
