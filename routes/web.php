<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//admin-Route
Route::middleware(['auth','role:admin'])->name('admin.')->prefix('admin')->group(function(){

    Route::get('/',[IndexController::class,'index'])->name('index');
    Route::post('/roles/{id}/permissions',[RoleController::class,'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}',[RoleController::class,'revoke'])->name('roles.permissions.revoke');

    Route::resource('roles',RoleController::class);
    Route::resource('permissions',PermissionController::class);
    Route::resource('users',UserController::class);
    Route::post('/users/{user}/roles',[UserController::class,'roles'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}',[UserController::class,'revokeRoles'])->name('users.revokeRoles');

});


require __DIR__.'/auth.php';
