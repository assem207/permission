<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\User;
use Spatie\Permission\Models\Role ;
use App\Models\User;
use Spatie\Permission\Models\permission ;
class AdminController extends Controller
{
  public function index(){
      
    $users = User::all();
     return view('admin.index',compact('users'));
   }
   public function  destroy($id){
     $user = User::findOrfail($id);
     $users->delete();
     return redirect()->with('success','user deleted successuffly');
   }
   public function showUser( $id){
   $user = User::findOrfail($id);

    $role =  Role::findOrfail($user->role);
    $roles =  Role::all();
    $permissions =  permission::all();
   //dd( $permissions);
    return view('admin.user.role',compact('user','role','roles','permissions'));
   }
   public function addRole($id ,Request $request){
 $user= User::findOrfail($id);
 $role= Role::where('name','=',$request->role)->first() ;
 $user->role = $role->id;

//dd($role->id);
 $user->save();
 return redirect('admin')->with('message','role ubdated successufully');
   }
   public function addPermisiion($id ,Request $request){
    //dd($request->permission);
    $user= User::findOrfail($id);
    $user->givePermissionTo($request->permission);
    return redirect('/admin')->with('message','permission added successufully');
   }
   
   public function delete($userid,$roleid){
//Auth::User()->$useridhasRole( $role )) Auth::user()->hasRole($role)
///$user->hasRole('writer')
      $user= User::where('id','=',$userid)->first();
      $role =  Role::findOrfail($roleid);
     // Role::findByName($role);
   //dd(  $user->removeRole($role));
   //$role = Role::findByName($role)
   //$user->removeRole($role);
   //$user->syncRoles(['writer', 'admin']);// ستتم إزالة جميع الأدوار الحالية من المستخدم واستبدالها بالمصفوفة المحددة
   dd( Role::findByName($role->name));
   if($user->hasRole($role))
   {
    echo "yes";
   }
   $user->removeRole($role);
   $user->role =null;
   $user->update([
    'role'=>  $user->role , ]);
   return back()->with('message','role deleted successufully');
   
   //if($user->hasRole($role->name ))
//{
    //$user->removeRole($role);
//return back()->with('message','role sleted successufully');
  // }
      //   dd($role);
}
}
