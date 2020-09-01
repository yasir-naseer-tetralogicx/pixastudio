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

  @include('inc.navbar')

  <div class="container h-100 p-0">
   
        
    <div class="container h-100 ">
      <div class="col-lg-12 col-md-12 mt-5 p-0">
        <h3>Customers</h3>
    </div>

            <!-- start info box -->
            <div class="row mt-4">
              <div class="col-md-12 pl-3 pt-2">
                  <table class="table table-striped shadow-0">
                      <thead >
                        <tr style="background: #202e78" class="text-white">
                          <th>Name</th>
                          <th>Email</th>
                          
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($customers)>0)
                          @foreach($customers as $customer) 
                              <tr>
                                  <td>{{ $customer['first_name'] }} {{ $customer['last_name'] }}  </td>
                                  <td>{{ $customer['email'] }}</td>
                                  
                                  <td><a href="#" class="btn btn-primary float-right">View Gallery</a></td>
                              </tr>
                          @endforeach
                        @else
                          <tr>
                            <td colspan="4"><h5>No Customers Available</h5></td>
                          </tr>
                        @endif
                      </tbody>
                  </table>  
              </div>
            </div>
            <!-- end info box -->





        </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
  <script>


  let ctxArea = document.getElementById('sales')

  var dataArea = {
    labels: ["Jan", "Feb", "March", "April", "May", "June"],
    datasets: [{
      label: 'Sales',
      data: [20,10,40,50, 75,80],
      backgroundColor: '#6CCC64'
    }, {
      label: 'Add to Cart',
      data: [40,30,54,60,60,99],
      backgroundColor: '#FDD638'
    }]
  }

  var myAreaChart = new Chart(ctxArea, {
    type: 'line',
    data: dataArea
  })

  var ctxDoughnut = document.getElementById('top-sales-by-category')
  var myDoughnutChart = new Chart(ctxDoughnut, {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [10,20,30,32,54],
        backgroundColor: ['indigo', 'blue', 'green', 'tan', 'lightgreen']
      }],
      labels: [ 'Footwear', 'Menswear', 'Bags', 'Sports', 'Gaming']
    }
  })


  </script>
  
</body>

</html>