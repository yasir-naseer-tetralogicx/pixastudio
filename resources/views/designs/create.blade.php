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

    <nav class="navbar navbar-expand p-0">
     <a class="navbar-brand text-center col-xs-12 col-md-3 col-lg-2 mr-0" href="{{ route('dashboard') }}">COLOR APP</a>
      <button class="btn btn-link d-block d-md-none" data-toggle="collapse" data-target="#sidebar-nav" role="button" >
        <span class="oi oi-menu"></span>
      </button>
      
      
    </nav>

  <div class="container-fluid h-100 p-0">
    <div style="min-height: 100%" class="flex-row d-flex align-items-stretch m-0">
        <div class="polished-sidebar bg-light col-12 col-md-3 col-lg-2 p-0 collapse d-md-inline" id="sidebar-nav">

            <ul class="polished-sidebar-menu ml-0 pt-4 p-0 d-md-block">
              <input class="border-dark form-control d-block d-md-none mb-4" type="text" placeholder="Search" aria-label="Search" />
              <li class=""><a href="{{ route('dashboard') }}"><span class="oi oi-dashboard"></span> Dashboard</a></li>
              <li class="active"><a href="{{ route('designs.index') }}"><span class="oi oi-dashboard"></span> Design</a></li>
              <li class=""><a href="{{ route('products') }}"><span class="oi oi-dashboard"></span> Products</a></li>
              <li class=""><a href="{{ route('customers') }}"><span class="oi oi-dashboard"></span> Customers</a></li>
              <li class=""><a href="{{ route('orders') }}"><span class="oi oi-dashboard"></span> Orders</a></li>
              
            </ul>
         
        </div>
        <div class="col-lg-10 col-md-9 p-4">
            <div class="row ">
              <div class="col-md-12 pl-3 pt-2">
                  <div class="pl-3">
                      <h3 class="float-left mb-5">
                      @isset($design)
                        Edit Design
                      @else
                        Create Design
                      @endisset
                      </h3>
                      <a class="btn btn-primary float-right" href="{{ route('designs.index') }}"> View All Design</a>
                  </div>
              </div>
            </div>

            <!-- start info box -->
            <div class="row ">
              <div class="col-md-12 pl-3 bg-white">
                    <form action="{{ isset($design) ? route('designs.update', $design->id) : route('designs.store') }}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        @isset($design)
                          @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label for="#">Design Name</label>
                            <input placeholder="Enter design name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($design) ? $design->name : '' }}" >
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
                        <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block mt-3" value="{{isset($design) ? 'Update Design' : 'Add Design'}}">
                        </div>
                    </form>
              </div>
            </div>
            <!-- end info box -->





        </div>
      </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
</body>

</html>


<!-- Editing code -->
<button type="button" data-toggle="modal" data-target="#editModal{{$design->id}}" class="btn btn-success" >
                                    Edit
                                  </button>
 <!-- Edit modal -->
 <div class="modal fade" id="editModal{{$design->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit a Design</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="{{ route('designs.update', $design->id) }}" method="POST" enctype='multipart/form-data'>
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="#">Design Name</label>
                                            <input placeholder="Enter design name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $design->name }}"  >
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
                                      <button type="submit" class="btn btn-primary" >Update Design</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>