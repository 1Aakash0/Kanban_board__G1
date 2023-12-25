@include('components/header')
@include('components/sidebar')

@php $role = ['A' => 'Admin','C'=>'Customer','P'=>'Project Manager','D'=>'Developer'] @endphp

	@if(isset($user))
		<div class="container">
			<div class="card">
				<div class="card-body">
					<form action=" {{ route('edit_user_submit') }} " method="post" class="form-group">
						@csrf
						<div class="row">
							<div class="col-6">
								<label>User Name</label>
								<input type="hidden" name="u_id" value="{{$user->id}}">
								<input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Enter Name">
								@error('name')
					                <span class="text-danger d-block">{{ $message }}</span>
					            @enderror
							</div>
							<div class="col-6">
								<label>User Email</label>
								<input type="text" name="email" value="{{$user->email}}" class="form-control"  placeholder="Enter Email">
								@error('email')
					                <span class="text-danger d-block">{{ $message }}</span>
					            @enderror
							</div>
							<div class="col-6">
								<label>User Mobile</label>
								<input type="text" name="mobile" value="{{$user->mobile}}" class="form-control"  placeholder="Enter Mobile Number">
								@error('mobile')
					                <span class="text-danger d-block">{{ $message }}</span>
					            @enderror
							</div>
							<div class="col-6">
								<label>User Role</label>
								<select name="role" class="form-control">
									<option> Select Role </option>
									@foreach($role as $key => $r)
										@if($user->role == $key)
											<option selected value="{{$key}}"> {{$r}} </option>
										@else
											<option value="{{$key}}"> {{$r}} </option>
										@endif
									@endforeach
								</select>
								@error('role')
					                <span class="text-danger d-block">{{ $message }}</span>
					            @enderror
							</div>
						</div> 
						<div class="row m-4">
							<button class="submit-btn heading-M col-1">Submit</button>
							<button class="cancel-btn heading-M col-1">Cancel</button>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	@else
		<div class="container">
			<div class="card">
				<div class="card-body">
					<form action=" {{ route('add_user') }} " method="post" class="form-group">
						@csrf
						<div class="row">
							<div class="col-6">
								<label>User Name</label>
								<input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter Name">
								@error('name')
					                <span class="text-danger d-block">{{ $message }}</span>
					            @enderror
							</div>
							<div class="col-6">
								<label>User Email</label>
								<input type="text" name="email" value="{{old('email')}}" class="form-control"  placeholder="Enter Email">
								@error('email')
					                <span class="text-danger d-block">{{ $message }}</span>
					            @enderror
							</div>
							<div class="col-6">
								<label>User Mobile</label>
								<input type="text" name="mobile" value="{{old('mobile')}}" class="form-control"  placeholder="Enter Mobile Number">
								@error('mobile')
					                <span class="text-danger d-block">{{ $message }}</span>
					            @enderror
							</div>
							<div class="col-6">
								<label>User Role</label>
								<select name="role" class="form-control">
									<option> Select Role </option>
									<option value="C"> Customer </option>
									<option value="P"> Project Manager </option>
									<option value="D"> Developer </option>
									<option value="A"> Admin </option>
								</select>
								@error('role')
					                <span class="text-danger d-block">{{ $message }}</span>
					            @enderror
							</div>
							<div class="col-6">
								<label>Password</label>
								<input type="text" name="password" class="form-control" placeholder="Enter Password">
								@error('password')
					                <span class="text-danger d-block">{{ $message }}</span>
					            @enderror
							</div>
							<div class="col-6">
								<label>Confirm Password</label>
								<input type="text" name="confirm-password" class="form-control" placeholder="Enter Confirm  Password">
								@error('confirm-password')
					                <span class="text-danger d-block">{{ $message }}</span>
					            @enderror
							</div>
						</div> 
						<div class="row m-4">
							<button class="submit-btn heading-M col-1">Submit</button>
							<button class="cancel-btn heading-M col-1">Cancel</button>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	@endif
@include('components/footer')