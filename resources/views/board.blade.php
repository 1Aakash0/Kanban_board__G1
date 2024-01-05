@include('components/header')
@include('components/sidebar')

@php $task_type = ["R" =>"Ready To Start" ,"I"=>"In Progress","D"=>"Development","T"=>"Testing","S"=>"Sign Off","Done"=>"Done"]  @endphp

    @if(Auth::user()->role == "C")
        <div class="column" id="start" >
            <p class="col-name heading-S">
                Ready to start
            </p>
            @foreach($task as $t)
                @if($t->status_id == 'R')
                    <div draggable="true" id="{{$t->id}}" class="task">
                        <h5><b>{{$t->name}}</b></h5>
                        <p> {{ $t->description }} </p>
                        <div class="text-right">
                            <div style="text-align: right;">
                                <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
                                <div class="comment-form d-none">
                                    <!-- <textarea cols="3" maxlength="300" rows="3" class="form-control"></textarea>
                                    <button class="text-primary save" data-id="{{$t->id}}">Save</button>
                                    <button class="text-danger cancel">Cancel</button> -->
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
                        <div>
                            <select class="form-control move-req">
                                @foreach($task_type as $key => $type)
                                    @if($key == "R")
                                        <option selected disabled value="{{$key}}"> {{ $type }} </option>
                                    @else
                                        <option value="{{$key}}"> {{ $type }} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="column" id="progress">
            <p class="col-name heading-S">
                In Progress
            </p>
            @foreach($task as $t)
                @if($t->status_id == 'I')
                    <div draggable="true" id="{{$t->id}}" class="task">
                        <h5><b>{{$t->name}}</b></h5>
                        <p> {{ $t->description }} </p>
                        <div class="text-right">
                            <div style="text-align: right;">
                                <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
                                <div class="comment-form d-none">
                                    <!-- <textarea cols="3" maxlength="300" rows="3" class="form-control"></textarea>
                                    <button class="text-primary save" data-id="{{$t->id}}">Save</button>
                                    <button class="text-danger cancel">Cancel</button> -->
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
                        <div>
                            <select class="form-control move-req">
                                @foreach($task_type as $key => $type)
                                    @if($key == "I")
                                        <option selected disabled value="{{$key}}"> {{ $type }} </option>
                                    @else
                                        <option value="{{$key}}"> {{ $type }} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="column" id="dev" >
            <p class="col-name heading-S">
                Development
            </p>
            @foreach($task as $t)
                @if($t->status_id == 'D')
                    <div draggable="true" id="{{$t->id}}" class="task">
                        <h5><b>{{$t->name}}</b></h5>
                        <p> {{ $t->description }} </p>
                        <div class="text-right">
                            <div style="text-align: right;">
                                <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
                                <div class="comment-form d-none">
                                    <!-- <textarea cols="3" maxlength="300" rows="3" class="form-control"></textarea>
                                    <button class="text-primary save" data-id="{{$t->id}}">Save</button>
                                    <button class="text-danger cancel">Cancel</button> -->
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
                        <div>
                            <select class="form-control move-req">
                                @foreach($task_type as $key => $type)
                                    @if($key == "D")
                                        <option selected disabled value="{{$key}}"> {{ $type }} </option>
                                    @else
                                        <option value="{{$key}}"> {{ $type }} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="column" id="testing" >
            <p class="col-name heading-S">
                Testing
            </p>
            @foreach($task as $t)
                @if($t->status_id == 'T')
                    <div draggable="true" id="{{$t->id}}" class="task">
                        <h5><b>{{$t->name}}</b></h5>
                        <p> {{ $t->description }} </p>
                        <div class="text-right">
                            <div style="text-align: right;">
                                <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
                                <div class="comment-form d-none">
                                    <!-- <textarea cols="3" maxlength="300" rows="3" class="form-control"></textarea>
                                    <button class="text-primary save" data-id="{{$t->id}}">Save</button>
                                    <button class="text-danger cancel">Cancel</button> -->
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
                        <div>
                            <select class="form-control move-req">
                                @foreach($task_type as $key => $type)
                                    @if($key == "T")
                                        <option selected disabled value="{{$key}}"> {{ $type }} </option>
                                    @else
                                        <option value="{{$key}}"> {{ $type }} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="column" id="sign" >
            <p class="col-name heading-S">
                Sign Off
            </p>

            @foreach($task as $t)
                @if($t->status_id == 'S')
                    <div draggable="true" id="{{$t->id}}" class="task">
                        <h5><b>{{$t->name}}</b></h5>
                        <p> {{ $t->description }} </p>
                        <div class="text-right">
                            <div style="text-align: right;">
                                <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
                                <div class="comment-form d-none">
                                    <!-- <textarea cols="3" maxlength="300" rows="3" class="form-control"></textarea>
                                    <button class="text-primary save" data-id="{{$t->id}}">Save</button>
                                    <button class="text-danger cancel">Cancel</button> -->
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
                        <div>
                            <select class="form-control move-req">
                                @foreach($task_type as $key => $type)
                                    @if($key == "S")
                                        <option selected disabled value="{{$key}}"> {{ $type }} </option>
                                    @else
                                        <option value="{{$key}}"> {{ $type }} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="column" id="done" >
            <p class="col-name heading-S">
                Done
            </p>
            @foreach($task as $t)
                @if($t->status_id == 'Done')
                    <div draggable="true" id="{{$t->id}}" class="task">
                        <h5><b>{{$t->name}}</b></h5>
                        <p> {{ $t->description }} </p>
                        <div class="text-right">
                            <div style="text-align: right;">
                                <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
                                <div class="comment-form d-none">
                                    <!-- <textarea cols="3" maxlength="300" rows="3" class="form-control"></textarea>
                                    <button class="text-primary save" data-id="{{$t->id}}">Save</button>
                                    <button class="text-danger cancel">Cancel</button> -->
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
                        <div>
                            <select class="form-control move-req">
                                @foreach($task_type as $key => $type)
                                    @if($key == "Done")
                                        <option selected disabled value="{{$key}}"> {{ $type }} </option>
                                    @else
                                        <option value="{{$key}}"> {{ $type }} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
            @endforeach
      </div>

    @else

        <div class="column" id="start" ondrop="drop(event, 'R')" ondragover="allowDrop(event)">
            <p class="col-name heading-S">
                Ready to start
            </p>
            @foreach($task as $t)
                @if($t->status_id == 'R')
                    <div draggable="true" id="{{$t->id}}" class="task" ondragstart="drag(event)">
                        <div style="text-align: right;">
                            <img class="elipsis" src="{{ asset('public/images/icon-vertical-ellipsis.5c8996197d4a9dd7a7adfa20ce4abef9.svg')}}" alt="menu for deleting or editing board">
                            <div class="elipsis-data d-none">
                                <a href="{{ route('edit_task',$t->id) }}"><p>Edit task</p></a>
                                <p class="elipsis-menu-red delete_task">Delete task</p>
                            </div> 
                        </div>
                        <h5><b>{{$t->name}}</b></h5>
                        <p> {{ $t->description }} </p>
                        <div class="text-right">
                            <div style="text-align: right;">
                                <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
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
                    </div>
                @endif
            @endforeach
        </div>
        <div class="column" id="progress" ondrop="drop(event, 'I')" ondragover="allowDrop(event)">
            <p class="col-name heading-S">
                In Progress
            </p>
            @foreach($task as $t)
                @if($t->status_id == 'I')
                    <div draggable="true" id="{{$t->id}}" class="task" ondragstart="drag(event)">
                        <div style="text-align: right;">
                            <img class="elipsis" src="{{ asset('public/images/icon-vertical-ellipsis.5c8996197d4a9dd7a7adfa20ce4abef9.svg')}}" alt="menu for deleting or editing board">
                            <div class="elipsis-data d-none">
                                <a href="{{ route('edit_task',$t->id) }}"><p>Edit task</p></a>
                                <p class="elipsis-menu-red delete_task">Delete task</p>
                            </div> 
                        </div>
                        <h5><b>{{$t->name}}</b></h5>
                        <p> {{ $t->description }} </p>
                        <div class="text-right">
                            <div style="text-align: right;">
                                <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
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
                    </div>
                @endif
            @endforeach
        </div>
        <div class="column" id="dev" ondrop="drop(event, 'D')" ondragover="allowDrop(event)">
            <p class="col-name heading-S">
                Development
            </p>
            @foreach($task as $t)
                @if($t->status_id == 'D')
                    <div draggable="true" id="{{$t->id}}" class="task" ondragstart="drag(event)">
                        <div style="text-align: right;">
                            <img class="elipsis" src="{{ asset('public/images/icon-vertical-ellipsis.5c8996197d4a9dd7a7adfa20ce4abef9.svg')}}" alt="menu for deleting or editing board">
                            <div class="elipsis-data d-none">
                                <a href="{{ route('edit_task',$t->id) }}"><p>Edit task</p></a>
                                <p class="elipsis-menu-red delete_task">Delete task</p>
                            </div> 
                        </div>
                        <h5><b>{{$t->name}}</b></h5>
                        <p> {{ $t->description }} </p>
                        <div class="text-right">
                            <div style="text-align: right;">
                                <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
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
                    </div>
                @endif
            @endforeach
        </div>
        <div class="column" id="testing" ondrop="drop(event, 'T')" ondragover="allowDrop(event)">
            <p class="col-name heading-S">
                Testing
            </p>
            @foreach($task as $t)
                @if($t->status_id == 'T')
                    <div draggable="true" id="{{$t->id}}" class="task" ondragstart="drag(event)">
                        <div style="text-align: right;">
                            <img class="elipsis" src="{{ asset('public/images/icon-vertical-ellipsis.5c8996197d4a9dd7a7adfa20ce4abef9.svg')}}" alt="menu for deleting or editing board">
                            <div class="elipsis-data d-none">
                                <a href="{{ route('edit_task',$t->id) }}"><p>Edit task</p></a>
                                <p class="elipsis-menu-red delete_task">Delete task</p>
                            </div> 
                        </div>
                        <h5><b>{{$t->name}}</b></h5>
                        <p> {{ $t->description }} </p>
                        <div class="text-right">
                            <div style="text-align: right;">
                                <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
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
                    </div>
                @endif
            @endforeach
        </div>

        <div class="column" id="sign" ondrop="drop(event, 'S')" ondragover="allowDrop(event)">
            <p class="col-name heading-S">
                Sign Off
            </p>

            @foreach($task as $t)
                @if($t->status_id == 'S')
                    <div draggable="true" id="{{$t->id}}" class="task" ondragstart="drag(event)">
                        <div style="text-align: right;">
                            <img class="elipsis" src="{{ asset('public/images/icon-vertical-ellipsis.5c8996197d4a9dd7a7adfa20ce4abef9.svg')}}" alt="menu for deleting or editing board">
                            <div class="elipsis-data d-none">
                                <a href="{{ route('edit_task',$t->id) }}"><p>Edit task</p></a>
                                <p class="elipsis-menu-red delete_task">Delete task</p>
                            </div> 
                        </div>
                        <h5><b>{{$t->name}}</b></h5>
                        <p> {{ $t->description }} </p>
                        <div class="text-right">
                            <div style="text-align: right;">
                                <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
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
                    </div>
                @endif
            @endforeach
        </div>

        <div class="column" id="done" ondrop="drop(event, 'Done')" ondragover="allowDrop(event)">
            <p class="col-name heading-S">
                Done
            </p>
            @foreach($task as $t)
                @if($t->status_id == 'Done')
                    <div draggable="true" id="{{$t->id}}" class="task" ondragstart="drag(event)">
                        <div style="text-align: right;">
                            <img class="elipsis" src="{{ asset('public/images/icon-vertical-ellipsis.5c8996197d4a9dd7a7adfa20ce4abef9.svg')}}" alt="menu for deleting or editing board">
                            <div class="elipsis-data d-none">
                                <a href="{{ route('edit_task',$t->id) }}"><p>Edit task</p></a>
                                <p class="elipsis-menu-red delete_task">Delete task</p>
                            </div> 
                        </div>
                        <h5><b>{{$t->name}}</b></h5>
                        <p> {{ $t->description }} </p>
                        <div class="text-right">
                            <div style="text-align: right;">
                                <i class="fa fa-comment p-2 comment" style="color: lightgray; font-size: 20px;"></i>
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
                    </div>
                @endif
            @endforeach
        </div>
    @endif

@include('components/footer')