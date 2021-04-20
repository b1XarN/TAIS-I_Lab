@extends('plantilla')

@section('estilos')
    <link href="../gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="../gentelella-master/build/css/custom.min.css" rel="stylesheet">
@endsection
    
@section('contenido')
   
    <input type="hidden" id="objetivo" value="{{$indicador->ind_objetivo}}">
    <input type="hidden" id="nombre" value="{{$indicador->ind_nombre}}">
    <input type="hidden" id="meta" value="{{$indicador->ind_meta}}">
    <input type="hidden" id="rojo" value="{{$indicador->ind_rojo}}">
    <input type="hidden" id="amarillo" value="{{$indicador->ind_amarillo}}">
    <input type="hidden" id="verde" value="{{$indicador->ind_verde}}">
    <input type="hidden" id="responsable" value="{{$indicador->ind_responsable}}">
    @foreach($iniciativa as $ini)
        
        <input type="hidden" class="iniciativa" value="{{$ini->ini_nombre}}">

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

        var x = 220;
        let objetivo = document.getElementById('objetivo').value;
        let nombre = document.getElementById('nombre').value;
        let meta = document.getElementById('meta').value;
        let rojo = document.getElementById('rojo').value;
        let amarillo = document.getElementById('amarillo').value;
        let verde = document.getElementById('verde').value;
        let responsable = document.getElementById('responsable').value;
        
        let nombre2 = nombre.substring(29, nombre.length);
        console.log('ayayayayayayaya');
        console.log(nombre2);
        console.log('ayayayayayayaya');

        console.log(objetivo);
        console.log("--------------------------------");
        let iniciativas = document.getElementsByClassName("iniciativa");
        console.log(iniciativas.length);
        console.log("--------------------------------");
        let iniciativas_array = [];
        console.log("|||||||||||||||||||||||||||||||||||");
        for(let i = 0; i<iniciativas.length; i++){
            iniciativas_array.push(iniciativas[i].value);
        }
        console.log(iniciativas_array);

        console.log("|||||||||||||||||||||||||||||||||||");

        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        var c = canvas.getContext('2d');

        // c.fillRect(100,100,100,100);
        // c.fillRect(200,200,100,100);
        // c.fillRect(300,300,100,100);


        c.font="italic 35px Verdana";
        c.fillText('Tablero de Control',450,100,1000);
        c.beginPath();
        c.font="18px Verdana";
        c.fillText('Objetivo',253,275,1000);
        c.font="16px Times New Roman";
        c.fillText(objetivo,243,310,1000);
        c.arc(70+x,300,60,0, Math.PI * 2, false);
        c.strokeStyle = 'black';
        c.stroke();

        c.beginPath();
        c.arrow(130+x,300, 200+x, 300, [0, 1, -10, 1, -10, 5]);
        c.fill();

        c.font="18px Verdana";
        c.fillText('Indicador',460,275,1000);
        c.font="14px Times New Roman";
        if(nombre2 != ""){
            c.fillText(nombre.substring(0,29),420,310,1000);
            c.fillText(nombre2,420,323,1000 )
        }else{
            c.fillText(nombre,420,310,1000);
        }
        c.strokeRect(200+x,250,170,100);

        c.beginPath();
        c.arrow(370+x,300, 440+x, 300, [0, 1, -10, 1, -10, 5]);
        c.fill();

        c.beginPath();
        c.font="18px Verdana";
        c.fillText('Meta',695,275,1000);
        c.font="14px Times New Roman";
        c.fillText(meta,670,310,1000);
        c.arc(500+x,300,60,0, Math.PI * 2, false);
        c.stroke();

        c.beginPath();
        c.arrow(560+x,300, 600+x, 300, [0, 1, -10, 1, -10, 5]);
        c.fill();

        c.font="18px Verdana";
        c.fillText('Semaforo',860,265,1000);
        c.strokeRect(600+x,240,170,115);
        c.beginPath();
        c.arc(840,285,10,0, Math.PI * 2, false);
        c.fillStyle = 'red';
        c.fill();
        c.font="14px Times New Roman";
        c.fillText(rojo,855,288,1000);
        c.beginPath();
        c.arc(840,310,10,0, Math.PI * 2, false);
        c.fillStyle = 'yellow';
        c.fill();
        c.font="14px Times New Roman";
        c.fillText(amarillo,855,313,1000);
        c.beginPath();
        c.arc(840,340,10,0, Math.PI * 2, false);
        c.fillStyle = 'green';
        c.fill();
        c.font="14px Times New Roman";
        c.fillText(verde,855,343,1000);

        c.fillStyle = "black";
        c.beginPath();
        c.arrow(240+x,400, 240+x, 350, [0, 1, -10, 1, -10, 5]);
        c.fill();

        c.beginPath();
        c.arrow(490+x,400, 490+x, 360, [0, 1, -10, 1, -10, 5]);
        c.fill();


        c.font="18px Verdana";
        c.fillText('Iniciativas',540,420,1000);
        c.font="14px Times New Roman";
        let cont = 0;
        for(let i = 0; i<iniciativas.length; i++){
            c.fillText(iniciativas[i].value,170+x,440+cont,1000);
            cont= cont +20;
        }
        c.strokeRect(170+x,400,410,115);

        c.beginPath();
        c.arrow(610+x,460, 580+x, 460, [0, 1, -10, 1, -10, 5]);
        c.fill();

        c.font="18px Verdana";
        c.fillText('Responsable',860,430,1000);
        c.font="14px Times New Roman";
        c.fillText(responsable,610+x,460,1000);
        c.strokeRect(610+x,410,170,100);


        console.log(canvas);

    </script>
@endsection
