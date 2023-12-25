@include('components/header')
@include('components/sidebar')
@php $role = ['A' => 'Admin','C'=>'Customer','P'=>'Project Manager','D'=>'Developer'] @endphp

	<div class="container">
		<div class="d-flex justify-content-end mb-4">
			<a href="{{ route('user') }}"><button class="add-task-btn heading-M false">+ Add New User</button></a>
		</div>
		<div class="card">
			<div class="card-body">
				<table class="table table-border text-center">
					<thead>
						<th>Sr No.</th>
						<th>User Name</th>
						<th>Mobile No.</th>
						<th>Role</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($user as $key => $u)
							<tr>
								<td> {{ ++$key }} </td>
								<td> {{ $u->name }} </td>
								<td> {{ $u->mobile }} </td>
								@foreach($role as $key => $r)
									@if($u->role == $key)
										<td> {{$r}} </td>
									@endif
								@endforeach
								<td>
									<a href="{{route('edit_user',$u->id)}}" class="text-primary p-2">Edit</a>
									<a href="javasctipt:void(0);" data-id="{{ $u->id }}" class="delete text-danger p-2">Delete</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@include('components/footer')