<?php

namespace App\Http\Controllers\user;
use Illuminate\Support\Facades\Auth ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
     //   dd(Auth::user()->role);
        return view('user.profile');
    }
}
