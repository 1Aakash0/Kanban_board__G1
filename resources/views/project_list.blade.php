@include('components/header')
@include('components/sidebar')

	<div class="container">
		<div class="d-flex justify-content-end mb-4">
			<a href="{{ route('project') }}"><button class="add-task-btn heading-M false">+ Add Project</button></a>
		</div>
		
		<div class="card">
			<div class="card-body">
				<table class="table table-border text-center">
					<thead>
						<th>Sr No.</th>
						<th>Project Name</th>
						<th>Customer Name</th>
						<th>Project Manager Name</th>
					</thead>
					<tbody>
						@foreach($project as $key => $p)
							<tr>
								<td> {{ ++$key }} </td>
								<td> {{ $p->name }}</td>
								@if(isset($p->cus_id->name))
									<td> {{ $p->cus_id->name }}</td>
								@else
									<td>-</td>
								@endif
								@if(isset($p->pm_ids->name))
									<td> {{ $p->pm_ids->name }}</td>
								@else
									<td>-</td>
								@endif
							</tr>
						@endforeach
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
@include('components/footer')