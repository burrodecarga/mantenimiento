<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('name', 'asc')->get();
        $title = " Roles";
        return view('roles.index', compact('roles', 'title'));
    }

    public function create()
    {
        $role = new Role;
        $permissions = Permission::orderBy('permiso', 'asc')->get();
        $permission_id = $this->getPermissionOfRole(0);
        $title = "Roles";
        $btn = "save";
        return view('roles.create', compact('role', 'permissions', 'permission_id', 'title', 'btn'));
    }

    public function store(RoleStoreRequest $request)
    {
        $permissions = collect($request->permissions);
        $role = Role::create([
            "name" => $request->name,
            "area" => $request->area,
        ]);
        foreach ($permissions as $key => $p) {
            $role->givePermissionTo($p);
        }
        return redirect()->route('roles.index')->with('success', 'Role ' . $role->name . ' creado exitosamente');
    }

    public function show($id)
    {
        $role = Role::find($id);
        $permission_id = $this->getPermissionOfRole($id);
        $permissions = Permission::orderBy('permiso', 'asc')->get();
        $btn = "back";
        $title = "Detail of Role";
        return view('roles.show', compact('role', 'permission_id', 'permissions', 'title', 'btn'));
    }

    public function update(RoleUpdateRequest $request, $id)
    {
        $role = Role::find($id);
        $role->update([
            "name" => $request->name,
            "area" => $request->area,
        ]);
        $permissions = $request->permissions;
        $this->removePermissionsOfRole($id);
        foreach ($permissions as $key => $p) {
            $role->givePermissionTo($p);
        }
        return redirect()->route('roles.index')->with('success', 'Role ' . $role->name . ' actualizado exitosamente');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission_id = $this->getPermissionOfRole($id);
        $permissions = Permission::orderBy('permiso', 'asc')->get();
        $btn = "modify";
        $title = " Rol";
        //dd($permission_id, $permissions);
        return view('roles.edit', compact('role', 'permission_id', 'permissions', 'title', 'btn'));
    }


    public function destroy($id)
    {
        $role = Role::find($id);
        $name = $role->name;
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role ' . $name . ' Eliminado exitosamente');
    }

    public function getPermissionOfRole($id)
    {
        $permissions = array();
        $data = collect(DB::table('role_has_permissions')->where('role_id', $id)->get());
        $permissions_id = $data->map(function ($data) {
            return $data->permission_id;
        });
        return $permissions_id->toArray();
    }

    public function removePermissionsOfRole($id)
    {
        DB::table('role_has_permissions')->where('role_id', $id)->delete();
    }
}
