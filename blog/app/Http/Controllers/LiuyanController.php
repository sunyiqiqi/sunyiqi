<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Request;
use Validator;
use Response;

class LiuyanController extends Controller{
	public function liuyan(){
		$u_id=1;
		session_start();
		$_SESSION['u_id']=$u_id;
		$users = DB::table('liuyan')->where("u_id",$u_id)->orderBy('l_id','desc')->paginate(3);
		  return view('liuyan.liuyan', ['arr' => $users]);
		/*$arr=DB::table("liuyan")->where("u_id",$u_id)->orderBy('l_id','desc')->get();
		 //每页显示条数
		 $size=3;
		 //接受当前页码
		 $page=isset($_GET['p'])?$_GET['p']:1;
		 
		//偏移量=(当前页码-1)*每页显示条数
		$limit=($page-1)*$size;
		//求出总页数
		$count=count($arr);
		//页码
		$num=ceil($count/$size);
		$sql1="select * from liuyan where u_id=".$u_id." order by u_id desc limit ".$limit.",".$size;
        $newarr=DB::select($sql1);
		$prve = $page-1<1?1:$page-1;
		$next = $page+1>$num?$num:$page+1;
		$show = "<a href='javascript:void(0)' onclick='ajaxzeal(1)'>首页</a>";
		$show .= "&nbsp;&nbsp;<a href='javascript:void(0)' onclick='ajaxzeal($prve)'>上一页</a>";
		$show .= "&nbsp;&nbsp;<a href='javascript:void(0)' onclick='ajaxzeal($next)'>下一页</a>";
		$show .= "&nbsp;&nbsp;<a href='javascript:void(0)' onclick='ajaxzeal($num)'>尾页</a>";

		return view('liuyan.liuyan',['arr'=>$newarr,"pages"=>$show,"prve"=>$prve,"next"=>$next,"num"=>$num]);*/

	}
	public function content(){
		//$liuyan = Request::post('liuyan');
		//$u_id=Request::post('u_id');
		$liuyan=$_POST['liuyan'];
		$u_id=$_POST['u_id'];
		$sql="insert into liuyan values(null,'"."$liuyan"."',"."$u_id".")";
      $re=DB::insert($sql);
		if($re){
		
		/* $arr=DB::table("liuyan")->where("u_id",$u_id)->orderBy('l_id','desc')->get();
		 //每页显示条数
		 $size=3;
		 //接受当前页码
		 $page=isset($_GET['p'])?$_GET['p']:1;
		//偏移量=(当前页码-1)*每页显示条数
		$limit=($page-1)*$size;
		$sql1="select * from liuyan where u_id=".$u_id." order by u_id desc limit ".$limit.",".$size;
		 $newarr=DB::select($sql1);
        return view("liuyan.contents",["arr"=>$newarr]);*/
		  $users = DB::table('liuyan')->where("u_id",$u_id)->orderBy('l_id','desc')->paginate(3);
		  return view('liuyan.contents', ['arr' => $users]);
		}
	}
	public function del(){
		$l_id=$_GET['l_id'];
		$deleted = DB::delete('delete from liuyan where l_id='.$l_id);
		if($deleted){
			echo 1;
		}else{
			echo 0;
		}
	}
	public function upda(){
		$l_id=$_GET['l_id'];
		$arr=DB::table("liuyan")->where("l_id",$l_id)->first();
		return view('liuyan.upda',["arr"=>$arr]);
	}
	public function xiu(){
		$l_id=$_POST['l_id'];
		$contents=$_POST['contents'];
		$upd = DB::update("update liuyan set  l_contents= ? where l_id = ?", [$contents,$l_id]);
		if($upd){
			echo "<script>alert('修改成功');location.href='/liuyan'</script>";
		}
	}

}
?>