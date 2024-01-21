<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RolePermissionRequest;
use App\Http\Requests\Admin\UpdateRolePermissionRequest;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-categories|create-category|edit-category|delete-category', ['only' => ['index','show']]);
        $this->middleware('check.permissions:view-roles', ['only' => 'index']);
        $this->middleware('check.permissions:create-role', ['only' => ['create', 'store']]);
        $this->middleware('check.permissions:update-role', ['only' => ['edit', 'update']]);
        $this->middleware('check.permissions:delete-role', ['only' => 'destroy']);
    }

    public function index()
    {
        $search = null;
        $roles = Role::where('type', 'admin')->paginate(10);
        return view('admin.roles_permissions.index', compact('search', 'roles'));
    }

    public function create()
    {
        return view('admin.roles_permissions.create');
    }

    public function store(RolePermissionRequest $request)
    {
        if (isset($request->permissions) && count($request->permissions) > 0) {
            $role = new Role();
            $role->name = $request->role_name;
            $role->type = 'admin';
            $role->created_by = auth()->user()->id;
            $role->save();

            foreach ($request->permissions as $permission) {
                $role->givePermissionTo($permission);
            }
            return redirect()->route('admin.roles.index')->with('success', 'Role created successfully');
        } else {
            return redirect()->back()->with('failure', 'Please assign permission.');
        }
    }

    public function edit($id)
    {
        $edit = Role::with('permissions')->findOrFail($id);
        return view('admin.roles_permissions.edit', compact('edit'));
    }

    public function update(UpdateRolePermissionRequest $request, $id)
    {
        if (isset($request->permissions) && count($request->permissions) > 0) {
            $role = Role::with('permissions')->findOrFail($id);
            $role->update(['name' => $request->role_name]);

            $role->syncPermissions($request->input('permissions', []));
            return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully');
        } else {
            return redirect()->back()->with('failure', 'Please assign permission.');
        }
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully');
    }
}
