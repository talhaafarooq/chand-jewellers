<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RolePermissionRequest;
use App\Http\Requests\Admin\UpdateRolePermissionRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function index()
    {
        // if(auth()->user()->can('view-admin-role'))
        // {
            $search = null;
            $roles = Role::where('type','admin')->paginate(10);
            return view('admin.roles_permissions.index',compact('search','roles'));
        // }else{
        //     return redirect()->back()->with('access_granted','User does not have permission.');
        // }
    }

    public function create()
    {
        // if(auth()->user()->can('create-admin-role'))
        // {
            return view('admin.roles_permissions.create');
        // }else{
        //     return redirect()->back()->with('access_granted','User does not have permission.');
        // }
    }

    public function store(RolePermissionRequest $request)
    {
        // if(auth()->user()->can('create-admin-role'))
        // {
            if(isset($request->permissions) && count($request->permissions)>0)
            {
                $role = new Role();
                $role->name = $request->role_name;
                $role->type = 'admin';
                $role->created_by = auth()->user()->id;
                $role->save();

                foreach($request->permissions as $permission)
                {
                    $role->givePermissionTo($permission);
                }
                return redirect()->route('admin.roles.index')->with('success', 'Role created successfully');
            }else{
                return redirect()->back()->with('failure', 'Please assign permission.');
            }
        // }else{
        //     return redirect()->back()->with('access_granted','User does not have permission.');
        // }
    }

    public function edit($id)
    {
        // if(auth()->user()->can('update-admin-role'))
        // {
            $edit = Role::with('permissions')->findOrFail($id);
            return view('admin.roles_permissions.edit',compact('edit'));
        // }else{
        //     return redirect()->back()->with('access_granted','User does not have permission.');
        // }
    }

    public function update(UpdateRolePermissionRequest $request, $id)
    {
        // if (auth()->user()->can('update-admin-role')) {
            if (isset($request->permissions) && count($request->permissions) > 0) {
                $role = Role::with('permissions')->findOrFail($id);
                $role->update(['name' => $request->role_name]);

                $role->syncPermissions($request->input('permissions', []));
                return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully');
            } else {
                return redirect()->back()->with('failure', 'Please assign permission.');
            }
        // } else {
        //     return redirect()->back()->with('access_granted', 'User does not have permission.');
        // }
    }

    public function destroy($id)
    {
        // if(auth()->user()->can('delete-admin-role'))
        // {
            Role::findOrFail($id)->delete();
            return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully');
        // }else{
        //     return redirect()->back()->with('access_granted','User does not have permission.');
        // }
    }
}
