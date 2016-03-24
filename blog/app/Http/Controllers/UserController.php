<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use DB;
class UserController extends Controller
{
    /**
     * 为指定用户显示详情
     *
     * @param int $id
     * @return Response
     */
    public function inser()
    {
      $sql="insert into user values(null,'123')";
      DB::insert($sql);
        //$id="1";
        //return view('user.profile', ['user' => User::findOrFail($id)]);
    }
    public function sele(){
        $sql="select * from user";
        $arr=DB::select($sql);
        //dd($arr);
        //print_r($arr);
       
        return view("user.sele",["arr"=>$arr]);
    }
    public function collection(){
        
    }
}
?>
