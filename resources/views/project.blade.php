@include('components/header')
@include('components/sidebar')

	<div class="container">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('add_project') }}" method="post" class="form-group">
					@csrf
					<div class="row">
						<div class="col-4">
							<label>Project Name</label>
							<input type="text" name="project" value="{{ old('project') }}" placeholder="Enter Project Name" class="form-control">
							@error('project')
				                <span class="text-danger d-block">{{ $message }}</span>
				            @enderror
						</div>
						<div class="col-4">
							<label>Customer Name</label>
							<select class="form-control" name="customer">
								<option>Select Customer Name</option>
								@foreach($customer as $c)
									@if(old('customer') == $c->id)
										<option value=" {{$c->id}}" selected> {{$c->name}} </option>
									@else
										<option value=" {{$c->id}}"> {{$c->name}} </option>
									@endif
								@endforeach
							</select>
							@error('customer')
				                <span class="text-danger d-block">{{ $message }}</span>
				            @enderror
						</div>
						<div class="col-4">
							<label>Project Manager</label>
							<select class="form-control" name="manager">
								<option>Select Project Manager</option>
								@foreach($project_manager as $p)
									@if(old('manager') == $p->id)
										<option value=" {{$p->id}}" selected> {{$p->name}} </option>
									@else
										<option value=" {{$p->id}}"> {{$p->name}} </option>
									@endif
								@endforeach
							</select>
							@error('manager')
				                <span class="text-danger d-block">{{ $message }}</span>
				            @enderror
						</div>
						<div class="col-12">
							<label>Project Description</label>
							<textarea cols="6" rows="2" name="desc" placeholder="Description" class="form-control">{{ old('desc') }}</textarea>
							@error('desc')
				                <span class="text-danger d-block">{{ $message }}</span>
				            @enderror
						</div>
					</div> 
					<div class="row m-4">
						<button class="submit-btn heading-M col-1">Submit</button>
						<a href="{{ url('project_list') }}" class="cancel-btn heading-M col-1">
							<button type="button">Cancel</button>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@include('components/footer')