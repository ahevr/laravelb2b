<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{

    function __construct(){

        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['user.index','user.store']]);
        $this->middleware('permission:user-create', ['only' => ['user.create','user.store']]);
        $this->middleware('permission:user-edit', ['only' => ['user.edit','user.update']]);
        $this->middleware('permission:user-delete', ['only' => ['user.delete']]);
    }

    public function index(){

        $users = User::all();

        return view("app.admin.page.users.index")
            ->with("users",$users);

    }

    public function create(){

        $roles = Role::pluck("name","name")->all();

        return view("app.admin.page.users.create")
            ->with("roles",$roles);

    }

    public function store(Request $request){

        $request->validate([
            "name"     => "required|min:2|max:80",
            "email"    => "required",
            "password" => "required"
        ]);

        $users = new User();

        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);

        $users->save();

        $users->assignRole($request->input('roles'));

        return redirect("admin/users")->with("toast_success","$request->name". " Adlı Ürün Kullanıcı Bir Şekilde Eklendi");

    }

    public function edit($id){

        $user  = User::findOrFail($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('app.admin.page.users.edit')
            ->with("user",$user)
            ->with("roles",$roles)
            ->with("userRole",$userRole);
    }

    public function update(Request $request, $id){

        $input = $request->all();

        if(!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);

        DB::table('model_has_roles')
            ->where('model_id', $id)
            ->delete();

        $user->assignRole($request->input('roles'));

        return back()->with("toast_success","$request->name". " Kullanıcı Başarılı Bir Şekilde Güncellendi");
    }

    public function delete($id){

        $users = User::findOrFail($id);
        $users->delete();
        return back()->with("toast_success","Kullanıcı Başarılı Bir Şekilde Silindi");
    }

}
