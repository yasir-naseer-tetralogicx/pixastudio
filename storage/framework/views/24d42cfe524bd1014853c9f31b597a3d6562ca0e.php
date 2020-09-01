<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PIXASTUDIO</title>
  
  <link rel="stylesheet" href="<?php echo e(asset('css/polished.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/open-iconic-bootstrap.min.css')); ?>">

</head>

<body>

    <?php echo $__env->make('inc.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="container h-100 p-0">
       
        <div class="col-lg-12 col-md-12 p-4">
            <div class="row ">
              <div class="col-md-12 pl-3 pt-2">
                  <div class="pl-3">
                      <h3>Desinged Images</h3>
                  </div>
              </div>
            </div>

            <!-- start info box -->
            <div class="row ">
              <div class="col-md-12 pl-3 pt-2">
                  <div class="row pl-3">

                    <div class="col-md-6 col-lg-3 col-12 mb-2 col-sm-6">
                      <div class="media shadow-sm p-0 bg-white rounded text-primary ">
                        <span class="oi top-0 rounded-left bg-primary text-light h-100 p-4 oi-badge fs-5"></span>
                        <div class="media-body p-2">
                          <h6 class="media-title m-0">Products</h6>
                          <div class="media-text">
                            <h3>324</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  
                </div>
              </div>
            </div>
            <!-- end info box -->





        </div>
      </div>
  

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <script>
	$(document).ready(function() {
	  $.ajax({
      	    url: '/get/color/design',
            type: 'GET',
            success: function(res) {
	     alert("hi");
	    },
	  });

	});
  </script>
  
</body>

</html><?php /**PATH /home/176572.cloudwaysapps.com/vpjnvrwpkw/public_html/resources/views/designed-images.blade.php ENDPATH**/ ?>