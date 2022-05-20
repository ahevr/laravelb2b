<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['roles.index','roles.store']]);
        $this->middleware('permission:role-create', ['only' => ['roles.create','roles.store']]);
        $this->middleware('permission:role-edit', ['only' => ['roles.edit','roles.update']]);
    }

    public function index(Request $request){

        $data = Role::latest()->paginate(5);

        return view('app.admin.page.roles.index')
            ->with("data",$data);
    }

    public function create(){

        $permission = Permission::get();

        return view('app.admin.page.roles.create')
            ->with("permission",$permission);
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required|unique:roles,name',
        ]);

        $role = new Role();

        $role->name = $request->name;

        $role->save();

        $role->syncPermissions($request->input('permission'));

//        return redirect()->route('roles.index')
//            ->with('success', 'Role created successfully.');

         return redirect("admin/role")->with("toast_success","$request->name". "Role Başarılı Bir Şekilde Eklendi");
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('app.admin.page.roles.edit')
            ->with("role",$role)
            ->with("permission",$permission)
            ->with("rolePermissions",$rolePermissions);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::findOrFail($id);

        $role->name = $request->name;

        $role->update();

        $role->syncPermissions($request->input('permission'));

        return back()->with("toast_success","$request->name". " Rol Başarılı Bir Şekilde Güncellendi");
    }

}
