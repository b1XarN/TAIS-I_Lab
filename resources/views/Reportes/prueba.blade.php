<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Canvas</title>
    <style>
        canvas{
            border: 1px solid black;
        }
        body{
            margin: 0;
        }
    </style>
</head>
<body>
    <canvas></canvas>
    <!-- <div style="width: 220px; height: 150px; background: red; border-radius: 100%;">
    <br>
        <p style="text-align:center;">asdasdasdasdasdasd</p>
        <p style="text-align:center;">ffffff</p>
    </div> -->
    <script src="https://frogcat.github.io/canvas-arrow/canvas-arrow.js"></script>
    <script type="text/javascript">
        var canvas = document.querySelector('canvas');

        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        var c = canvas.getContext('2d');

        // c.fillRect(100,100,100,100);
        // c.fillRect(200,200,100,100);
        // c.fillRect(300,300,100,100);

        c.beginPath();
        // c.fillText('asdasda',10,10,50);
        c.arc(70,300,60,0, Math.PI * 2, false);
        c.strokeStyle = 'green';
        c.stroke();

        c.beginPath();
        c.arrow(130,300, 200, 300, [0, 1, -10, 1, -10, 5]);
        c.fill();

        c.strokeRect(200,250,170,100);

        c.beginPath();
        c.arrow(370,300, 440, 300, [0, 1, -10, 1, -10, 5]);
        c.fill();

        c.beginPath();
        c.arc(500,300,60,0, Math.PI * 2, false);
        c.strokeStyle = 'green';
        c.stroke();

        c.beginPath();
        c.arrow(560,300, 600, 300, [0, 1, -10, 1, -10, 5]);
        c.fill();

        c.strokeRect(600,240,170,115);

        c.beginPath();
        c.arrow(240,400, 240, 350, [0, 1, -10, 1, -10, 5]);
        c.fill();

        c.beginPath();
        c.arrow(490,400, 490, 360, [0, 1, -10, 1, -10, 5]);
        c.fill();

        c.strokeRect(170,400,410,115);

        c.beginPath();
        c.arrow(610,460, 580, 460, [0, 1, -10, 1, -10, 5]);
        c.fill();

        c.strokeRect(610,410,170,100);


        console.log(canvas);

    </script>
</body>
</html>