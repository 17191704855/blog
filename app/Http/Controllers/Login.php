<?php

namespace blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use blog\Models\SysUser;
class Login extends Controller
{
	//登录
   public function index(Request $request){
		if($request->isMethod('POST')){
			$password = md5($request->pwd);
			$users = SysUser::where(['login_name'=>$request->username,'password'=>$password])->first();
			if(!$users){
				$error='用户不存在！';
				return view('login',['error'=>$error]);
			}
			if($users['login_flag']==0){
				$error='用户不可登录，请联系管理员';
				return view('login',['error'=>$error]);
			}
			Session::put('userid',$users['id']);
			Session::put('login_name',$users['login_name']);
			return redirect('/main');
		}
		return view('login');
   } 
   //注册
   public function regist(Request $request){
		if($request->isMethod('POST')){
			SysUser::addUser($request);
			return redirect('/');
		}
		return view('regist');
   } 
}
