<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function index(){
        $role = Auth::user()->utype;

        if($role == 'ADM')
        {
            return view('admin.article.create');
        } else {
            return view('dashboard');
        }
    }

    function login(){
        return view('admin.login');
    }

    function submit_login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $userCheck = Admin::where(['username' => $request->username, 'password' => $request->password])->count();
        if($userCheck > 0){
            return redirect('admin/article/create');
        } else {
            return redirect('admin/login')->with('error', 'invalid username/password!!');
        }
    }

    function dashboard(){
        return view('admin.dashboard.index');
    }
}
