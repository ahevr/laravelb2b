<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['permission.index','permission.store']]);
        $this->middleware('permission:permission-create', ['only' => ['permission.create','permission.store']]);
        $this->middleware('permission:permission-edit', ['only' => ['permission.edit','permission.update']]);
    }

    public function index(Request $request){

        $data = Permission::latest()->paginate(10);

        return view('app.admin.page.permissions.index')
            ->with("data",$data);
    }

    public function create(){

        return view('app.admin.page.permissions.create');
    }

    public function store(Request $request){

        $this->validate($request, ['name' => 'required|unique:permissions,name',]);

        $permission = new Permission();

        $permission->name = $request->name;

        $permission->save();

        return redirect("admin/permission")->with("toast_success","$request->name". "İzin Başarılı Bir Şekilde Eklendi");
    }

}
