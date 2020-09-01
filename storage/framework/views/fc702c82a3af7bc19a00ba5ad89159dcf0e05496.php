<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>COLOR APP</title>
  <!-- <link rel="stylesheet" href="http://localhost:3000/css/bootstrap4/dist/css/bootstrap-custom.css?v=datetime"> -->
  <link rel="stylesheet" href="<?php echo e(asset('css/polished.min.css')); ?>">
  <!-- <link rel="stylesheet" href="polaris-navbar.css"> -->
  <link rel="stylesheet" href="<?php echo e(asset('css/open-iconic-bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


  <style>
    .grid-highlight {
      padding-top: 1rem;
      padding-bottom: 1rem;
      background-color: #5c6ac4;
      border: 1px solid #202e78;
      color: #fff;
    }

    hr {
      margin: 6rem 0;
    }

    hr+.display-3,
    hr+.display-2+.display-3 {
      margin-bottom: 2rem;
    }

    canvas {
            cursor: crosshair;
    }

    
  </style>

  <!-- End Facebook Pixel Code -->

</head>

<body>

  <?php echo $__env->make('inc.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  <div class="container">
    <div class="row mt-5">
      <div class="col-md-6">
            <h5>Title:</h5>
            <p><?php echo e($product['title']); ?></p>
            <br>
            <h5>Description: </h5>
              <?php if(empty($product['body_html'])): ?>
                <p>No desciption availble</p> 
              <?php else: ?>
                <p><?php echo e($product['body_html']); ?></p>
              <?php endif; ?>   

	      <?php if($position): ?>
              	<h5>Croped Position:</h5>
	        <p>
		 Width: <?php echo e($position->crop_width); ?> px <br>
              	 Hieght: <?php echo e($position->crop_height); ?> px<br>
		 Top Left x cordinate: <?php echo e($position->top_left_x); ?> px<br>
		 Top Left y cordinate: <?php echo e($position->top_left_y); ?> px<br>
                 Bottom Right x cordinate: <?php echo e($position->bottom_right_x); ?> px<br>
		 Bottom Right y cordinate: <?php echo e($position->bottom_right_y); ?> px<br>

		
   	        </p>
	      <?php endif; ?>

	      
	             
      </div>
     
      <div class="col-md-6">
      
          <div class="text-center">
          <img src="<?php echo e($product['image']['src']); ?>" alt="No Image" id="img" class="d-none">
          <canvas id="canvas" ></canvas>
          <p class="text-primary">Note: Please draw on the image to select the area you want to place your design</p>

          
          <form action="<?php echo e(route('upload.crop', $product['id'])); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="top" value="" id="top">
            <input type="hidden" name="left" value="" id="left">
            <input type="hidden" name="bottom" value="" id="bottom">
            <input type="hidden" name="right" value="" id="right">
            <input type="hidden" name="img_width" value="" id="img_width">
            <input type="hidden" name="img_height" value="" id="img_height">
            <input type="hidden" name="crop_width" value="" id="crop_width">
            <input type="hidden" name="crop_height" value="" id="crop_height">

            <button class="btn btn-primary my-2">Save Croped Position</button>
            <div id="output"></div> 
          </form>
          </div>
            
          
        
      </div>
    </div>
  </div>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
            
      <?php if(Session::has('success')): ?>
          toastr.success("<?php echo e(Session::get('success')); ?>") ;
      <?php endif; ?>

      <?php if(Session::has('error')): ?>

          toastr.error("<?php echo e(Session::get('error')); ?>") ;
      <?php endif; ?>

  </script>


  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  
  
  <script>

  function getCursorPosition(canvas, event) {
      const rect = canvas.getBoundingClientRect();
      const x = event.clientX - rect.left;
      const y = event.clientY - rect.top;
      return { x, y };
  }

   //Canvas
   $(document).ready(function() {
    var canvas = document.getElementById('canvas');
    var ctx = canvas.getContext('2d');
    var imageObj = document.getElementById("img");
    
    //  imageObj.width = "500";
    //  imageObj.height = "500";
    
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
    var topLeft = 0;
    var mousex = mousey = 0;
    var mousedown = false;
    var drawn = false;
    var botRightX, botRightY;

    //Mousedown
    $(canvas).on('mousedown', function(e) {
      var pos = getCursorPosition(canvas, e);
      last_mousex = pos.x;
      last_mousey = pos.y;
      topLeft = pos;
    
      mousedown = true;
    });

    //Mouseup
    $(canvas).on('mouseup', function(e) {
    mousedown = false;
         botRightX = parseInt(e.clientX - canvasx);
         botRightY = parseInt(e.clientY - canvasy);
    });

    let width;
    let height; 
    let rectangle;

    //Mousemove
    $(canvas).on('mousemove', function(e) {
       
      var pos = getCursorPosition(canvas, e);
      mousex = pos.x;
      mousey = pos.y;

      
          
            if (mousedown) {
                ctx.clearRect(0, 0, canvas.width, canvas.height); //clear canvas
                ctx.drawImage(imageObj, 0, 0,imageObj.width,imageObj.height);
                ctx.setLineDash([5, 3]);
                ctx.beginPath();
                width = mousex - last_mousex;
                height = mousey - last_mousey;
                ctx.rect(last_mousex, last_mousey, width, height);
                
                ctx.strokeStyle = 'black';
                ctx.lineWidth = 3;
                ctx.stroke();
                

            }

            

            $('#output').html('bot_right: '+botRightX+', '+botRightY+'<br/>top_left: '+last_mousex+', '+last_mousey+'<br/>width:'+width+'<br/>height:'+height);

            document.getElementById("top").value = last_mousex;
            document.getElementById("left").value = last_mousey;
            document.getElementById("bottom").value = botRightX;
            document.getElementById("right").value = botRightY;
            document.getElementById("img_width").value = imageObj.width;
            document.getElementById("img_height").value = imageObj.height;
            document.getElementById("crop_width").value = width;
            document.getElementById("crop_height").value = height;

    });
   });
 

</script>
  
</body>

</html><?php /**PATH /home/176572.cloudwaysapps.com/vpjnvrwpkw/public_html/resources/views/product.blade.php ENDPATH**/ ?>