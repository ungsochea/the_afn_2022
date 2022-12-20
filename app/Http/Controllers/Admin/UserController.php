<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginForm(){
        return view('admins.users.login');
    }
    public function login(Request $request){
        if(!$request->ajax()) return abort(500);
        $request->validate([
            'username'  => 'required',
            'password'  => 'required'
        ]);
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(Auth::attempt(array($fieldType => $request->username, 'password' => $request->password,'is_activated' => 1)))
        {
            return response()->json(['redirect' => true, 'success' => true], 200);
        }else{
            //return redirect()->route('login')->with('error','Email-Address And Password Are Wrong.');
            $message = 'Invalid username or password';
            return response()->json(['message' => $message], 500);
        }
        return response()->json($request->all());
    }
    public function logout() {
        Auth::logout();

        return Redirect(url('/'));
    }
}
