<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function index ()
    {
        $permissions = Permission::all();
        return view('admin.permission.index',compact('permissions'));
    }

    public function create()
    {
        return view('admin.permission.create');
    }
    public function store (Request $request)
    {
        $this->validate($request,
        [
            "name"=>"required|min:3"
        ]);

        Permission::create([
            "name"=>$request->name
        ]);
        return to_route('admin.permissions.index')->with("message","Permission Created successfully")
        ->with('icon','success');
    }
    public function edit ($id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.permission.edit',compact('permission'));
    }
    public function update(Request $request,$id)
    {
        $attrib = $this->validate($request,[
         "name"=>'required|min:3'
        ]);

        $permission = Permission::findOrfail($id);
        $permission->update($attrib);

        return to_route('admin.permissions.index')->with("message","Permission Updated successfully")
        ->with('icon','success');


    }

    public function destroy ($id)
    {
        $permission = Permission::findOrfail($id);
        $permission->delete();
        return to_route('admin.permissions.index')->with("message","Permission Deleted successfully")
        ->with('icon','success');
    }
}
