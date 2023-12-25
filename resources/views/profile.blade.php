@include('components/header')
@include('components/sidebar')
<div class="container-fluid mt-5">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Profile</h5>
				</div>
			  	<div class="card-body">
			  		<table class="table table-borderless">
			  			<tr>
			  				<th>ID</th>
			  				<td>{{ auth()->user()->id }}</td>
			  			</tr>
			  			<tr>
			  				<th>Name</th>
			  				<td>{{ auth()->user()->name }}</td>
			  			</tr>
			  			<tr>
			  				<th>Email</th>
			  				<td>{{ auth()->user()->email }}</td>
			  			</tr>
			  			<tr>
			  				<th>Created At</th>
			  				<td>{{ date('d M Y', strtotime(auth()->user()->created_at) ); }}</td>
			  			</tr>
			  		</table>
			  	</div>
			</div>
		</div>
	</div>
</div>

@include('components/footer')
