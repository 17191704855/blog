<?php

namespace blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use blog\Models\Article as ATC;
use blog\Models\Comment as CMT;
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
			'arttype'=>ATC::$arttype,
		]);
   }
   //帖子详情
	public function detail(Request $request){
		$where=[];
		if($request->id){
			$result=ATC::getArticleById($request->id);
			$comment=CMT::getCommentById($request->id);
			foreach($comment as $k=>$v){
				//dd(CMT::getSecondCommentById($request->id,$v->id)[0]->id);
				$comment[$k]->secondcomment=CMT::getSecondCommentById($request->id,$v->id);
			}
			return view('Article/detail',[
			'result'=>$result,
			'comment'=>$comment,
			'id'=>$request->id,
		]);
		}else{
			return '未选择文章!';
		}
	}
	//发表帖子
	public function publish(Request $request){
		$where=[];
		if($request->isMethod('POST')){
			$article=[];
			if(!Session::get('userid')){
				return redirect('/login');
			}
			$article['user_id']=Session::get('userid');
			$article['sid']=$request->sid;
			$article['title']=$request->title;
			$article['content']=$request->content;
			$article['createtime']=time();
			if(ATC::addArticle($article))
				return '文章发表成功！';
			else
				return '文章发表失败！';
		}
		return view('Article/publish',[
			'arttype'=>ATC::$arttype,
		]);
	}
	//帖子管理	
	public function management(Request $request){
		if(!Session::get('userid')){
			return redirect('/login');
		}
		$where=[];
		$where['user_id']=Session::get('userid');
		$list=ATC::getArticle($where);
		return view('Article/management',[
			'list'=>$list,
			'arttype'=>ATC::$arttype,
		]);
	}
	//删除帖子
	public function delArticle(Request $request){
		if(!Session::get('userid')){
			return redirect('/login');
		}
		$where=[];
		$where['user_id']=Session::get('userid');
		$where['id']=$request->id;
		if(ATC::delArticle($where))
			return '删除成功！';
		else
			return '删除失败！';
	}
	//编辑帖子
	public function edit(Request $request){
		$where=[];
		if($request->id){
			$result=ATC::getArticleById($request->id);
		}
		if($request->isMethod('POST')){
			if(!Session::get('userid')){
				return redirect('/login');
			}
			if(!$request->id){
				return '未选择帖子！';
			}
			ATC::updateArticle($request);
			return redirect('/article/management');
		}
		return view('Article/edit',[
			'id'=>$request->id,
			'result'=>$result,
			'arttype'=>ATC::$arttype,
		]);
	}
	//修改帖子
	public function updateArticle(Request $request){
		$where=[];
		
	}
}
