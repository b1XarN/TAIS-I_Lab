@extends('plantilla')

@section('estilos')
    <link href="../gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="../gentelella-master/build/css/custom.min.css" rel="stylesheet">
@endsection
    
@section('contenido')
    <canvas></canvas>
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
    <script src="https://frogcat.github.io/canvas-arrow/canvas-arrow.js"></script>
    <script type="text/javascript">
        var canvas = document.querySelector('canvas');

        var x = 220;

        let texto = 'Alex gay';

        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        var c = canvas.getContext('2d');

        // c.fillRect(100,100,100,100);
        // c.fillRect(200,200,100,100);
        // c.fillRect(300,300,100,100);

        c.beginPath();
        c.fillText(texto,250,300,1000);
        c.arc(70+x,300,60,0, Math.PI * 2, false);
        c.strokeStyle = 'green';
        c.stroke();

        c.beginPath();
        c.arrow(130+x,300, 200+x, 300, [0, 1, -10, 1, -10, 5]);
        c.fill();

        c.strokeRect(200+x,250,170,100);

        c.beginPath();
        c.arrow(370+x,300, 440+x, 300, [0, 1, -10, 1, -10, 5]);
        c.fill();

        c.beginPath();
        c.arc(500+x,300,60,0, Math.PI * 2, false);
        c.strokeStyle = 'green';
        c.stroke();

        c.beginPath();
        c.arrow(560+x,300, 600+x, 300, [0, 1, -10, 1, -10, 5]);
        c.fill();

        c.strokeRect(600+x,240,170,115);

        c.beginPath();
        c.arrow(240+x,400, 240+x, 350, [0, 1, -10, 1, -10, 5]);
        c.fill();

        c.beginPath();
        c.arrow(490+x,400, 490+x, 360, [0, 1, -10, 1, -10, 5]);
        c.fill();

        c.strokeRect(170+x,400,410,115);

        c.beginPath();
        c.arrow(610+x,460, 580+x, 460, [0, 1, -10, 1, -10, 5]);
        c.fill();

        c.strokeRect(610+x,410,170,100);


        console.log(canvas);

    </script>
@endsection
