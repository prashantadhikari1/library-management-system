<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $i = 1;
        $users = User::all();
        return view('backend.pages.user.index', compact('i','users'));
    }

    public function create(Request $request) {
        $roles = Role::whereStatus(1)->get();
        return view('backend.pages.user.create', compact('roles'));
    }

    public function store(Request $request) {
        $inputFields = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'phone' => 'required|unique:users,phone',
            'role_id' => 'required',
            'status' => 'required'
        ],
        [
            'role_id.required' => 'The role field is required'
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->phone = $request->input('phone');
        $user->role_id = $request->input('role_id');
        $user->status = $request->input('status');

        if($request->hasFile('image'))
        {
            $image = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move('public/images/user',$image);
            $user->image = $image;
        }
        else {
            $user->image = '';
        }
        $user->save();
        return redirect('user')->with('success','user created successfully.');
    }
    
    public function edit($id) {
        $user = User::find($id);
        $roles = Role::whereStatus(1)->get();
        return view('backend.pages.user.edit', compact('user','roles'));
    }

    public function update(Request $request, User $user) {
        $inputFields = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
            'phone' => 'required|unique:users,phone,'.$user->id,
            'role_id' => 'required'
        ],
        [
            'role_id.required' => 'The role field is required'
        ]);

        $user->name = $inputFields['name'];
        $user->address = $inputFields['address'];
        $user->email = $inputFields['email'];
        $user->phone = $inputFields['phone'];
        $user->role_id = $inputFields['role_id'];

        if($request->hasFile('image')) {
            $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
            if($user->image!="") {
                if(file_exists('public/images/user/'.$user->image)) {
                    unlink('public/images/user/'.$user->image);   
                }
            }
            $request->image->move('public/images/user',$imageName);
            $user->image = $imageName;
        }

        $user->update();
        return redirect('user');
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect('user');
    }

    public function inactive($id) {
        $status = User::find($id);
        $status->status = '0';
        $status->save();
        return redirect('user');
    }
    public function active($id) {
        $status = User::find($id);
        $status->status = '1';
        $status->save();
        return redirect('user');
    }
}
