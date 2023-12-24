<div class="board open-sidebar">
	<div class="sidebar  false false">
		<div class="dropdown-container">
			<div class="dropdown-modal">
				{{Auth::user()->role}}

				@if(Auth::user()->role == "A")
					<div class="dropdown">
						<a href="{{route('user_list')}}">
							<div class="dropdown-board {{ Request::path()  == 'user_list' ? 'board-active' : '' }}">
								User
							</div>
						</a>
					</div>
					{{--<div class="dropdown">
						<a href="{{ route('role') }}">
							<div class="dropdown-board {{ Request::path()  == 'role' ? 'board-active' : '' }}">
								Role 
							</div>
						</a>
					</div>--}}
					<div class="dropdown">
						<a href="{{ route('project_list') }}">
							<div class="dropdown-board {{ Request::path()  == 'project_list' ? 'board-active' : '' }}">
								Project 
							</div>
						</a>
					</div>
				@endif
				@if(Auth::user()->role == "A" || Auth::user()->role == "C" )
					<div class="dropdown">
						<a href="{{route('req_list')}}">
							<div class="dropdown-board {{ Request::path()  == 'req_list' ? 'board-active' : '' }}">
								Task Request
							</div>
						</a>
					</div>
				@endif
				<div class="dropdown">
					<a href="{{route('log_list')}}">
						<div class="dropdown-board {{ Request::path()  == 'log_list' ? 'board-active' : '' }}">
							Task Logs
						</div>
					</a>
				</div>
				<h3 class="m-3">ALL PROJECT</h3>
				<div class="dropdown-boards">
					@foreach($project as $p)
						<a href="{{ route('board',$p->id) }}"><div class="dropdown-board {{ Request::is('board/' . $p->id) ? 'board-active' : '' }}"> {{ $p->name }}
						</div></a>
					@endforeach
				</div>
			</div>
		</div>
	</div>