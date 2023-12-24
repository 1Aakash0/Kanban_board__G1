<?php

namespace App\Http\Controllers;

use App\Models\project_role;
use Illuminate\Http\Request;

class ProjectRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('role');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project_role  $project_role
     * @return \Illuminate\Http\Response
     */
    public function show(project_role $project_role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project_role  $project_role
     * @return \Illuminate\Http\Response
     */
    public function edit(project_role $project_role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project_role  $project_role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project_role $project_role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project_role  $project_role
     * @return \Illuminate\Http\Response
     */
    public function destroy(project_role $project_role)
    {
        //
    }
}
