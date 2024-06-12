<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PermissionStoreRequest;
use App\Http\Requests\PermissionUpdateRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('name', 'asc')->get();
        $title = "permissions";
        return view('permissions.index', compact('permissions', 'title'));
    }

    public function create()
    {
        $permission = new Permission;
        $title = "Permissions";
        $btn = "save";
        return view('permissions.create', compact('permission', 'title', 'btn'));
    }


    public function store(PermissionStoreRequest $request)
    {
        $permission = Permission::create([
            "name" => $request->name,
            "permiso" => $request->permiso,
        ]);
        return redirect()->route('permissions.index')->with('success', 'permission ' . $permission->name . ' creado exitosamente');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        $btn = "modify";
        $title = "Permission";
        return view('permissions.edit', compact('permission', 'title', 'btn'));
    }

    public function update(PermissionUpdateRequest $request, $id)
    {
        $permission = Permission::find($id);
        $permission->update([
            "name" => $request->name,
            "permiso" => $request->permiso,
        ]);
        return redirect()->route('permissions.index')->with('success', 'permission ' . $permission->name . ' creado exitosamente');
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);
        $name = $permission->name;
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'permission ' . $name . ' Eliminado exitosamente');
    }

    public function show($id)
    {
        $permission = Permission::find($id);
        $roles = $this->getRolesOfPermission($id);
        //$roles = dd($roles);
        $btn = "back";
        $title = "Detail of permission";
        return view('permissions.show', compact('permission', 'roles', 'title', 'btn'));
    }

    public function getRolesOfPermission($id)
    {
        $roles = [];
        $data = collect(DB::table('role_has_permissions')->where('permission_id', $id)->get());
        foreach ($data as $d) {
            //print_r($d->role_id . "<br>");
            $role = Role::where('id', $d->role_id)->pluck('name');
            //print_r($d->role_id . "---" . $role . "<br>");
            array_push($roles, $role);
        }
        //dd("Roles ", $roles, "roles_id ", $data);
        return $roles;
    }
}
