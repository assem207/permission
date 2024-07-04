<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role ;
use Spatie\Permission\Models\permission ;
use App\Models\User;
class RoleController extends Controller
{
    public function index(){
        $roles =  Role::whereNotIn('name',['admin'])->get();
        //dd( $roles);
        return view('admin/role.index',compact('roles'));
      }
      public function create(){
        $permissions=permission::get() ;
       
        $role =Role::get();
        return view('admin/role/create', compact('role','permissions'));
      }
      public function store(Request $request ,Role $role){
       
        $request->validate([
             'name'=> ['required','string','unique:roles,name'],
             
        ]);
       
       
        Role::create([
              'name'=> $request->name ,
        ]);
        
        return redirect('admin/roles')->with('success','creared role successfully');
      }

      public function edit( Role $role ,User $user){
        
        $permissions=permission::get() ;
        
               
               
        return view('admin/role/edit',compact('role','permissions'));
      }
      public function update(Request $request ,Role $role){
        $request->validate([
          'name'=> ['required','string','unique:roles,name,'. $role->id],
           //   'permission'=>['required','string'],
            ]);
         //   dd($request->permission);
     
      $role->update([
        'name'=> $request->name , ]);
 
      return redirect('admin/roles')->with('success','permission exisits updated role');
    
    
      }
      public function givePermission(Request $request ,Role $role){
        if($role->hasPermissionTo($request->permission)){
          return back()->with('message', 'Permission exists.');
      }
      $role->givePermissionTo($request->permission);
      return back()->with('message', 'Permission added.');
  }
  public function revokePermission(Role $role, Permission $permission)
  {
   // dd($role->hasPermissionTo($permission));
      if($role->hasPermissionTo($permission)){
          $role->revokePermissionTo($permission);
          return back()->with('message', 'Permission revoked');
      }
      return back()->with('message', 'Permission not exists.');
  }
      public function destroy(Role $role,$id){
        $role=Role::findOrfail($id);
     // dd($role);
        $role->delete();
        return redirect('admin/roles')->with('success','deleted role successfully');
      }
}
