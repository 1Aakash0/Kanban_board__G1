<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Bootstrap Example</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  	<div class="container-fluid">
    	<a class="navbar-brand" href="javascript:void(0)">Logo</a>
    	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      		<span class="navbar-toggler-icon"></span>
    	</button>
    	<div class="collapse navbar-collapse" id="mynavbar">
    		@auth
	      	<ul class="navbar-nav me-auto">
	        	<li class="nav-item"><a class="nav-link" href="javascript:void(0)">{{ auth()->user()->email }}</a></li>
	        	<li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
	        	<li class="nav-item"><a class="nav-link" href="{{ route('profile') }}">Profile</a></li>
	        	<li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
	      	</ul>
	      	@endauth

	      	@guest
	      	<ul class="navbar-nav me-right">
	      		<li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
	        	<li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
	      	</ul>
	      	@endguest
    	</div>
  	</div>
</nav>

<div class="container-fluid mt-5">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="card">
			  	<div class="card-body text-center bg-primary text-white">
			  		<h5 class="card-title">Dashboard<br> Welcome {{ auth()->user()->name }}</h5>
			  	</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>