<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <canvas id="miCanvas" width="200" height="200"></canvas>

  <script>

    var canvas = document.getElementById('miCanvas');
    var ctx = canvas.getContext('2d');

    ctx.strokeStyle = 'black';
    var canvas_height = canvas.height;
    
    for(let i = 0; i < canvas_height;i = i + 10) {
        ctx.beginPath();
        ctx.moveTo(i, i/canvas_height);
        ctx.lineTo(0,200); 
        ctx.stroke();
    }
    
  </script>
</body>
</html>