<?php

namespace blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class SysUser extends Model
{
    protected $table = 'sys_user';
    //protected $guarded = ['id'];
    //protected $hidden = ['password'];
    //protected $fillable = ['id','login_name','password','name','email','phone','mobile','login_ip','login_date','login_flag','user_type','photo','create_time','update_time','status','unit_price','balance'];
    protected $primaryKey = '';
    public $timestamps = false;
	public static function getAll(){
		return SysUser::select(DB::Raw('sys_user.id,login_name,sys_user.name as username,sys_role.name as rolename,phone,email,status'))->leftJoin('sys_user_role','sys_user_role.user_id','=','sys_user.id')->leftJoin('sys_role','sys_role.id','=','sys_user_role.role_id')->get();
	}
	public static function getById($id){
		return SysUser::where('id',$id)->first();
	}
	public static function delById($id){
		return SysUser::where('id',$id)->delete();
	}
	public static function xgmm($id,$pwd){
		return SysUser::where('id',$id)->update(['password'=>md5($pwd.config('iqiyi.md5key','Iqiyi'))]);
	}
	public static function addUser($request){
			return SysUser::insertGetId(['login_name'=>$request->login_name,'password'=>md5($request->pwd),'name'=>$request->name,'email'=>$request->email,'phone'=>$request->phone,'create_time'=>time()]);
		
	}
}
