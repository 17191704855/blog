<?php

namespace blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use blog\Models\Article as ATC;
class Article extends Controller
{
	//论坛主页
   public function lists(Request $request){
		$where=[];
		if($request->sid){
			$where['sid']=$request->sid;
		}
		$list=ATC::getArticle($where);
		return view('Article/lists',[
			'list'=>$list,
		]);
   }
	public function detail(Request $request){
		$where=[];
		if($request->id){
			$result=ATC::getArticleById($request->id);
			return view('Article/detail',[
			'result'=>$result,
		]);
		}else{
			return '未选择文章!';
		}
	}    
}
