@include('components/header')
@include('components/sidebar')


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

@include('components/footer')
