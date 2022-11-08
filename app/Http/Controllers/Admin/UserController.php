<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index ()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }
    public function show (User $user)
    {
        $roles = Role::all();
        return view('admin.user.show',compact('user','roles'));
    }



    public function roles (Request $request,User $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with('message','Role  Already exist')
            ->with('icon','warning');
        }
        $user->assignRole($request->role);
        return back()->with('message','Role Assigned Succesfully ')
        ->with('icon','success');

    }
    public function revokeRoles (User $user,Role $role)
    {
        if ($user->hasRole($role)) {

            $user->removeRole($role);
            return back()->with('message','Role Removed Succesfully ');

        }
        return back()->with('message','Role Not Found  ')
        ->with('icon','error');


    }
    public function destroy(User $user)
    {
        if ($user->hasRole(['admin','super admin'])) {
            return back()->with('message','You are Admin ')
            ->with('icon','warning');

        }
        $user->delete();
        return back()->with('message','User Removed Succesfully ')
                    ->with('icon','success');


    }


}
