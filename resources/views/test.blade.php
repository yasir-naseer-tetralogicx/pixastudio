<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        canvas {
            cursor: crosshair;
            border: 1px solid #000000;
        }
    </style>
</head>
<body>
    <img src="{{ asset('download.jpg') }}" alt="" id="img">
<canvas id="canvas" width="800" height="500"></canvas>
<div id="output"></div> 

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
   //Canvas
   $(document).ready(function() {
    var canvas = document.getElementById('canvas');
    var ctx = canvas.getContext('2d');
    var imageObj = document.getElementById("img");
    ctx.canvas.width = imageObj.width;
    ctx.canvas.height = imageObj.height;
    imageObj.onload = function() {
        ctx.drawImage(imageObj, 0, 0,imageObj.width,imageObj.height);
    };

    imageObj.src = document.getElementById("img").getAttribute("src");

    //Variables
    var canvasx = $(canvas).offset().left;
    var canvasy = $(canvas).offset().top;
    var last_mousex = last_mousey = 0;
    var mousex = mousey = 0;
    var mousedown = false;
    var drawn = false;
    var botRightX, botRightY;

    //Mousedown
    $(canvas).on('mousedown', function(e) {
    last_mousex = parseInt(e.clientX - canvasx);
    last_mousey = parseInt(e.clientY - canvasy);
    mousedown = true;
    });

    //Mouseup
    $(canvas).on('mouseup', function(e) {
    mousedown = false;
         botRightX = parseInt(e.clientX - canvasx);
         botRightY = parseInt(e.clientY - canvasy);
    });

    //Mousemove
    $(canvas).on('mousemove', function(e) {
       
            mousex = parseInt(e.clientX - canvasx);
            mousey = parseInt(e.clientY - canvasy);
        
          
            if (mousedown) {
                ctx.clearRect(0, 0, canvas.width, canvas.height); //clear canvas
                ctx.drawImage(imageObj, 0, 0,imageObj.width,imageObj.height);

                ctx.beginPath();
                var width = mousex - last_mousex;
                var height = mousey - last_mousey;
                var rectangle = ctx.rect(last_mousex, last_mousey, width, height);
                ctx.strokeStyle = 'black';
                ctx.lineWidth = 10;
                ctx.stroke();
                

            }
        
   
    
    var x = Math.floor((e.pageX - canvasx) / imageObj.width * 10000)/100;
    var y = Math.floor((e.pageY - canvasy) /  imageObj.height* 10000)/100;



     $('#output').html(`

     `);
     $('#output').html('Top Left(x,y): ' + last_mousex + ', ' + last_mousey + '<br/>Bottom Right(x,y): ' + botRightX + ', ' + botRightY );
    });
   });
 

</script>
</body>
</html>