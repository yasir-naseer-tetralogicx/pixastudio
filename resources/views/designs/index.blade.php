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
  </style>
  <script type="text/javascript">
    document.documentElement.className = document.documentElement.className.replace('no-js', 'js') + (document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#BasicStructure", "1.1") ? ' svg' : ' no-svg');
  </script>
  <!-- Facebook Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '564839313686027');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=564839313686027&ev=PageView&noscript=1"
  /></noscript>
  <!-- End Facebook Pixel Code -->

</head>

<body>
  
  @include('inc.navbar')
   
  <div class="container h-100 p-0">
        
    
        <div class="col-lg-12 col-md-12 mt-5">
            <div class="row ">
              <div class="col-md-12 p-0 ">
                  <div class="">
                      <h3 class="float-left">Designs</h3>
                      <a class="btn btn-primary float-right text-white" data-toggle="modal" data-target="#createModel"> Add Design</a>
                  </div>
              </div>
            </div>

            <!-- start info box -->
            <div class="row mt-4">
              <div class="col-md-12  p-0 pt-2">
                  <table class="table table-striped shadow-0">
                      <thead >
                        <tr style="background: #202e78" class="text-white">
                          <th >Designs</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($designs)>0)
                          @foreach($designs as $design)
                            <tr>
                              <td>
                                <a href="{{ 'storage/'.$design->image}}" target="_blank"><img src="{{ 'storage/'.$design->image}}" alt="No image" style="width:150px; height:100px"></a>
				<h5 class="d-inline ml-2">{{ $design->name }}</h5>
                              </td>
                              
                              <td>
                                 <button type="button" data-toggle="modal" data-target="#deleteModal{{$design->id}}" class="btn btn-danger float-right" >
                                    Delete
                                  </button>
                              </td>   
                            </tr>

                            <!-- Delete modal -->
                            <div class="modal fade" id="deleteModal{{$design->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    You are going to delete the design
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form action="{{ route('designs.destroy', $design->id) }}" method="POST" >
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          @endforeach
                        @else
                          <tr>
                            <td colspan="3"><h5>No Design available</h5></td>
                          </tr>  
                        @endif
                      </tbody>
                  </table>

                    
              </div>
            </div>
            <!-- end info box -->

            
           <!-- Create modal -->
            <div class="modal fade" id="createModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a Design</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('designs.store') }}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        
                        <div class="form-group">
                            <label for="#">Design Name</label>
                            <input placeholder="Enter design name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="custom-file">
                            <label for="#">Design Image</label>
                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror d-none" id="customFile" name="image" >
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <br>
                    
                  </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" >Add Design</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>



        </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
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