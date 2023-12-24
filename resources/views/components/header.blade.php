<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="/favicon.ico"><meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700&amp;display=swap" rel="stylesheet">
	<title>Kanban Board</title>
	<link href="{{asset('/public/css/index.css')}}" rel="stylesheet">
	<link href="{{asset('/public/css/header.css')}}" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<div>
	<div class="app">
		<div class="header-container">
			<header>
				<div class="logo-container">
					<h3 class="logo-text">kanban</h3> 
				</div>
				@auth
					<div class="header-name-container heading-L">
						<!-- <h3 class="header-name"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></h3> -->
						<h5 class="header-name"><a href="{{ route('profile') }}">Profile</a></h5>
						<h5 class="header-name"><a href="{{ route('logout') }}">Logout</a></h5>
					</div>
			      	<!-- <ul class="navbar-nav me-auto">
			        	<li class="nav-item"><a class="nav-link" href="javascript:void(0)">{{ auth()->user()->email }}</a></li>
			      	</ul> -->
		      	@endauth

		      	@guest
		      	<ul class="navbar-nav me-right">
		      		<h3><a class="nav-link" href="{{ route('login') }}">Login</a></h3>
		        	<h3><a class="nav-link" href="{{ route('register') }}">Register</a></h3>
		      	</ul>
		      	@endguest
		      	@if(Auth::user()->role == "P" || Auth::user()->role == "A")
					<a href="{{ route('add_task') }}"><button class="add-task-btn heading-M false">+ Add New Task</button></a>
				@endif
				
			</header>
		</div>
