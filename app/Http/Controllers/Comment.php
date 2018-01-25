<?php

namespace blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use blog\Models\Comment as CMT;
class Comment extends Controller
{
	//删除评论
	public function delComment(Request $request){
		
		if(!Session::get('userid')){
			return redirect('/login');
		}
		$where=[];
		$where['uid']=Session::get('userid');
		$where['id']=$request->id;
		if(CMT::delComment($where))
			return '删除成功！';
		else
			return '删除失败！';
	}
	//发表评论
	public function addcomment(Request $request){
		$where=[];
		if($request->isMethod('POST')){
			$comment=[];
			if(!Session::get('userid')){
				return redirect('/login');
			}
			$comment['aid']=$request->aid;
			$comment['comment']=$request->comment;
			$comment['uid']=Session::get('userid');
			$comment['username']=Session::get('login_name');
			$comment['createtime']=time();
			if(CMT::addcomment($comment))
				return '评论成功！';
			else
				return '评论失败！';
		}
	}
	//发表评论
	public function addreply(Request $request){
		$where=[];
			$reply=[];
			if(!Session::get('userid')){
				return redirect('/login');
			}
			$reply['pid']=$request->pid;
			$reply['aid']=$request->aid;
			$reply['comment']=$request->comment;
			$reply['uid']=Session::get('userid');
			$reply['username']=Session::get('login_name');
			$reply['touid']=$request->uid;
			$reply['tousername']=$request->username;
			$reply['createtime']=time();
			if(CMT::addcomment($reply))
				return '评论成功！';
			else
				return '评论失败！';
	}
}
