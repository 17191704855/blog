<?php

namespace blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Article extends Model
{
    protected $table = 'f_article';
    //protected $guarded = ['id'];
    //protected $hidden = ['password'];
    //protected $fillable = ['id','login_name','password','name','email','phone','mobile','login_ip','login_date','login_flag','user_type','photo','create_time','update_time','status','unit_price','balance'];
    protected $primaryKey = '';
    public $timestamps = false;
	public static function getArticle($where){
		return Article::select(DB::Raw('f_article.*,name'))->leftjoin('sys_user','sys_user.id','=','user_id')->where($where)->paginate(10);
	}
	public static function getArticleById($id){
		return Article::select(DB::Raw('f_article.*,name'))->leftjoin('sys_user','sys_user.id','=','user_id')->where('f_article.id',$id)->first();
	}
}
