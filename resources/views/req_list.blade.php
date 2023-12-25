@include('components/header')
@include('components/sidebar')
@php $task_type = ["R" =>"Ready To Start" ,"I"=>"In Progress","D"=>"Development","T"=>"Testing","S"=>"Sign Off","Done"=>"Done"]  @endphp

	<div class="container">		
		<div class="card">
			<div class="card-body">
				<table class="table table-border text-center">
					<thead>
						<th>Sr No.</th>
						<th>Task Name</th>
						<th>Project Name</th>
						<th>Update To</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($model as $key => $m)
							<tr>
								<td> {{ ++$key }} </td>
								<td> {{ $m->task->name }}</td>
								<td> {{ $m->project->name }}</td>
								@foreach($task_type as $key => $val)
									@if($key == $m->status)
										<td> {{ $val }} </td>
									@endif
								@endforeach
								<td>
									@if(Auth::user()->role == "A")
										@if($m->action == "Pending")
											<a href="javasctipt:void(0);" data-id="{{ $m->id }}" class="text-success accept_req p-2">Accept</a>
											<a href="javasctipt:void(0);" data-id="{{ $m->id }}" class="delete_req text-danger p-2">Delete</a>
										@else 
											{{ $m->action }}
										@endif
									@elseif(Auth::user()->role == "C")
										{{ $m->action }}
									@endif
								</td>
							</tr>
						@endforeach
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
@include('components/footer')
