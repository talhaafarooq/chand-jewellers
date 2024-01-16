<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateUserManagementRequest;
use App\Http\Requests\Admin\UserManagementRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserManagementController extends Controller
{
    public function index()
    {
        // if(auth()->user()->can('view-admin-user'))
        // {
            $search = null;
            $users = User::with('roles')->role(UserTypeEnum::AdminUser)->orderBy('id', 'desc')->paginate(10);
            return view('admin.user-management.index',compact('search','users'));
        // }else{
        //     return redirect()->back()->with('access_granted','User does not have permission.');
        // }
    }

    public function create()
    {
        // if(auth()->user()->can('create-admin-user'))
        // {
            $roles = Role::select('id','name')->where('type','admin')->get();
            return view('admin.user-management.create',compact('roles'));
        // }else{
        //     return redirect()->back()->with('access_granted','User does not have permission.');
        // }
    }

    public function store(UserManagementRequest $request)
    {
        // if(auth()->user()->can('create-admin-user'))
        // {
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->phone_no = $request->phone;
            $user->created_by = auth()->user()->id;
            $user->role = UserTypeEnum::AdminUser;
            $user->is_block = $request->status;
            $user->save();
            $user->assignRole($request->role);
            return redirect()->route('admin.user-management.index')->with('success', 'User created successfully');
        // }else{
        //     return redirect()->back()->with('access_granted','User does not have permission.');
        // }
    }

    public function edit($id)
    {
        // if(auth()->user()->can('update-admin-user'))
        // {
            $user = User::findOrFail($id);
            // $roles = Role::select('name','name')->where('user_type','admin')->get();
            $roles = Role::where('type', 'admin')->get();
            return view('admin.user-management.edit',compact('user','roles'));
        // }else{
        //     return redirect()->back()->with('access_granted','User does not have permission.');
        // }
    }

    public function update(UpdateUserManagementRequest $request, $id)
    {
        // if(auth()->user()->can('update-admin-user'))
        // {
            $user1 = User::findOrFail($id);

            $user = User::findOrFail($id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone_no = $request->phone;
            $user->is_block = $request->status;
            $user->save();
            if(isset($request->new_password))
            {
                $this->validate($request,['new_password'=>'min:8|max:16']);
                $user->password = $request->new_password;
                $user->save();
            }

            $user->roles()->detach();
            $user->assignRole($request->role);
            return redirect()->route('admin.user-management.index')->with('success', 'User updated successfully');
        // }else{
        //     return redirect()->back()->with('access_granted','User does not have permission.');
        // }
    }

    public function destroy($id)
    {
        // if(auth()->user()->can('delete-admin-user'))
        // {
            $user = User::findOrFail($id);
            $user->roles()->detach();
            $user->delete();
            return redirect()->route('admin.user-management.index')->with('success', 'User deleted successfully');
        // }else{
        //     return redirect()->back()->with('access_granted','User does not have permission.');
        // }
    }
}
