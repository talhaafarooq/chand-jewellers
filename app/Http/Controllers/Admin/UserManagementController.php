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
    public function __construct()
    {
        // $this->middleware('permission:view-categories|create-category|edit-category|delete-category', ['only' => ['index','show']]);
        $this->middleware('check.permissions:view-users', ['only' => 'index']);
        $this->middleware('check.permissions:create-user', ['only' => ['create', 'store']]);
        $this->middleware('check.permissions:update-user', ['only' => ['edit','update']]);
        $this->middleware('check.permissions:delete-user', ['only' => 'destroy']);
    }

    public function index()
    {
        $search = null;
        $users = User::with('roles')->role(UserTypeEnum::AdminUser)->orderBy('id', 'desc')->paginate(10);
        return view('admin.user-management.index', compact('search', 'users'));
    }

    public function create()
    {
        $roles = Role::select('id', 'name')->where('type', 'admin')->get();
        return view('admin.user-management.create', compact('roles'));
    }

    public function store(UserManagementRequest $request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone_no = $request->phone;
        $user->created_by = auth()->user()->id;
        $user->role = UserTypeEnum::AdminUser;
        $user->type = $request->role;
        $user->is_block = $request->status;
        $user->save();
        $user->assignRole($request->role);
        return redirect()->route('admin.user-management.index')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::where('type', 'admin')->get();
        return view('admin.user-management.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserManagementRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_no = $request->phone;
        $user->is_block = $request->status;
        $user->save();
        if (isset($request->new_password)) {
            $this->validate($request, ['new_password' => 'min:8|max:16']);
            $user->password = $request->new_password;
            $user->save();
        }

        $user->roles()->detach();
        $user->assignRole($request->role);
        return redirect()->route('admin.user-management.index')->with("success", "User updated successfully");
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('admin.user-management.index')->with('success', 'User deleted successfully');
    }
}
