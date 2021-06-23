<?php
namespace app\index\controller;
use think\Controller;
use think\DB;
use think\Request;

class User extends Controller
{
	//
	public function getIndex(Request $request)
	{
		    // $page = $request->only(['page','search']);
			// $p = 20;   //每页显示多少条
			// $limit = ($page['page']-1)*$p;
		// $page = $request->only(['page','search']);
			// $p = 1;   //每页显示多少条
			// //echo $page['page'];
			// //die();
			// $limit = ($page['page']-1)*$p;
			$page = $request->only(['search']);
			$row = DB::table('admin')->field('id,username,status,level,FROM_UNIXTIME(time," %Y-%m-%d") as time')->select();
			foreach($row as $k=>$v){
            if($v['level'] == 0){
                $d = "超级管理员";
                $row[$k]['level'] = $d;
            }elseif($v['level'] == 1){
                $a = "用户管理员";
                $row[$k]['level'] = $a;
            }elseif($v['level'] == 2){
                $b = "漫画管理员";
                $row[$k]['level'] = $b;
            }elseif($v['level'] == 3){
                $c = "互动管理员";
                $row[$k]['level'] = $c;
            }
			if($v['status'] == 0){
                $x = "启用";
                $row[$k]['status'] = $x;
            }elseif($v['status'] == 1){
                $y = "禁用";
                $row[$k]['status'] = $y;
        }
        }
			// 一共多少页
			 $c = DB::table("admin")->count();
			 $arr = array("item"=>$row,"total"=>$c);
			echo json_encode($arr);
		
	}
	public function getIndexs(Request $request)
	{
		    // $page = $request->only(['page','search']);
			// $p = 20;   //每页显示多少条
			// $limit = ($page['page']-1)*$p;
		// $page = $request->only(['page','search']);
			// $p = 1;   //每页显示多少条
			// //echo $page['page'];
			// //die();
			// $limit = ($page['page']-1)*$p;
			$page = $request->only(['search']);
			
			$row = DB::table('admin')->field('id,username,status,level,FROM_UNIXTIME(time," %Y-%m-%d") as time,pingfen')->where("username","like","%{$page['search']}%")->select();
			foreach($row as $k=>$v){
            if($v['level'] == 0){
                $d = "超级管理员";
                $row[$k]['level'] = $d;
            }elseif($v['level'] == 1){
                $a = "用户管理员";
                $row[$k]['level'] = $a;
            }elseif($v['level'] == 2){
                $b = "漫画管理员";
                $row[$k]['level'] = $b;
            }elseif($v['level'] == 3){
                $c = "互动管理员";
                $row[$k]['level'] = $c;
            }
			if($v['status'] == 0){
                $x = "启用";
                $row[$k]['status'] = $x;
            }elseif($v['status'] == 1){
                $y = "禁用";
                $row[$k]['status'] = $y;
        }
        }
			// 一共多少页
			 $c = DB::table("admin")->where("username","like","%{$page['search']}%")->count();
			 $arr = array("item"=>$row,"total"=>$c);
			echo json_encode($arr);
		
	}
	//
	public function getUsershow(Request $request)
	{
		$page = $request->only(['search']);
		
		    $row = DB::table('user')->field('id,username,status,FROM_UNIXTIME(time," %Y-%m-%d") as time')->where("username","like","%{$page['search']}%")->select();
			foreach($row as $k=>$v){
				if($v['status'] == 0){
					$x = "启用";
					$row[$k]['status'] = $x;
				}elseif($v['status'] == 1){
					$y = "禁用";
					$row[$k]['status'] = $y;
			}
				}
				
		   $c = DB::table("user")->where("username","like","%{$page['search']}%")->count();
		
			$arr = array("list"=>$row,"total"=>$c);
		
			echo json_encode($arr);
		
			//一共多少页
		
	}
    /////////////////////
	public function getInfo(Request $request)
    {
        //接收一下传过来的id
        $id = $request->param('id');

        $row = Db::table('user_info')
        ->alias('info')
        ->join('user_add add','info.uid = add.uid')
        ->field('add.*,add.phone as addphone,add.address as addaddress,add.id as aid,info.*')
        ->where('info.uid',$id)
        ->select();
        //根据传过来的id 查详情表里uid相同的
        // $uinfo = DB::table('user_info')->where('uid',$id)->find();
        
        // //查看收货地址
        // $uadd = DB::table('user_add')->where('uid',$id)->select();
        // return view('user/info',['info'=>$uinfo,'add'=>$uadd]);
        echo json_encode($row);
    }
    ///////////////
	public function getAdd(Request $request)
	{


		$_GET['time'] =  time();

		$_GET['password'] = md5($_GET['password']);

		$res = DB::table('admin')->insertGetId($_GET);

		if ($res) {
    		//添加成功
    		echo '{"code":"200","msg":"添加成功","id":"'.$res.'"}';
    	} else {
    		echo '{"code":"100","msg":"添加失败","id":"没有"}';
    	}
	}
	//接收管理员类别
	 public function getType()
	 {
	   $row = DB::table("admin")->field('level')->select();
	   echo json_encode($row);
	 }
 
	public function getDel(Request $request)
	{
	    $id = $request->param("id");
		$res = DB::table("admin")->where("id",$id)->delete();
		if ($res) {
    		//添加成功
    		echo '{"code":"200","msg":"删除成功","id":"'.$res.'"}';
    	} else {
    		echo '{"code":"100","msg":"删除失败","id":"没有"}';
    	}
	}
	
	public function getEdit(Request $request)
	{
	    $get = $request->except(['action']);
		$res = DB::table("admin")->update($get);
		if ($res) {
    		//添加成功
    		echo '{"code":"200","msg":"修改成功","id":"'.$res.'"}';
    	} else {
    		echo '{"code":"100","msg":"修改失败","id":"没有"}';
    	}
	}

	//类别展示
	public function getTypeindex(Request $request)
	{
	
		$page = $request->only(['search']);
		$row = DB::table('type')->field('id,tname,FROM_UNIXTIME(time," %Y-%m-%d") as time')->where("tname","like","%{$page['search']}%")->select();
			//一共多少页
			$c = DB::table("type")->where("tname","like","%{$page['search']}%")->count();
			$arr = array("list"=>$row,"total"=>$c);
			echo json_encode($arr);
	}

	public function getTypeDel(Request $request)
	{
	    $id = $request->param("id");
		$res = DB::table("type")->where("id",$id)->whereOr('path','like',"%{$id}%")->delete();
		if ($res) {
    		//添加成功
    		echo '{"code":"200","msg":"删除成功","id":"'.$res.'"}';
    	} else {
    		echo '{"code":"100","msg":"删除失败","id":"没有"}';
    	}
	}
		//类别
		public function getTypeadd(Request $request)
		{
			unset($_GET['id']);
			$res = DB::table('type')->insertGetId($_GET);
			if ($res) {
				//添加成功
				echo '{"code":"200","msg":"添加成功","id":"'.$res.'"}';
			} else {
				echo '{"code":"100","msg":"添加失败","id":"没有"}';
			}
		}
		//展示商品
	 public function getGoodsshow(Request $request)
	{
		{
			//分页的核心 limit 跳过多少条,每页显示多少条  (当前页-1)*5,5
			$page = $request->only(['page','search']);
			$p = 4;   //每页显示多少条
			//echo $page['page'];
			//die();
			$limit = ($page['page']-1)*$p;
			$row = DB::table("goods")->where("gname like '%{$page['search']}%' ")->order("id desc")->limit($limit,$p)->where("zhuangtai",'1')->select();
			foreach ($row as $k=>$v) {
				$row[$k]['time'] = date("Y-m-d",$v['time']);
			}
		
			//一共多少页
			$rowt = DB::table("goods")->where("gname like '%{$page['search']}%' ")->count();
			$totalp = ceil($rowt/$p);
		
			$arr = array("list"=>$row,"total"=>$totalp);
		
			echo json_encode($arr);
		   }
	}
	//商品删除
	public function getGoodsDel(Request $request)
	{
	    $id = $request->param("id");
		$res = DB::table("goods")->where("id",$id)->delete();
		if ($res) {
    		//添加成功
    		echo '{"code":"200","msg":"删除成功","id":"'.$res.'"}';
    	} else {
    		echo '{"code":"100","msg":"删除失败","id":"没有"}';
    	}
	}
	//修改状态
	public function getStatus(Request $request)
	{
	 $get = $request->except(['action']);
	 $res = DB::table("goods")->update($get);
	 if ($res) {
		 echo '{"code":"200","msg":"修改成功"}';
	 } else {
		 echo '{"code":"100","msg":"修改失败"}';
	 }
	}
	//修改管理员状态
	public function getStatuss(Request $request)
	{
	 $get = $request->except(['action']);
	 $res = DB::table("admin")->update($get);
	 if ($res) {
		 echo '{"code":"200","msg":"修改成功"}';
	 } else {
		 echo '{"code":"100","msg":"修改失败"}';
	 }
	}
	//修改用户状态
	public function getStatusss(Request $request)
	{
	 $get = $request->except(['action']);
	 $res = DB::table("user")->update($get);
	 if ($res) {
		 echo '{"code":"200","msg":"修改成功"}';
	 } else {
		 echo '{"code":"100","msg":"修改失败"}';
	 }
	}
	//ajax
	public function getUserajax(Request $request)
	{
	 $name = $request->param("username");
	 $res = DB::table('admin')->where('username',$name)->find();
                 if($res){
                     echo 1;
                 }else{
                     echo 0;
                 }
				}
}