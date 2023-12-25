@include('components/header')
@include('components/sidebar')
@php $task_type = ["R" =>"Ready To Start" ,"I"=>"In Progress","D"=>"Development","T"=>"Testing","S"=>"Sign Off","Done"=>"Done"]  @endphp

	<div class="container">		
		<div class="card">
			<div class="card-body">
				<table class="table table-border text-center">
					<thead>
						<th>Sr No.</th>
						<th>User Name</th>
						<th>Project Name</th>
						<th>Task Name</th>
						<th>Update To</th>
					</thead>
					<tbody>
						@foreach($log as $key => $m)
							<tr>
								<td> {{ ++$key }} </td>
								<td> {{ $m->cuss_id->name }}</td>
								<td> {{ $m->project->name }}</td>
								<td> {{ $m->task->name }}</td>
								<td>
									@foreach($task_type as $key => $val)										
										@if($key == $m->pre_status)
											{{ $val }} ->
										@endif
									@endforeach
									@foreach($task_type as $key => $val)
										
										@if($key == $m->status)
											{{ $val }} 
										@endif
									@endforeach
								</td>
							</tr>
						@endforeach
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
@include('components/footer')