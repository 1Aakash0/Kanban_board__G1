<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\project;
use App\Models\User;
use App\Models\task;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->role;
        $id = Auth::user()->id;
        if($role == 'D') {
            $task = task::where('assignee_id',$id)->pluck('project_id')->toArray();
            $project = project::whereIn('id',$task)->get();
        } elseif($role == 'P') {
            $project = project::all();
        } elseif($role == "A"){
            $project = project::all();
        } elseif($role == "C"){
            $project = project::where('u_id',Auth::user()->id)->get();
        }
        return view('project_list',compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Auth::user()->role;
        $id = Auth::user()->id;
        if($role == 'D') {
            $task = task::where('assignee_id',$id)->pluck('project_id')->toArray();
            $project = project::whereIn('id',$task)->get();
        } elseif($role == 'P') {
            $project = project::all();
        } elseif($role == "A"){
            $project = project::all();
        } elseif($role == "C"){
            $project = project::where('u_id',Auth::user()->id)->get();
        }
        $customer = User::where('role','C')->where('is_delete','0')->get();
        $project_manager = User::where('role','P')->where('is_delete','0')->get();
        return view('project',compact(['customer','project_manager','project']));
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
            'project'=>'required|unique:projects,name|max:255',
            'desc'=>'required|max:255',
            'manager'=>'required|notIn:Select Project Manager',
            'customer'=>'required|notIn:Select Customer Name',
        ]);

        $project = new project();
        $project->name = $request->project;
        $project->description = $request->desc;
        $project->pm_id = $request->manager;
        $project->u_id = $request->customer;

        if($project->save()){
            $request->session()->flash('success','Project Created Successfully');
        } else {
            $request->session()->flash('errro','Something went wrong');
        }

        return redirect('project_list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        //
    }
}
