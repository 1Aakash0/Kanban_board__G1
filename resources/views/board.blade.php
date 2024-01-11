@include('components/header')
@include('components/sidebar')

@php 
    $task_type = ["R" =>"Ready To Start" ,"I"=>"In Progress","D"=>"Development","T"=>"Testing","S"=>"Sign Off","Done"=>"Done"];
    $priority = ["Highest","High","Medium","Low","Lowest"];
@endphp

    @if(Auth::user()->role == "C")
        <div class="column" id="start" >
            <p class="col-name heading-S">
                Ready to start
            </p>
            @foreach($priority as $priority_val)
                @foreach($task as $t)
                    @if($t->status_id == 'R')
                        @if($t->priority_id == $priority_val)
                            <div draggable="true" id="{{$t->id}}" class="task">
                                <h5><b>{{$t->name}}</b></h5>
                                <p> {{ $t->description }} </p>
                                <div class="row">
                                    <div class="col-8">
                                        {{ $t->estimation_hours == '' ? 0 : $t->estimation_hours }} / {{ $t->progress_hours == '' ? 0 : $t->progress_hours }}
                                        <span class="p-1">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="5px" y="5px" viewBox="0 0 256 256" enable-background="new 0 0 256 256" xml:space="preserve" style="height: 18px; width: 18px;">
                                                <g><g><path fill="grey" d="M182.6,126.6h-53.1V66.1c0-2.8-2.3-5.1-5.1-5.1h-7.3c-2.8,0-5.1,2.3-5.1,5.1V144h70.6c2.9,0,5.1-2.2,5.1-5.1v-7.2C187.7,128.8,185.5,126.6,182.6,126.6z"/><path fill="grey" d="M128,10C63,10,10,62.9,10,128c0,65.1,53,118,118,118c65,0,118-52.9,118-118C246,63,193.1,10,128,10z M128,228.6c-55.4,0-100.5-45.1-100.5-100.5C27.5,72.6,72.6,27.5,128,27.5S228.5,72.6,228.5,128C228.5,183.4,183.4,228.6,128,228.6z"/></g></g>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col-4">
                                        <div class="text-right">
                                            <div style="text-align: right;">
                                                @if(isset($comment_count[$t->id]))
                                                    {{$comment_count[$t->id]}}
                                                @else
                                                    0
                                                @endif
                                                <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
                                                <div class="comment-form d-none">
                                                    <div class="comment-section">
                                                        <h6>Comments</h6>
                                                        @foreach($comment as $c)
                                                            @if($c->task_id == $t->id)
                                                                <h6><b>Name</b> : {{ $c->user->name }}</h6>
                                                                <p><b>Desc</b> : {{ $c->description }}</p>
                                                                <hr>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                                <div>
                                    <select class="form-control move-req">
                                        @foreach($priority as $type)
                                            @if($type == $t->priority_id)
                                                <option selected disabled value="{{$type}}"> {{ $type }} </option>
                                            @else
                                                <option value="{{$type}}"> {{ $type }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="column" id="progress">
            <p class="col-name heading-S">
                In Progress
            </p>
            @foreach($priority as $priority_val)
                @foreach($task as $t)
                    @if($t->status_id == 'I')
                        @if($t->priority_id == $priority_val)
                            <div draggable="true" id="{{$t->id}}" class="task">
                                <h5><b>{{$t->name}}</b></h5>
                                <p> {{ $t->description }} </p>
                                <div class="row">
                                    <div class="col-8">
                                        {{ $t->estimation_hours == '' ? 0 : $t->estimation_hours }} / {{ $t->progress_hours == '' ? 0 : $t->progress_hours }}
                                        <span class="p-1">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="5px" y="5px" viewBox="0 0 256 256" enable-background="new 0 0 256 256" xml:space="preserve" style="height: 18px; width: 18px;">
                                                <g><g><path fill="grey" d="M182.6,126.6h-53.1V66.1c0-2.8-2.3-5.1-5.1-5.1h-7.3c-2.8,0-5.1,2.3-5.1,5.1V144h70.6c2.9,0,5.1-2.2,5.1-5.1v-7.2C187.7,128.8,185.5,126.6,182.6,126.6z"/><path fill="grey" d="M128,10C63,10,10,62.9,10,128c0,65.1,53,118,118,118c65,0,118-52.9,118-118C246,63,193.1,10,128,10z M128,228.6c-55.4,0-100.5-45.1-100.5-100.5C27.5,72.6,72.6,27.5,128,27.5S228.5,72.6,228.5,128C228.5,183.4,183.4,228.6,128,228.6z"/></g></g>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col-4">
                                        <div class="text-right">
                                            <div style="text-align: right;">
                                                @if(isset($comment_count[$t->id]))
                                                    {{$comment_count[$t->id]}}
                                                @else
                                                    0
                                                @endif
                                                <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
                                                <div class="comment-form d-none">
                                                    <div class="comment-section">
                                                        <h6>Comments</h6>
                                                        @foreach($comment as $c)
                                                            @if($c->task_id == $t->id)
                                                                <h6><b>Name</b> : {{ $c->user->name }}</h6>
                                                                <p><b>Desc</b> : {{ $c->description }}</p>
                                                                <hr>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <select class="form-control move-req">
                                        @foreach($priority as $type)
                                            @if($type == $t->priority_id)
                                                <option selected disabled value="{{$type}}"> {{ $type }} </option>
                                            @else
                                                <option value="{{$type}}"> {{ $type }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="column" id="dev" >
            <p class="col-name heading-S">
                Development
            </p>
            @foreach($priority as $priority_val)
                @foreach($task as $t)
                    @if($t->status_id == 'D')
                        @if($t->priority_id == $priority_val)
                            <div draggable="true" id="{{$t->id}}" class="task">
                                <h5><b>{{$t->name}}</b></h5>
                                <p> {{ $t->description }} </p>
                                <div class="row">
                                    <div class="col-8">
                                        {{ $t->estimation_hours == '' ? 0 : $t->estimation_hours }} / {{ $t->progress_hours == '' ? 0 : $t->progress_hours }}
                                        <span class="p-1">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="5px" y="5px" viewBox="0 0 256 256" enable-background="new 0 0 256 256" xml:space="preserve" style="height: 18px; width: 18px;">
                                                <g><g><path fill="grey" d="M182.6,126.6h-53.1V66.1c0-2.8-2.3-5.1-5.1-5.1h-7.3c-2.8,0-5.1,2.3-5.1,5.1V144h70.6c2.9,0,5.1-2.2,5.1-5.1v-7.2C187.7,128.8,185.5,126.6,182.6,126.6z"/><path fill="grey" d="M128,10C63,10,10,62.9,10,128c0,65.1,53,118,118,118c65,0,118-52.9,118-118C246,63,193.1,10,128,10z M128,228.6c-55.4,0-100.5-45.1-100.5-100.5C27.5,72.6,72.6,27.5,128,27.5S228.5,72.6,228.5,128C228.5,183.4,183.4,228.6,128,228.6z"/></g></g>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col-4">
                                        <div class="text-right">
                                            <div style="text-align: right;">
                                                @if(isset($comment_count[$t->id]))
                                                    {{$comment_count[$t->id]}}
                                                @else
                                                    0
                                                @endif
                                                <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
                                                <div class="comment-form d-none">
                                                    <div class="comment-section">
                                                        <h6>Comments</h6>
                                                        @foreach($comment as $c)
                                                            @if($c->task_id == $t->id)
                                                                <h6><b>Name</b> : {{ $c->user->name }}</h6>
                                                                <p><b>Desc</b> : {{ $c->description }}</p>
                                                                <hr>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <select class="form-control move-req">
                                        @foreach($priority as $type)
                                            @if($type == $t->priority_id)
                                                <option selected disabled value="{{$type}}"> {{ $type }} </option>
                                            @else
                                                <option value="{{$type}}"> {{ $type }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="column" id="testing" >
            <p class="col-name heading-S">
                Testing
            </p>
            @foreach($priority as $priority_val)
                @foreach($task as $t)
                    @if($t->status_id == 'T')
                        @if($t->priority_id == $priority_val)
                            <div draggable="true" id="{{$t->id}}" class="task">
                                <h5><b>{{$t->name}}</b></h5>
                                <p> {{ $t->description }} </p>
                                <div class="row">
                                    <div class="col-8">
                                        {{ $t->estimation_hours == '' ? 0 : $t->estimation_hours }} / {{ $t->progress_hours == '' ? 0 : $t->progress_hours }}
                                        <span class="p-1">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="5px" y="5px" viewBox="0 0 256 256" enable-background="new 0 0 256 256" xml:space="preserve" style="height: 18px; width: 18px;">
                                                <g><g><path fill="grey" d="M182.6,126.6h-53.1V66.1c0-2.8-2.3-5.1-5.1-5.1h-7.3c-2.8,0-5.1,2.3-5.1,5.1V144h70.6c2.9,0,5.1-2.2,5.1-5.1v-7.2C187.7,128.8,185.5,126.6,182.6,126.6z"/><path fill="grey" d="M128,10C63,10,10,62.9,10,128c0,65.1,53,118,118,118c65,0,118-52.9,118-118C246,63,193.1,10,128,10z M128,228.6c-55.4,0-100.5-45.1-100.5-100.5C27.5,72.6,72.6,27.5,128,27.5S228.5,72.6,228.5,128C228.5,183.4,183.4,228.6,128,228.6z"/></g></g>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col-4">
                                        <div class="text-right">
                                            <div style="text-align: right;">
                                                @if(isset($comment_count[$t->id]))
                                                    {{$comment_count[$t->id]}}
                                                @else
                                                    0
                                                @endif
                                                <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
                                                <div class="comment-form d-none">
                                                    <div class="comment-section">
                                                        <h6>Comments</h6>
                                                        @foreach($comment as $c)
                                                            @if($c->task_id == $t->id)
                                                                <h6><b>Name</b> : {{ $c->user->name }}</h6>
                                                                <p><b>Desc</b> : {{ $c->description }}</p>
                                                                <hr>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <select class="form-control move-req">
                                        @foreach($priority as $type)
                                            @if($type == $t->priority_id)
                                                <option selected disabled value="{{$type}}"> {{ $type }} </option>
                                            @else
                                                <option value="{{$type}}"> {{ $type }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endforeach
        </div>

        <div class="column" id="sign" >
            <p class="col-name heading-S">
                Sign Off
            </p>
            @foreach($priority as $priority_val)
                @foreach($task as $t)
                    @if($t->status_id == 'S')
                        @if($t->priority_id == $priority_val)
                            <div draggable="true" id="{{$t->id}}" class="task">
                                <h5><b>{{$t->name}}</b></h5>
                                <p> {{ $t->description }} </p>
                                <div class="row">
                                    <div class="col-8">
                                        {{ $t->estimation_hours == '' ? 0 : $t->estimation_hours }} / {{ $t->progress_hours == '' ? 0 : $t->progress_hours }}
                                        <span class="p-1">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="5px" y="5px" viewBox="0 0 256 256" enable-background="new 0 0 256 256" xml:space="preserve" style="height: 18px; width: 18px;">
                                                <g><g><path fill="grey" d="M182.6,126.6h-53.1V66.1c0-2.8-2.3-5.1-5.1-5.1h-7.3c-2.8,0-5.1,2.3-5.1,5.1V144h70.6c2.9,0,5.1-2.2,5.1-5.1v-7.2C187.7,128.8,185.5,126.6,182.6,126.6z"/><path fill="grey" d="M128,10C63,10,10,62.9,10,128c0,65.1,53,118,118,118c65,0,118-52.9,118-118C246,63,193.1,10,128,10z M128,228.6c-55.4,0-100.5-45.1-100.5-100.5C27.5,72.6,72.6,27.5,128,27.5S228.5,72.6,228.5,128C228.5,183.4,183.4,228.6,128,228.6z"/></g></g>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col-4">
                                        <div class="text-right">
                                            <div style="text-align: right;">
                                                @if(isset($comment_count[$t->id]))
                                                    {{$comment_count[$t->id]}}
                                                @else
                                                    0
                                                @endif
                                                <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
                                                <div class="comment-form d-none">
                                                    <div class="comment-section">
                                                        <h6>Comments</h6>
                                                        @foreach($comment as $c)
                                                            @if($c->task_id == $t->id)
                                                                <h6><b>Name</b> : {{ $c->user->name }}</h6>
                                                                <p><b>Desc</b> : {{ $c->description }}</p>
                                                                <hr>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <select class="form-control move-req">
                                        @foreach($priority as $type)
                                            @if($type == $t->priority_id)
                                                <option selected disabled value="{{$type}}"> {{ $type }} </option>
                                            @else
                                                <option value="{{$type}}"> {{ $type }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endforeach
        </div>

        <div class="column" id="done" >
            <p class="col-name heading-S">
                Done
            </p>
            @foreach($priority as $priority_val)
                @foreach($task as $t)
                    @if($t->status_id == 'Done')
                        @if($t->priority_id == $priority_val)
                            <div draggable="true" id="{{$t->id}}" class="task">
                                <h5><b>{{$t->name}}</b></h5>
                                <p> {{ $t->description }} </p>
                                <div class="row">
                                    <div class="col-8">
                                        {{ $t->estimation_hours == '' ? 0 : $t->estimation_hours }} / {{ $t->progress_hours == '' ? 0 : $t->progress_hours }}
                                        <span class="p-1">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="5px" y="5px" viewBox="0 0 256 256" enable-background="new 0 0 256 256" xml:space="preserve" style="height: 18px; width: 18px;">
                                                <g><g><path fill="grey" d="M182.6,126.6h-53.1V66.1c0-2.8-2.3-5.1-5.1-5.1h-7.3c-2.8,0-5.1,2.3-5.1,5.1V144h70.6c2.9,0,5.1-2.2,5.1-5.1v-7.2C187.7,128.8,185.5,126.6,182.6,126.6z"/><path fill="grey" d="M128,10C63,10,10,62.9,10,128c0,65.1,53,118,118,118c65,0,118-52.9,118-118C246,63,193.1,10,128,10z M128,228.6c-55.4,0-100.5-45.1-100.5-100.5C27.5,72.6,72.6,27.5,128,27.5S228.5,72.6,228.5,128C228.5,183.4,183.4,228.6,128,228.6z"/></g></g>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="col-4">
                                        <div class="text-right">
                                            <div style="text-align: right;">
                                                @if(isset($comment_count[$t->id]))
                                                    {{$comment_count[$t->id]}}
                                                @else
                                                    0
                                                @endif
                                                <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
                                                <div class="comment-form d-none">
                                                    <div class="comment-section">
                                                        <h6>Comments</h6>
                                                        @foreach($comment as $c)
                                                            @if($c->task_id == $t->id)
                                                                <h6><b>Name</b> : {{ $c->user->name }}</h6>
                                                                <p><b>Desc</b> : {{ $c->description }}</p>
                                                                <hr>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <select class="form-control move-req">
                                        @foreach($priority as $type)
                                            @if($type == $t->priority_id)
                                                <option selected disabled value="{{$type}}"> {{ $type }} </option>
                                            @else
                                                <option value="{{$type}}"> {{ $type }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endforeach
        </div>
    @else
        <div class="column" id="start" ondrop="drop(event, 'R')" ondragover="allowDrop(event)">
            <p class="col-name heading-S">
                Ready to start
            </p>
            @foreach($priority as $priority_val)
                @foreach($task as $t)
                    @if($t->status_id == 'R')
                        @if($t->priority_id == $priority_val)
                            <div draggable="true" id="{{$t->id}}" class="task" ondragstart="drag(event)">
                                <div class="dropdown" style="text-align: right;">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <p class="dropdown-item"><a href="{{ route('edit_task',$t->id) }}">Edit task</a></p>
                                        <p class="elipsis-menu-red delete_task dropdown-item" data-id="{{ $t->id }}">Delete task</p>
                                    </ul>
                                </div>
                                <div class="row">
                                    <h5 class="col-8"><b>{{$t->name}}</b></h5>
                                    <p class="col-4 text-danger"> {{ $t->priority_id }} </p>
                                </div>
                                <p> {{ $t->description }} </p>
                                <div class="row">
                                    <div class="col-8 text-right mt-2">
                                        {{ $t->estimation_hours == '' ? 0 : $t->estimation_hours }} / {{ $t->progress_hours == '' ? 0 : $t->progress_hours }}
                                        @if($t->estimation_hours > $t->progress_hours)
                                            <span class="p-1 time">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="5px" y="5px" viewBox="0 0 256 256" enable-background="new 0 0 256 256" xml:space="preserve" style="height: 18px; width: 18px;">
                                                    <g><g><path fill="grey" d="M182.6,126.6h-53.1V66.1c0-2.8-2.3-5.1-5.1-5.1h-7.3c-2.8,0-5.1,2.3-5.1,5.1V144h70.6c2.9,0,5.1-2.2,5.1-5.1v-7.2C187.7,128.8,185.5,126.6,182.6,126.6z"/><path fill="grey" d="M128,10C63,10,10,62.9,10,128c0,65.1,53,118,118,118c65,0,118-52.9,118-118C246,63,193.1,10,128,10z M128,228.6c-55.4,0-100.5-45.1-100.5-100.5C27.5,72.6,72.6,27.5,128,27.5S228.5,72.6,228.5,128C228.5,183.4,183.4,228.6,128,228.6z"/></g></g>
                                                </svg>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-4 text-right" style="text-align: right;" >
                                        @if(isset($comment_count[$t->id]))
                                            {{$comment_count[$t->id]}}
                                        @else
                                            0
                                        @endif
                                        <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
                                    </div>
                                    <div class="time-form d-none">
                                        <input type="number" class="form-control" value="{{ $t->remainig_hours }}" max="{{ $t->remainig_hours }}" min="0">
                                        <button class="text-primary save_time" data-id="{{$t->id}}">Save</button>
                                        <button class="text-danger cancel">Cancel</button>
                                    </div>
                                    <div class="comment-form d-none">
                                        <textarea cols="3" maxlength="300" rows="3" class="form-control"></textarea>
                                        <button class="text-primary save" data-id="{{$t->id}}">Save</button>
                                        <button class="text-danger cancel">Cancel</button>
                                        <div class="comment-section">
                                            <h6>Comments</h6>
                                            @foreach($comment as $c)
                                                @if($c->task_id == $t->id)
                                                    <h6><b>Name</b> : {{ $c->user->name }}</h6>
                                                    <p><b>Desc</b> : {{ $c->description }}</p>
                                                    <hr>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="column" id="progress" ondrop="drop(event, 'I')" ondragover="allowDrop(event)">
            <p class="col-name heading-S">
                In Progress
            </p>
            @foreach($priority as $priority_val)
                @foreach($task as $t)
                    @if($t->status_id == 'I')
                        @if($t->priority_id == $priority_val)
                            <div draggable="true" id="{{$t->id}}" class="task" ondragstart="drag(event)">
                                <div class="dropdown" style="text-align: right;">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <p class="dropdown-item"><a href="{{ route('edit_task',$t->id) }}">Edit task</a></p>
                                        <p class="elipsis-menu-red delete_task dropdown-item" data-id="{{ $t->id }}">Delete task</p>
                                    </ul>
                                </div>
                                <div class="row">
                                    <h5 class="col-8"><b>{{$t->name}}</b></h5>
                                    <p class="col-4 text-danger"> {{ $t->priority_id }} </p>
                                </div>
                                <p> {{ $t->description }} </p>
                                <div class="row">
                                    <div class="col-8 text-right mt-2">
                                        {{ $t->estimation_hours == '' ? 0 :$t->estimation_hours	 }} / {{ $t->progress_hours == '' ? 0 : $t->progress_hours }}
                                        @if($t->estimation_hours > $t->progress_hours)
                                            <span class="p-1 time">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="5px" y="5px" viewBox="0 0 256 256" enable-background="new 0 0 256 256" xml:space="preserve" style="height: 18px; width: 18px;">
                                                    <g><g><path fill="grey" d="M182.6,126.6h-53.1V66.1c0-2.8-2.3-5.1-5.1-5.1h-7.3c-2.8,0-5.1,2.3-5.1,5.1V144h70.6c2.9,0,5.1-2.2,5.1-5.1v-7.2C187.7,128.8,185.5,126.6,182.6,126.6z"/><path fill="grey" d="M128,10C63,10,10,62.9,10,128c0,65.1,53,118,118,118c65,0,118-52.9,118-118C246,63,193.1,10,128,10z M128,228.6c-55.4,0-100.5-45.1-100.5-100.5C27.5,72.6,72.6,27.5,128,27.5S228.5,72.6,228.5,128C228.5,183.4,183.4,228.6,128,228.6z"/></g></g>
                                                </svg>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-4 text-right" style="text-align: right;" >
                                        @if(isset($comment_count[$t->id]))
                                            {{$comment_count[$t->id]}}
                                        @else
                                            0
                                        @endif
                                        <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
                                    </div>
                                    <div class="time-form d-none">
                                        <input type="number" class="form-control" value="{{ $t->remainig_hours }}" max="{{ $t->remainig_hours }}" min="0">
                                        <button class="text-primary save_time" data-id="{{$t->id}}">Save</button>
                                        <button class="text-danger cancel">Cancel</button>
                                    </div>
                                    <div class="comment-form d-none">
                                        <textarea cols="3" maxlength="300" rows="3" class="form-control"></textarea>
                                        <button class="text-primary save" data-id="{{$t->id}}">Save</button>
                                        <button class="text-danger cancel">Cancel</button>
                                        <div class="comment-section">
                                            <h6>Comments</h6>
                                            @foreach($comment as $c)
                                                @if($c->task_id == $t->id)
                                                    <h6><b>Name</b> : {{ $c->user->name }}</h6>
                                                    <p><b>Desc</b> : {{ $c->description }}</p>
                                                    <hr>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="column" id="dev" ondrop="drop(event, 'D')" ondragover="allowDrop(event)">
            <p class="col-name heading-S">
                Development
            </p>
            @foreach($priority as $priority_val)
                @foreach($task as $t)
                    @if($t->status_id == 'D')
                        @if($t->priority_id == $priority_val)
                            <div draggable="true" id="{{$t->id}}" class="task" ondragstart="drag(event)">
                                <div class="dropdown" style="text-align: right;">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <p class="dropdown-item"><a href="{{ route('edit_task',$t->id) }}">Edit task</a></p>
                                        <p class="elipsis-menu-red delete_task dropdown-item" data-id="{{ $t->id }}">Delete task</p>
                                    </ul>
                                </div>
                                <div class="row">
                                    <h5 class="col-8"><b>{{$t->name}}</b></h5>
                                    <p class="col-4 text-danger"> {{ $t->priority_id }} </p>
                                </div>
                                <p> {{ $t->description }} </p>
                                <div class="row">
                                    <div class="col-8 text-right mt-2">
                                        {{ $t->estimation_hours == '' ? 0 :$t->estimation_hours	 }} / {{ $t->progress_hours == '' ? 0 : $t->progress_hours }}
                                        @if($t->estimation_hours > $t->progress_hours)
                                            <span class="p-1 time">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="5px" y="5px" viewBox="0 0 256 256" enable-background="new 0 0 256 256" xml:space="preserve" style="height: 18px; width: 18px;">
                                                    <g><g><path fill="grey" d="M182.6,126.6h-53.1V66.1c0-2.8-2.3-5.1-5.1-5.1h-7.3c-2.8,0-5.1,2.3-5.1,5.1V144h70.6c2.9,0,5.1-2.2,5.1-5.1v-7.2C187.7,128.8,185.5,126.6,182.6,126.6z"/><path fill="grey" d="M128,10C63,10,10,62.9,10,128c0,65.1,53,118,118,118c65,0,118-52.9,118-118C246,63,193.1,10,128,10z M128,228.6c-55.4,0-100.5-45.1-100.5-100.5C27.5,72.6,72.6,27.5,128,27.5S228.5,72.6,228.5,128C228.5,183.4,183.4,228.6,128,228.6z"/></g></g>
                                                </svg>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-4 text-right" style="text-align: right;" >
                                        @if(isset($comment_count[$t->id]))
                                            {{$comment_count[$t->id]}}
                                        @else
                                            0
                                        @endif
                                        <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
                                    </div>
                                    <div class="time-form d-none">
                                        <input type="number" class="form-control" value="{{ $t->remainig_hours }}" max="{{ $t->remainig_hours }}" min="0">
                                        <button class="text-primary save_time" data-id="{{$t->id}}">Save</button>
                                        <button class="text-danger cancel">Cancel</button>
                                    </div>
                                    <div class="comment-form d-none">
                                        <textarea cols="3" maxlength="300" rows="3" class="form-control"></textarea>
                                        <button class="text-primary save" data-id="{{$t->id}}">Save</button>
                                        <button class="text-danger cancel">Cancel</button>
                                        <div class="comment-section">
                                            <h6>Comments</h6>
                                            @foreach($comment as $c)
                                                @if($c->task_id == $t->id)
                                                    <h6><b>Name</b> : {{ $c->user->name }}</h6>
                                                    <p><b>Desc</b> : {{ $c->description }}</p>
                                                    <hr>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="column" id="testing" ondrop="drop(event, 'T')" ondragover="allowDrop(event)">
            <p class="col-name heading-S">
                Testing
            </p>
            @foreach($priority as $priority_val)
                @foreach($task as $t)
                    @if($t->status_id == 'T')
                        @if($t->priority_id == $priority_val)
                            <div draggable="true" id="{{$t->id}}" class="task" ondragstart="drag(event)">
                                <div class="dropdown" style="text-align: right;">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <p class="dropdown-item"><a href="{{ route('edit_task',$t->id) }}">Edit task</a></p>
                                        <p class="elipsis-menu-red delete_task dropdown-item" data-id="{{ $t->id }}">Delete task</p>
                                    </ul>
                                </div>
                                <div class="row">
                                    <h5 class="col-8"><b>{{$t->name}}</b></h5>
                                    <p class="col-4 text-danger"> {{ $t->priority_id }} </p>
                                </div>
                                <p> {{ $t->description }} </p>
                                <div class="row">
                                    <div class="col-8 text-right mt-2">
                                        {{ $t->estimation_hours == '' ? 0 :$t->estimation_hours	 }} / {{ $t->progress_hours == '' ? 0 : $t->progress_hours }}
                                        @if($t->estimation_hours > $t->progress_hours)
                                            <span class="p-1 time">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="5px" y="5px" viewBox="0 0 256 256" enable-background="new 0 0 256 256" xml:space="preserve" style="height: 18px; width: 18px;">
                                                    <g><g><path fill="grey" d="M182.6,126.6h-53.1V66.1c0-2.8-2.3-5.1-5.1-5.1h-7.3c-2.8,0-5.1,2.3-5.1,5.1V144h70.6c2.9,0,5.1-2.2,5.1-5.1v-7.2C187.7,128.8,185.5,126.6,182.6,126.6z"/><path fill="grey" d="M128,10C63,10,10,62.9,10,128c0,65.1,53,118,118,118c65,0,118-52.9,118-118C246,63,193.1,10,128,10z M128,228.6c-55.4,0-100.5-45.1-100.5-100.5C27.5,72.6,72.6,27.5,128,27.5S228.5,72.6,228.5,128C228.5,183.4,183.4,228.6,128,228.6z"/></g></g>
                                                </svg>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-4 text-right" style="text-align: right;" >
                                        @if(isset($comment_count[$t->id]))
                                            {{$comment_count[$t->id]}}
                                        @else
                                            0
                                        @endif
                                        <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
                                    </div>
                                    <div class="time-form d-none">
                                        <input type="number" class="form-control" value="{{ $t->remainig_hours }}" max="{{ $t->remainig_hours }}" min="0">
                                        <button class="text-primary save_time" data-id="{{$t->id}}">Save</button>
                                        <button class="text-danger cancel">Cancel</button>
                                    </div>
                                    <div class="comment-form d-none">
                                        <textarea cols="3" maxlength="300" rows="3" class="form-control"></textarea>
                                        <button class="text-primary save" data-id="{{$t->id}}">Save</button>
                                        <button class="text-danger cancel">Cancel</button>
                                        <div class="comment-section">
                                            <h6>Comments</h6>
                                            @foreach($comment as $c)
                                                @if($c->task_id == $t->id)
                                                    <h6><b>Name</b> : {{ $c->user->name }}</h6>
                                                    <p><b>Desc</b> : {{ $c->description }}</p>
                                                    <hr>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="column" id="sign" ondrop="drop(event, 'S')" ondragover="allowDrop(event)">
            <p class="col-name heading-S">
                Sign Off
            </p>
            @foreach($priority as $priority_val)
                @foreach($task as $t)
                    @if($t->status_id == 'S')
                        @if($t->priority_id == $priority_val)
                            <div draggable="true" id="{{$t->id}}" class="task" ondragstart="drag(event)">
                                <div class="dropdown" style="text-align: right;">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <p class="dropdown-item"><a href="{{ route('edit_task',$t->id) }}">Edit task</a></p>
                                        <p class="elipsis-menu-red delete_task dropdown-item" data-id="{{ $t->id }}">Delete task</p>
                                    </ul>
                                </div>
                                <div class="row">
                                    <h5 class="col-8"><b>{{$t->name}}</b></h5>
                                    <p class="col-4 text-danger"> {{ $t->priority_id }} </p>
                                </div>
                                <p> {{ $t->description }} </p>
                                <div class="row">
                                    <div class="col-8 text-right mt-2">
                                        {{ $t->estimation_hours == '' ? 0 :$t->estimation_hours	 }} / {{ $t->progress_hours == '' ? 0 : $t->progress_hours }}
                                        @if($t->estimation_hours > $t->progress_hours)
                                            <span class="p-1 time">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="5px" y="5px" viewBox="0 0 256 256" enable-background="new 0 0 256 256" xml:space="preserve" style="height: 18px; width: 18px;">
                                                    <g><g><path fill="grey" d="M182.6,126.6h-53.1V66.1c0-2.8-2.3-5.1-5.1-5.1h-7.3c-2.8,0-5.1,2.3-5.1,5.1V144h70.6c2.9,0,5.1-2.2,5.1-5.1v-7.2C187.7,128.8,185.5,126.6,182.6,126.6z"/><path fill="grey" d="M128,10C63,10,10,62.9,10,128c0,65.1,53,118,118,118c65,0,118-52.9,118-118C246,63,193.1,10,128,10z M128,228.6c-55.4,0-100.5-45.1-100.5-100.5C27.5,72.6,72.6,27.5,128,27.5S228.5,72.6,228.5,128C228.5,183.4,183.4,228.6,128,228.6z"/></g></g>
                                                </svg>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-4 text-right" style="text-align: right;" >
                                        @if(isset($comment_count[$t->id]))
                                            {{$comment_count[$t->id]}}
                                        @else
                                            0
                                        @endif
                                        <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
                                    </div>
                                    <div class="time-form d-none">
                                        <input type="number" class="form-control" value="{{ $t->remainig_hours }}" max="{{ $t->remainig_hours }}" min="0">
                                        <button class="text-primary save_time" data-id="{{$t->id}}">Save</button>
                                        <button class="text-danger cancel">Cancel</button>
                                    </div>
                                    <div class="comment-form d-none">
                                        <textarea cols="3" maxlength="300" rows="3" class="form-control"></textarea>
                                        <button class="text-primary save" data-id="{{$t->id}}">Save</button>
                                        <button class="text-danger cancel">Cancel</button>
                                        <div class="comment-section">
                                            <h6>Comments</h6>
                                            @foreach($comment as $c)
                                                @if($c->task_id == $t->id)
                                                    <h6><b>Name</b> : {{ $c->user->name }}</h6>
                                                    <p><b>Desc</b> : {{ $c->description }}</p>
                                                    <hr>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endforeach
        </div>
        <div class="column" id="done" ondrop="drop(event, 'Done')" ondragover="allowDrop(event)">
            <p class="col-name heading-S">
                Done
            </p>
            @foreach($priority as $priority_val)
                @foreach($task as $t)
                    @if($t->status_id == 'Done')
                        @if($t->priority_id == $priority_val)
                            <div draggable="true" id="{{$t->id}}" class="task" ondragstart="drag(event)">
                                <div class="dropdown" style="text-align: right;">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <p class="dropdown-item"><a href="{{ route('edit_task',$t->id) }}">Edit task</a></p>
                                        <p class="elipsis-menu-red delete_task dropdown-item" data-id="{{ $t->id }}">Delete task</p>
                                    </ul>
                                </div>
                                <div class="row">
                                    <h5 class="col-8"><b>{{$t->name}}</b></h5>
                                    <p class="col-4 text-danger"> {{ $t->priority_id }} </p>
                                </div>
                                <p> {{ $t->description }} </p>
                                <div class="row">
                                    <div class="col-8 text-right mt-2">
                                        {{ $t->estimation_hours == '' ? 0 :$t->estimation_hours	 }} / {{ $t->progress_hours == '' ? 0 : $t->progress_hours }}
                                        @if($t->estimation_hours > $t->progress_hours)
                                            <span class="p-1 time">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="5px" y="5px" viewBox="0 0 256 256" enable-background="new 0 0 256 256" xml:space="preserve" style="height: 18px; width: 18px;">
                                                    <g><g><path fill="grey" d="M182.6,126.6h-53.1V66.1c0-2.8-2.3-5.1-5.1-5.1h-7.3c-2.8,0-5.1,2.3-5.1,5.1V144h70.6c2.9,0,5.1-2.2,5.1-5.1v-7.2C187.7,128.8,185.5,126.6,182.6,126.6z"/><path fill="grey" d="M128,10C63,10,10,62.9,10,128c0,65.1,53,118,118,118c65,0,118-52.9,118-118C246,63,193.1,10,128,10z M128,228.6c-55.4,0-100.5-45.1-100.5-100.5C27.5,72.6,72.6,27.5,128,27.5S228.5,72.6,228.5,128C228.5,183.4,183.4,228.6,128,228.6z"/></g></g>
                                                </svg>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-4 text-right" style="text-align: right;" >
                                        @if(isset($comment_count[$t->id]))
                                            {{$comment_count[$t->id]}}
                                        @else
                                            0
                                        @endif
                                        <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
                                    </div>
                                    <div class="time-form d-none">
                                        <input type="number" class="form-control" value="{{ $t->remainig_hours }}" max="{{ $t->remainig_hours }}" min="0">
                                        <button class="text-primary save_time" data-id="{{$t->id}}">Save</button>
                                        <button class="text-danger cancel">Cancel</button>
                                    </div>
                                    <div class="comment-form d-none">
                                        <textarea cols="3" maxlength="300" rows="3" class="form-control"></textarea>
                                        <button class="text-primary save" data-id="{{$t->id}}">Save</button>
                                        <button class="text-danger cancel">Cancel</button>
                                        <div class="comment-section">
                                            <h6>Comments</h6>
                                            @foreach($comment as $c)
                                                @if($c->task_id == $t->id)
                                                    <h6><b>Name</b> : {{ $c->user->name }}</h6>
                                                    <p><b>Desc</b> : {{ $c->description }}</p>
                                                    <hr>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endforeach
        </div>
    @endif

@include('components/footer')``