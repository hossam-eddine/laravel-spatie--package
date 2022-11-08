<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index () {

        $roles = Role::whereNotIn('name',['admin'])->get();
        return view('admin.role.index',compact('roles'));
    }
    public function create()
    {
        return view('admin.role.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,
        [
            "name"=>"required|unique:roles,name,except,id"
        ]);
        Role::create([
            "name"=>$request->name
        ]);

        return to_route('admin.roles.index')->with("message","Role Created successfully")
        ->with('icon','success');
    }


    public function edit ($id)
    {
        $permissions = Permission::all();
        $role = Role::findOrfail($id);
        return view('admin.role.edit',compact('role','permissions'));

    }

    public function update (Request $request,$id)
    {
        $role = Role::findOrfail($id);

        $attributes   =$this->validate($request,
        [
            "name"=>"required|min:3"
        ]);

        $role->update($attributes);

        return to_route('admin.roles.index')->with("message","Role Updated successfully")
        ->with('icon','success');

    }

    public function destroy ($id)
    {
        $role = Role::findOrfail($id);

        $role->delete();
        return to_route('admin.roles.index')->with("message","Role Deleted successfully");

    }


    public function givePermission(Request $request,$id)
    {

        $role = Role::findOrfail($id);
        if ($role->hasPermissionTo($request->permission)) {

            return back()->with('message','Permission Already exist')
            ->with('icon','error');
        }
        $role->givePermissionTo($request->permission);

        return back()->with('message','Permission Assigned Succesfully')
        ->with('icon','success');

    }
    public function revoke (Role $role, Permission $permission)

    {
      if ($role->hasPermissionTo($permission)) {
        $role->revokePermissionTo($permission);
        return back()->with('message','Permission Revoked  Succesfully')
        ->with('icon','success');


      }
      return back()->with('message','Permission Not  exist')
      ->with('icon','error');



    }
}
