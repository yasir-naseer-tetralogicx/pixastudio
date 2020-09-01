<!DOCTYPE html>
<!--[if IE 9]> <html class="ie9 no-js" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>COLOR APP</title>
  <!-- <link rel="stylesheet" href="http://localhost:3000/css/bootstrap4/dist/css/bootstrap-custom.css?v=datetime"> -->
  <link rel="stylesheet" href="{{ asset('css/polished.min.css') }}">
  <!-- <link rel="stylesheet" href="polaris-navbar.css"> -->
  <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

 

  <style>
     </style>
  <script type="text/javascript">
    document.documentElement.className = document.documentElement.className.replace('no-js', 'js') + (document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#BasicStructure", "1.1") ? ' svg' : ' no-svg');
  </script>



</head>

<body>

  @include('inc.navbar')


  <div class="container h-100">
       
        <div class="col-lg-12 col-md-12 mt-5">
          <h3>Products</h3>
        </div>

            <!-- start info box -->
            
              <div class="col-md-12 pl-3 pt-2 mt-4">
                  <div class="row pl-3">
                  <table class="table table-striped shadow-0">
                      <thead >
                        <tr style="background: #202e78" class="text-white">
                          <th>Title</th>
                          
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($products)>0) 
                          @foreach($products as $product) 
                              <tr>
                                  <td><img src="{{ $product['image']['src'] }}" alt="No image" style="width:100px; height:100px">
                                      <a class="ml-3" href="{{ route('product', $product['id']) }}" target="_blank">{{ $product['title'] }}</a>
                                  </td>
                                  <td class="">
				     <div class="d-flex justify-content-end align-items-center">
					<a href="{{ route('product', $product['id']) }}" class="btn btn-primary">View</a>
				     </div>
				  </td>
                              </tr>
                          @endforeach
                        @else
                          <tr>
                            <td colspan="5"><h5>No Products Available</h5></td>
                          </tr>
                        @endif
                      </tbody>
                  </table>

                    
                  </div>
              
            </div>
            <!-- end info box -->





        </div>
      </div>
  
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
     
       
      @if(Session::has('success'))
          toastr.success("{{ Session::get('success') }}") ;
      @endif

      @if(Session::has('error'))
          toastr.error("{{ Session::get('error') }}") ;
      @endif
  </script>
  
  
  
</body>

</html>