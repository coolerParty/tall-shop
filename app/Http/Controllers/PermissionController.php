<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('permission-show');

        if (auth()->user()->can('Super Admin')) {
            $ps = Permission::orderBy('id', 'DESC')->paginate(10);
        } else {
            $ps = Permission::whereNotIn('name', ['permission-create', 'permission-delete', 'permission-edit'])->orderBy('id', 'DESC')->paginate(10);
        }


        return view('permissions.index', compact('ps'));
    }

    public function create()
    {
        $this->authorize('permission-create');

        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $this->authorize('permission-create');

        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create(['guard_name' => 'web', 'name' => $request->input('name')]);

        return redirect()->route('permissions.index')
            ->with('create-success', 'Permission "' . $request->input('name') . '" has been created successfully.');
    }

    public function edit($id)
    {
        $this->authorize('permission-edit');

        $permission = Permission::find($id);

        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('permission-edit');

        $this->validate($request, [
            'name' => 'required'
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->save();

        return redirect()->route('permissions.index')
            ->with('update-success', 'Permission "' . $request->input('name') . '" has been updated successfully.');
    }

    public function destroy($id)
    {
        $this->authorize('permission-delete');

        Permission::find($id)->delete();

        return redirect()->route('permissions.index')
            ->with('delete-success', 'Permission deleted successfully');
    }
}
