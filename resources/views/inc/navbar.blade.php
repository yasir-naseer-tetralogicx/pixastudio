<nav class="navbar navbar-expand p-0">
    <div class="container">
 <a class="navbar-brand text-center col-xs-12 col-md-3 col-lg-2 mr-0" href="{{ route('dashboard') }}">PIXASTUDIO</a>
      <button class="btn btn-link d-block d-md-none" data-toggle="collapse" data-target="#sidebar-nav" role="button" >
        <span class="oi oi-menu"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('dashboard') }}">Dashbaord <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('products') }}">Products <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('customers') }}">Customers <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('designs.index') }}">Designs <span class="sr-only">(current)</span></a>
          </li>
	  <li class="nav-item active">
            <a class="nav-link" href="{{ route('designed.images') }}">Designed Images <span class="sr-only">(current)</span></a>
          </li>

        </ul>
      </div>


</div>
      
</nav>
