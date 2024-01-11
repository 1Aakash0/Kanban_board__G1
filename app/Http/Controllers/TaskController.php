<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\project;
use App\Models\User;
use App\Models\task;
use App\Models\comment;
use App\Models\task_req;
use App\Models\logs;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $developer = User::where('role','D')->where('is_delete','0')->get();

        $role = Auth::user()->role;
        $id = Auth::user()->id;
        if($role == 'D') {
            $task = task::where('assignee_id',$id)->pluck('project_id')->toArray();
            $project = project::whereIn('id',$task)->get();
        } elseif($role == 'P') {
            $project = project::where('pm_id',Auth::user()->id)->get();
        } elseif($role == "A"){
            $project = project::all();
        } elseif($role == "C"){
            $project = project::where('u_id',Auth::user()->id)->get();
        }
        return view('task',compact(['project','developer']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'task'=>'required|unique:projects,name|max:255',
            'desc'=>'required|max:255',
            'p_name'=>'required|notIn:Select Project Name',
            'developer'=>'required|notIn:Select Developer Name',
            'status'=>'required|notIn:Select Status',
            'priority'=>'required|notIn:Select Task Priority',
            'estimation_hr'=>'required',
        ]);

        $task = new task();
        $task->name = $request->task;
        $task->description = $request->desc;
        $task->project_id = $request->p_name;
        $task->assignee_id = $request->developer;
        $task->status_id = $request->status;
        $task->priority_id = $request->priority;
        $task->estimation_hours = $request->estimation_hr;

        if($task->save()){
            $request->session()->flash('success','Task Created Successfully');
        } else {
            $request->session()->flash('errro','Something went wrong');
        }

        return redirect('board/'.$request->p_name);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($project_id)
    {
        $role = Auth::user()->role;
        $id = Auth::user()->id;
        if($role == 'D') {
            $task = task::where('assignee_id',$id)->pluck('project_id')->toArray();
            $project = project::whereIn('id',$task)->get();
        } elseif($role == 'P') {
            $project = project::where('pm_id',Auth::user()->id)->get();
        } elseif($role == "A"){
            $project = project::all();
        } elseif($role == "C"){
            $project = project::where('u_id',Auth::user()->id)->get();
        }
        $task = task::where('project_id',$project_id)->where('is_delete','0')->get();
        $comment_count = comment::selectRaw('task_id, count(*) as total')
                                ->groupBy('task_id')
                                ->pluck('total','task_id')->all();
        $comment = comment::all();
        return view('board',compact('task','project','comment','comment_count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($task_id)
    {
        $developer = User::where('role','D')->where('is_delete','0')->get();
        $role = Auth::user()->role;
        $id = Auth::user()->id;
        if($role == 'D') {
            $task = task::where('assignee_id',$id)->pluck('project_id')->toArray();
            $project = project::whereIn('id',$task)->get();
        } elseif($role == 'P') {
            $project = project::where('pm_id',Auth::user()->id)->get();
        } elseif($role == "A"){
            $project = project::all();
        } elseif($role == "C"){
            $project = project::where('u_id',Auth::user()->id)->get();
        }
        $task = task::where('id',$task_id)->first();
        
        return view('task',compact(['project','developer','task']));
    }

    public function edit_submit(Request $request) {
        $task = task::where('id',$request->id)->first();

        $this->validate($request,[
            'task'=>'required|unique:projects,name|max:255',
            'desc'=>'required|max:255',
            'p_name'=>'required|notIn:Select Project Manager',
            'developer'=>'required|notIn:Select Developer Name',
            'status'=>'required|notIn:Select Status',
            'priority'=>'required|notIn:Select Task Priority',
            'estimation_hr'=>'required',
        ]);

        $task->name = $request->task;
        $task->description = $request->desc;
        $task->project_id = $request->p_name;
        $task->assignee_id = $request->developer;
        $task->status_id = $request->status;
        $task->priority_id = $request->priority;
        $task->estimation_hours = $request->estimation_hr;

        if($task->save()){
            $request->session()->flash('success','Task Updated Successfully');
        } else {
            $request->session()->flash('error','Something went wrong');
        }

        return redirect()->back();
    }

    public function delete_task(Request $request){
        $id = $request->id;
        if(task::where('id',$id)->update(['is_delete' => '1'])) {
             return response()->json(['success' => true, 'message' => 'Task deleted Successfully']);
        } else {
             return response()->json(['success' => true, 'message' => 'Something went wrong']);
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $task = task::where('id',$request->taskId)->first();
        $pre_status = $task->status_id;
        $task->status_id = $request->status;
        if($task->save()){
            $model = new logs();
            $model->cus_id = Auth::user()->id;
            $model->task_id = $task->id;
            $model->project_id = $task->project_id;
            $model->status = $task->status_id;
            $model->pre_status = $pre_status;
            $model->save();
            return response()->json(['success' => true, 'message' => 'Done']);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong']);
        }
    }

    public function comment(Request $request){
        $task_id = $request->ids; 
        $description = $request->desc; 
        $comment = new comment();
        $comment->task_id = $task_id;
        $comment->description = $description;
        $comment->user_id = Auth::user()->id;
        if($comment->save()){
            return response()->json(['success' => true, 'message' => 'Comment Added Successfully']);
        }else {
            return response()->json(['success' => false, 'message' => 'Something went wrong']);
        }     
    }

    public function send_req(Request $request) {
        $task_id = $request->task_id;
        $status = $request->status;
        $task = task::where('id',$task_id)->first();
        $model = new task_req();
        $model->task_id = $task_id;
        $model->status = $status;
        $model->project_id = $task->project_id;
        $model->cus_id = Auth::user()->id;

        if($model->save()){
            return response()->json(['success' => true, 'message' => 'Your Request Sent Successfully']);
        }else {
            return response()->json(['success' => false, 'message' => 'Something went wrong']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function log_list()
    {
        $role = Auth::user()->role;
        $id = Auth::user()->id;
        if($role == 'D') {
            $task = task::where('assignee_id',$id)->pluck('project_id')->toArray();
            $project = project::whereIn('id',$task)->get();
            $log = logs::whereIn('project_id',$task)->get();
        } elseif($role == 'P') {
            $project = project::where('pm_id',Auth::user()->id)->get();
            $log = logs::all();
        } elseif($role == "A"){
            $project = project::all();
            $log = logs::all();
        } elseif($role == "C"){
            $project = project::where('u_id',Auth::user()->id)->get();
            $project_id = project::where('u_id',Auth::user()->id)->pluck('id')->toArray();
            $log = logs::whereIn('project_id',$project_id)->get();
        }

        return view('log',compact(['project','log']));
    }

    public function req_list() {
        $role = Auth::user()->role;
        $id = Auth::user()->id;
        if($role == "A"){
            $model = task_req::all();
            $project = project::all();
        } elseif($role == "C"){
            $model = task_req::where('cus_id',$id)->get();
            $project = project::where('u_id',Auth::user()->id)->get();
        }
        
        return view('req_list',compact(['project','model']));
    }

    public function delete_req(Request $request) {
        if(task_req::where('id',$request->id)->update(['action' => 'Reject'])){
            return response()->json(['success' => true, 'message' => 'Request Deleted Successfully']);
        }else {
            return response()->json(['success' => false, 'message' => 'Something went wrong']);
        }
    }

    public function accept_req(Request $request){
        $req = task_req::where('id',$request->id)->first(); 
        $task = task::where('id',$req->task_id)->first();
        $pre_status = $task->priority_id;  
        $req->action = "Approve";
        if($req->save()) {
            if(task::where('id',$req->task_id)->update(['priority_id'=>$req->status])){
                // $model = new logs();
                // $model->cus_id = $req->cus_id;
                // $model->task_id = $task->id;
                // $model->project_id = $task->project_id;
                // $model->status = $req->status;
                // $model->pre_status = $pre_status;
                // $model->save();
                return response()->json(['success' => true, 'message' => 'Request Approved Successfully']);
            }else {
                return response()->json(['success' => false, 'message' => 'Something went wrong']);
            }

        }
    }

    public function add_time(Request $request){
        $task_type = ["R","I","D","T","S","Done"];
        $task_id = $request->ids; 
        $time = $request->time; 
        $task = task::where('id',$task_id)->first();
        foreach($task_type as $key => $val) {
            if($val == $task->status_id) {
                $status_id = $task_type[$key + 1] ? $task_type[$key + 1] : $task_type[$key];
            }
        }
        $progress = $task->progress_hours + $time;
        $remaining = $task->estimation_hours - $progress;
        $task->progress_hours = $progress;
        $task->remainig_hours = $remaining;

        if($task->estimation_hours == $progress) {
            $task->status_id = $status_id;
        }
        if($task->save()){
            return response()->json(['success' => true, 'message' => 'Time Added Successfully']);
        }else {
            return response()->json(['success' => false, 'message' => 'Something went wrong']);
        }     
        dd($request->post());
    }
}
