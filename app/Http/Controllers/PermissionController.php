<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\permission ;
use Spatie\Permission\Models\Role ;
class PermissionController extends Controller
{
    public function index(){
      $permissions =  permission::get();
      return view('admin/permission/index',compact('permissions'));
    }
    public function create(){
    
      return view('admin/permission/create');
    }
    public function store(Request $request){
      $request->validate([
           'name'=> ['required','string','unique:permissions,name'],
      ]);

      permission::create([
            'name'=> $request->name ,
      ]);
      return redirect('admin/permissions')->with('success','creared permiision successfully');
    }
    public function edit(permission $permission ,  ){
      $roles = Role::get();
      return view('admin/permission/edit',compact('permission','roles'));
    }
    public function update(Request $request ,permission $permission){
      $request->validate([
        'name'=> ['required','string','unique:permissions,name,'. $permission->id],
   ]);

   $permission->update([
         'name'=> $request->name ,
   ]);
   return redirect('admin/permissions')->with('success','updated permiision successfully');
    }
   
    public function destroy(permission $permission ,$id){

      $permission= permission::findOrfail($id);
      $permission->delete();
      return redirect('admin/permissions')->with('success','deleted permiision successfully');
    }

    public function assignRole(permission $permission ,Request $request){
      //dd($request->role);
      if($permission->hasRole($request->role)){
        return back()->with('message', 'role exists.');
    }
    $permission->assignRole($request->role);
    return back()->with('message', 'role added.');
    }
    public function removeRole(permission $permission ,Role $role){
      if($permission->hasRole($role)){
        $permission->removeRole($role);
        return back()->with('message', 'role revoked');
    }
    return back()->with('message', 'role not exists.');
    }
}
