<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\admin\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});

Auth::routes(['verify'=>true]);
Route::middleware('auth')->group(function(){//Route::middleware('verified')->group(function(){
   Route::get('/user/profile',[ProfileController::class ,'index'])->name('profle.user');
});

Route::middleware(['auth','role:admin'])->name('admin')->prefix('admin')->group(function(){
Route::get('/',[AdminController::class,'index'])->name('index');
Route::post('/user/show/{id}',[AdminController::class,'showUser']);
Route::post('/user/{id}/role',[AdminController::class,'addRole']);
Route::post('/user/{id}/permission',[AdminController::class,'addPermisiion']);
Route::delete('/user/role/destroy/{user}/{role}',[AdminController::class,'delete']);

Route::resource('/roles',RoleController::class);
Route::get('/roles/{id}/destroy',[RoleController::class,'destroy']);
Route::post('/roles/{role}/permissions',[RoleController::class,'givePermission'])->name('admin.roles.permissions');
Route::delete('/roles/permissions/revoke/{role}/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
Route::get('/permissions/{id}/destroy',[PermissionController::class,'destroy']);

Route::resource('/permissions',PermissionController::class);
Route::post('/permissions/roles/{permission}',[PermissionController::class,'assignRole']);
Route::delete('/permissions/roles/remove/{permission}/{role}/',[PermissionController::class,'removeRole']);

});
//Route::get('/home', [HomeController::class, 'index'])->name('home');

///Route::get('/staff', function () { return view('staff') ;})->middleware((['auth','staff']))->name('staff');
//Route::get('/home', function () { return view('customer') ;})->middleware((['auth','customer']))->name('dashborad');
//Route::get('/admin', function () { return view('admin') ;})->middleware((['auth','admin']))->name('admin');


//Route::get('permissions/{id}/delete',[PermissionController::class,'destroy']);
