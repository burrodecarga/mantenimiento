<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name', 'asc')->get();
        $title = "users list";
        return view('users.index', compact('users', 'title'));
    }

    public function create()
    {
        $user = new User;
        $title = "users";
        $btn = "save";
        $userRole = 0;
        $roles = Role::all();
        $users = user::orderBy('name', 'asc')->get();
        return view('users.create', compact('user', 'userRole', 'roles', 'title', 'btn'));
    }


    public function store(userStoreRequest $request)
    {

        $operador=auth()->user()->getRoleNames()->first();
        $rol="inhabilitado";
        $area='N/A';
         if($operador=="super-admin"){
            $rol = $request->role;
            $rolId=Role::where('id','=',$rol)->get('area')->first();
         }
        dd($rolId->area,$rol);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(30);
        $user->middleware = "no asignado";
        $user->avatar = 'avatar.jpg';
        $user->area = $area;
        $user->save();
        $user->assignRole($rol);
        return redirect()->route('users.index')->with('success', 'user ' . $user->name . ' creado exitosamente');
    }


    public function show($id)
    {
        $user = user::find($id);
        $role = $user->getRoleNames()->first();
        $permissions = $user->getPermissionsViaRoles();
        $btn = "back";
        $title = "detail of user";
        return view('users.show', compact('user', 'role', 'permissions', 'title', 'btn'));
    }

    public function update(userUpdateRequest $request, $id)
    {
        $operador=auth()->user()->getRoleNames()->first();

        $user = user::find($id);
        if ($request->password == '') {
            $password = $user->password;
        } else {
            $password = bcrypt($request->get('password'));
        }
        $area = Role::where('id', $request->role)->pluck('area')->first();
        $user->update([
        'name' => $request->name,
        'email' => $request->get('email'),
        'password' => $password,
        ]);

        if (!$request->role == '') {
         if($operador=="super-admin"){
            $this->revokeRoleOfUser($user->id);
            $user->assignRole($request->role);
            $user->update([
                'area' => $area,
            ]);
         }
        }

        return redirect()->route('users.index')->with('success', 'user ' . $user->name . ' actualizado exitosamente');
    }

    public function edit($id)
    {
        $user = user::find($id);
        $roleName = $user->getRoleNames()->first();
        if ($roleName == null) {
            $userRole = 0;
        } else {
            $userRole_id = Role::where('name', $roleName)->get()->pluck('id')->first();
            $userRole = $userRole_id;
        }
        //dd($userRole);
        $roles = Role::all();
        $btn = "modify";
        $title = "user";
        return view('users.edit', compact('user', 'userRole', 'roles', 'title', 'btn'));
    }


    public function destroy($id)
    {
        if($this->authorize('isSuper'));
        $user = user::find($id);
        $name = $user->name;
        $user->delete();
        return redirect()->route('users.index')->with('success', 'user ' . $name . ' Eliminado exitosamente');
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

    public function revokeRoleOfUser($id)
    {
        DB::table('model_has_roles')->where('model_id', $id)->delete();
    }

    public function profile(User $user)
    {
        $btn = "modify";
        $title = "user";
        return view('users.profile', compact('user', 'title', 'btn'));
    }


    public function updateUser(userUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $data = $request->only('name', 'email', 'address', 'phone', 'movil', 'avatar', 'plus', 'card_id', 'password');
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'movil' => $request->movil,
            'card_id' => $request->card_id,
            'plus' => $request->plus,
        ]);
        if ($request->input('password')) {
            $secret = \bcrypt($request->input('password'));
            $user->fill(['password' => $secret])->save();
        }
        $filename = $user->avatar;
       //dd($filename);
        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            $extension = $request->file('avatar')->extension();
            $avatar = 'user' . time() . '.' . $extension;
            if ($filename <> 'avatar.jpg' && $filename<>null) {
                $avatar_path = "app/avatars/" . $filename;
                if (File::exists($avatar_path)) {
                    unlink($avatar_path);
                }
            }

            $filename = $avatar;
            Storage::disk('avatars')->put($avatar, File::get($file));
        }

        $user->update(['avatar' => $filename]);
        $user->save();


        return redirect()->route('home')->with('success', 'user ' . $user->name . ' actualizado exitosamente');
    }
}
