<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('role-show');

        $rs = Role::orderBy('id', 'DESC')->paginate(5);

        $roleIds = $rs->pluck('id');

        $rolePermissions = DB::table('role_has_permissions')
            ->whereIn('role_has_permissions.role_id', $roleIds)
            ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->select('role_has_permissions.permission_id as pid', 'permissions.name as pname', 'role_has_permissions.role_id as rid')
            ->get();

        return view('roles.index', compact('rs', 'rolePermissions'));
    }

    public function create()
    {
        $this->authorize('role-create');

        if (auth()->user()->can('Super Admin')) {
            $permission = Permission::all();
        } else {
            $permission = Permission::whereNotIn('name', ['permission-create', 'permission-delete', 'permission-edit'])->get();
        }

        return view('roles.create', compact('permission'));
    }

    public function store(Request $request)
    {
        $this->authorize('role-create');

        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $permissions = Permission::whereIn('name', ['permission-create', 'permission-delete', 'permission-edit'])->pluck('id')->all();

        foreach ($request->permission as $p) {
            if (in_array($p, $permissions)  && !auth()->user()->can('Super Admin')) {
                abort(403);
            }
        }

        $role = Role::create(['guard_name' => 'web', 'name' => $request->input('name')]);

        foreach ($request->permission as $p) {
            $role->givePermissionTo($p);
        }

        // $role->syncPermissions($request->input('permission'));

        return redirect()->route('admin.roles.index')
            ->with('create-success', 'Role "' . $request->input('name') . '" created successfully.');
    }

    public function edit($id)
    {
        $this->authorize('role-edit');

        $role = Role::find($id);

        if (auth()->user()->can('Super Admin')) {
            $permission = Permission::all();
        } else {
            $permission = Permission::whereNotIn('name', ['permission-create', 'permission-delete', 'permission-edit'])->get();
        }


        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('role-edit');

        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $permissions = Permission::whereIn('name', ['permission-create', 'permission-delete', 'permission-edit'])->pluck('id')->all();

        foreach ($request->permission as $p) {
            if (in_array($p, $permissions)  && !auth()->user()->can('Super Admin')) {
                abort(403);
            }
        }

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('admin.roles.index')
            ->with('update-success', 'Role "' . $request->input('name') . '" updated successfully.');
    }

    public function destroy($id)
    {
        $this->authorize('role-delete');

        Role::find($id)->delete();

        return redirect()->route('admin.roles.index')
            ->with('delete-success', 'Role deleted successfully');
    }
}
