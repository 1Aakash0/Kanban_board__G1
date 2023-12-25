@include('components/header')
@include('components/sidebar')

@php $task_type = ["R" =>"Ready To Start" ,"I"=>"In Progress","D"=>"Development","T"=>"Testing","S"=>"Sign Off","Done"=>"Done"]  @endphp

	<div class="container">
		<div class="card">
			<div class="card-body">

				@if(isset($task))
					<form action="{{ route('edit_task_submit') }}" method="post" class="form-group">
						@csrf
						<div class="row">
							<div class="col-6">
								<input type="hidden" name="id" value="{{ $task->id }}">
								<label>Task Name</label>
								<input type="text" name="task" value="{{ $task->name }}" placeholder="Enter Task Name" class="form-control">
								@error('task')
					                <span class="text-danger d-block">{{ $message }}</span>
					            @enderror
							</div>
							<div class="col-6">
								<label>Developer Name</label>
								<select class="form-control" name="developer">
									<option>Select Developer Name</option>
									@foreach($developer as $c)
										@if($task->assignee_id == $c->id)
											<option value=" {{$c->id}}" selected> {{$c->name}} </option>
										@else
											<option value=" {{$c->id}}"> {{$c->name}} </option>
										@endif
									@endforeach
								</select>
								@error('developer')
					                <span class="text-danger d-block">{{ $message }}</span>
					            @enderror
							</div>
							<div class="col-6">
								<label>Project Name</label>
								<select class="form-control" name="p_name">
									<option>Select Project Name</option>
									@foreach($project as $p)
										@if($task->project_id == $p->id)
											<option value=" {{$p->id}}" selected> {{$p->name}} </option>
										@else
											<option value=" {{$p->id}}"> {{$p->name}} </option>
										@endif
									@endforeach
								</select>
								@error('p_name')
					                <span class="text-danger d-block">{{ $message }}</span>
					            @enderror
							</div>
							<div class="col-6">
								<label>Status</label>
								<select class="form-control" name="status">
									<option>Select Status</option>
									@foreach($task_type as $key => $type)
										@if($task->status_id == $key)
											<option selected value="{{$key}}">{{$type}}</option> 
										@else
											<option value="{{$key}}">{{$type}}</option> 
										@endif
									@endforeach
								</select>
							</div>
							<div class="col-12">
								<label>Task Description</label>
								<textarea cols="6" rows="2" name="desc" placeholder="Description" class="form-control">{{ $task->description }}</textarea>
								@error('desc')
					                <span class="text-danger d-block">{{ $message }}</span>
					            @enderror
							</div>
						</div> 
						<div class="row m-4">
							<button class="submit-btn heading-M col-1">Submit</button>
							<button class="cancel-btn heading-M col-1">Cancel</button>
						</div>
						
					</form>
				@else
					<form action="{{ route('submit_task') }}" method="post" class="form-group">
						@csrf
						<div class="row">
							<div class="col-6">
								<label>Task Name</label>
								<input type="text" name="task" value="{{ old('task') }}" placeholder="Enter Task Name" class="form-control">
								@error('task')
					                <span class="text-danger d-block">{{ $message }}</span>
					            @enderror
							</div>
							<div class="col-6">
								<label>Developer Name</label>
								<select class="form-control" name="developer">
									<option>Select Developer Name</option>
									@foreach($developer as $c)
										@if(old('developer') == $c->id)
											<option value=" {{$c->id}}" selected> {{$c->name}} </option>
										@else
											<option value=" {{$c->id}}"> {{$c->name}} </option>
										@endif
									@endforeach
								</select>
								@error('developer')
					                <span class="text-danger d-block">{{ $message }}</span>
					            @enderror
							</div>
							<div class="col-6">
								<label>Project Name</label>
								<select class="form-control" name="p_name">
									<option>Select Project Name</option>
									@foreach($project as $p)
										@if(old('p_name') == $p->id)
											<option value=" {{$p->id}}" selected> {{$p->name}} </option>
										@else
											<option value=" {{$p->id}}"> {{$p->name}} </option>
										@endif
									@endforeach
								</select>
								@error('p_name')
					                <span class="text-danger d-block">{{ $message }}</span>
					            @enderror
							</div>
							<div class="col-6">
								<label>Status</label>
								<select class="form-control" name="status">
									<option>Select Status</option>
									<option value="R">Ready To Start</option> 
									<option value="I">In Progress</option> 
									<option value="D">Developing</option> 
									<option value="T">Testing</option> 
									<option value="S">Sign Off</option>
									<option value="Done">Done</option>
								</select>
							</div>
							<div class="col-12">
								<label>Task Description</label>
								<textarea cols="6" rows="2" name="desc" placeholder="Description" class="form-control">{{ old('desc') }}</textarea>
								@error('desc')
					                <span class="text-danger d-block">{{ $message }}</span>
					            @enderror
							</div>
						</div> 
						<div class="row m-4">
							<button class="submit-btn heading-M col-1">Submit</button>
							<button class="cancel-btn heading-M col-1">Cancel</button>
						</div>
						
					</form>
				@endif
			</div>
		</div>
	</div>
@include('components/footer')