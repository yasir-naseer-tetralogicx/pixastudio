<!DOCTYPE html>
<html>
<head>
	<title>Micky Mouse</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="{{ asset('color/index.css') }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="color">
				<div id="color-container"></div>
				<div>
					<a href="#" class="btn btn-primary" onclick="eraseClick();">
						Erase
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="playing row">
				<img src="{{ asset('storage/'.$design->image) }}" alt="No image" class="d-none" id="img">
				<div class="image-canvas justify-content-center" id="canvasDiv"></div>			
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('color/jquery-3.1.1.min.js') }}"></script>
<!-- JS, Popper.js, and jQuery -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!--[if IE]><script type="text/javascript" src="excanvas.js"></script><![endif]-->
<script src="{{ asset('color/coloringUtil.js') }}"></script>
<script src="{{ asset('color/coloring.js') }}"></script>
<script src="{{ asset('color/index.js') }}"></script>

</body>
</html>