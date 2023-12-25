<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\role;
use App\Models\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $role = Auth::user()->role;
        $id = Auth::user()->id;
            $project = project::all();
        $user = User::where('is_delete','0')->get();
        return view('user_list',compact(['user','project']));
    }

    public function create() 
    {   

        $role = Auth::user()->role;
        $id = Auth::user()->id;
            $project = project::all();
        
        return view('user',compact('project'));
    }

    public function store(Request $request) {
        $this->validate($request,[
            'name'=>'required|max:255',
            'mobile'=>'required|min:10|max:10',
            'role'=>'notIn:Select Role',
            'email'=>'required|email|max:255|unique:users,email',
            'password'=>'required|min:6',
            'confirm-password'=>'required|same:password',
        ]);

        $user = new User();
        $user->name = $request->name; 
        $user->mobile = $request->mobile; 
        $user->email = $request->email; 
        $user->role = $request->role; 
        $user->password = Hash::make($request->password); 

        if($user->save()){
            $request->session()->flash('success','User Created Successfully');
        } else {
            $request->session()->flash('errro','Something went wrong');
        }

        return redirect('user_list');
    }

    public function edit($user_id) {
        $role = Auth::user()->role;
        $id = Auth::user()->id;
            $project = project::all();
        $user = User::where('id',$user_id)->first();
        return view('user',compact('user','project'));

    }

    public function update(Request $request) {
        $user = User::where('id',$request->u_id)->first();
        $user->name = $request->name; 
        $user->mobile = $request->mobile; 
        $user->email = $request->email; 
        $user->role = $request->role;
        if($user->save()){
            $request->session()->flash('success','User Updated Successfully');
        } else {
            $request->session()->flash('errro','Something went wrong');
        }

        return redirect('user_list');
    }

    public function destroy(Request $request) {
        
        if(User::where('id',$request->id)->update('is_delete','1')){
            return response()->json(['success' => true, 'message' => 'User Deleted Successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong']);
        }
    }
}
