<?php

namespace blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    protected $table = 'f_comment';
    //protected $guarded = ['id'];
    //protected $hidden = ['password'];
    //protected $fillable = ['id','login_name','password','name','email','phone','mobile','login_ip','login_date','login_flag','user_type','photo','create_time','update_time','status','unit_price','balance'];
    protected $primaryKey = '';
    public $timestamps = false;
	public static function getCommentById($id){
		return Comment::where('aid',$id)->whereNull('pid')->get();
	}
	public static function getSecondCommentById($id,$pid){
		return Comment::where('aid',$id)->where('pid',$pid)->get();
	}
	public static function delComment($where){
		return Comment::where($where)->delete();
	}
	public static function addcomment($reply){
		return Comment::insertGetId($reply);
	}
}
