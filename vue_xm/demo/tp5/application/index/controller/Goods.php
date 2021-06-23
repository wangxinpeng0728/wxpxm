<?php
namespace app\index\controller;
use think\Controller;
use think\DB;
use think\Request;

class Goods extends Controller
{
    public function getmanhua(Request $request)
	{
			$page = $request->only(['search']);
			$row = DB::table('comic')->field('id,cname,FROM_UNIXTIME(time," %Y-%m-%d") as time,likes')->where("cname","like","%{$page['search']}%")->select();
			// 一共多少页
			 $c = DB::table("comic")->where("cname","like","%{$page['search']}%")->count();
			 $arr = array("item"=>$row,"total"=>$c);
			 echo json_encode($arr);
		
	}
    //漫画删除
    public function getmanhuadel(Request $request)
    {
        $id = $request->param("id");
        $res = DB::table("comic")->where("id",$id)->delete();
        if ($res) {
            //添加成功
            echo '{"code":"200","msg":"删除成功","id":"'.$res.'"}';
        } else {
            echo '{"code":"100","msg":"删除失败","id":"没有"}';
        }
    }
    
    public function postLogin(Request $request)
    {
        $post = $request->except(['action']);
        $post['password'] = md5($post['password']);
        $row = DB::table("admin")->where("username",$post['username'])->field('id,username,level')->where("password",$post['password'])->find();
        echo json_encode($row);
    }
    //获取登录等级
    public function getlevel(Request $request)
    {
        $post = $request->except(['action']);
        $row = DB::table("admin")->where("username",$post['username'])->find();
        echo json_encode($row);
    }
    //查询所有类别
    public function getType(Request $request)
    {
        $row = DB::table("type")->where('daxiao','eq','0')->select();
        echo json_encode($row);
    }


    //商品添加
    public function postAdd(Request $request)
    {
     $post = $request->except(['action']);
     $post['time'] = time();
     //文件上传
     // 获取表单上传文件 例如上传了001.jpg
     $file = request()->file('pic');
     // 移动到框架应用根目录/uploads/ 目录下
     $info = $file->move( './uploads');
     if($info){
        
         // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
         $pic = "http://www.tp55.com/uploads/".$info->getSaveName();
         $pic = str_replace("/",'\\',$pic);
         $post['pic'] = $pic;
 
     }else{
         // 上传失败获取错误信息
         echo $file->getError();
     }
 
     $res = DB::table("goods")->insert($post);
     if ($res) {
         echo '{"code":"200","msg":"添加成功"}';
     } else {
         echo '{"code":"100","msg":"添加失败"}';
     }
 
  
    }
    public function getOne(Request $request)
    {
     $id = $request->param('id');
     $row = DB::table("goods")->find($id);
     echo json_encode($row);
    }
 
    //修改商品信息
    public function postEdit(Request $request)
    {
     $post = $request->except(['action']);
 
     //文件上传
     // 获取表单上传文件 例如上传了001.jpg
     $file = request()->file('pic');
     if ($file){
         // 移动到框架应用根目录/uploads/ 目录下
         $info = $file->move( './uploads');
         if($info){
            
             // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
             $pic = "http://www.tp55.com/uploads/".$info->getSaveName();
             $pic = str_replace("/",'\\',$pic);
             $post['pic'] = $pic;
 
         }else{
             // 上传失败获取错误信息
             echo $file->getError();
         }
     }
 
     //执行修改
     $res = DB::table("goods")->update($post);
      if ($res) {
         echo '{"code":"200","msg":"修改成功"}';
     } else {
         echo '{"code":"100","msg":"修改失败"}';
     }
 
    }
    //类别添加
    public function getTypeadd(Request $request)
	{
        $post = $request->only(['pid','tname']);
        $post['time'] = time();
        if($post['pid'] == 0){
            //顶级
            $post['path'] = '0,';
        } else{
            //如果不是顶级分类，先根据子类别的pid，查询表里id和pid相等的，这就是他的父类，把它父类的path取出来，把pid拼在一起
            $die = DB::table('type')->where('id',$post['pid'])->find();
            $post['path'] = $die['path'].$die['id'].',';
        }

      
        $res = DB::table('type')->insert($post);
		if ($res) {
    		//添加成功
    		echo '{"code":"200","msg":"添加成功","id":"'.$res.'"}';
    	} else {
    		echo '{"code":"100","msg":"添加失败","id":"没有"}';
    	}
	}
    //用户地址
    public function getOnes(Request $request)
    {
     $id = $request->param('id');
     $row = DB::table("user_add")->where('uid',$id)->select();
     echo json_encode($row);
    }
     //用户详情
     public function getOness(Request $request)
     {
      $id = $request->param('id');
      $row = DB::table("user_info")->where('uid',$id)->select();
      echo json_encode($row);
     
 }
 public function getDingshow(Request $request)
 {
     {
        $page = $request->only(['page','search']);
        $p = 2;   //每页显示多少条
        //echo $page['page'];
        //die();
        $limit = ($page['page']-1)*$p;
         $row = DB::table("order")->where("onum like '%{$page['search']}%' ")->limit($limit,$p)->select();
         foreach ($row as $k=>$v) {
             $row[$k]['time'] = date("Y-m-d",$v['time']);
         }
         $rowt = DB::table("order")->where("onum like '%{$page['search']}%' ")->count();
         $totalp = ceil($rowt/$p);
         $arr = array("list"=>$row,"total"=>$totalp);
         echo json_encode($arr);
        }
 }
 /////////
 //评论
 public function getplshow(Request $request)
 {
     {
         $row = DB::table("replay")->select();
         foreach ($row as $k=>$v) {
             $row[$k]['time'] = date("Y-m-d",$v['time']);
         }
         $c = DB::table("replay")->count();
         $arr = array("list"=>$row,"total"=>$c);
         echo json_encode($arr);
        }
 }
 public function getplstatus(Request $request)


	{
	 $get = $request->except(['action']);
	 $res = DB::table("replay")->update($get);
	 if ($res) {
		 echo '{"code":"200","msg":"修改成功"}';
	 } else {
		 echo '{"code":"100","msg":"修改失败"}';
	 }
	}
    public function getPldel(Request $request)
	{
	    $id = $request->param("id");
		$res = DB::table("replay")->where("id",$id)->delete();
		if ($res) {
    		//添加成功
    		echo '{"code":"200","msg":"删除成功","id":"'.$res.'"}';
    	} else {
    		echo '{"code":"100","msg":"删除失败","id":"没有"}';
    	}
	}
    //评论完
    //收藏
    public function getScshow(Request $request)
    {
        {
         
            $row = DB::table("user_comic")->select();
            foreach ($row as $k=>$v) {
                $row[$k]['time'] = date("Y-m-d",$v['time']);
            }
            $c = DB::table("user_comic")->count();
            $arr = array("list"=>$row,"total"=>$c);
            echo json_encode($arr);
           }
    }
    public function getScstatus(Request $request)
   
       {
        $get = $request->except(['action']);
        $res = DB::table("user_comic")->update($get);
        if ($res) {
            echo '{"code":"200","msg":"修改成功"}';
        } else {
            echo '{"code":"100","msg":"修改失败"}';
        }
       }
    public function getScdel(Request $request)
       {
           $id = $request->param("id");
           $res = DB::table("user_comic")->where("id",$id)->delete();
           if ($res) {
               //添加成功
               echo '{"code":"200","msg":"删除成功","id":"'.$res.'"}';
           } else {
               echo '{"code":"100","msg":"删除失败","id":"没有"}';
           }
       }
    //收藏完
 public function getDstatus(Request $request)

	{
	 $get = $request->except(['action']);
	 $res = DB::table("order")->update($get);
	 if ($res) {
		 echo '{"code":"200","msg":"修改成功"}';
	 } else {
		 echo '{"code":"100","msg":"修改失败"}';
	 }
	}
    public function getTypezishow(Request $request)
	{
        $id = $request->param('id');
		$row = DB::table('type')->where('pid',$id)->select();
		echo json_encode($row);

	}
    public function getTypezishows(Request $request)
	{
        $id = $request->param('id');
		$row = DB::table('type')->where('pid',$id)->select();
		echo json_encode($row);

	}
    public function getTypezishowx(Request $request)
	{
        $id = $request->param('id');

        $row = DB::table('type')->where('pid',$id)->select();

      
		echo json_encode($row);
	}
    //删除子类别
    public function getTypedels(Request $request)
	{
	    $id = $request->param("id");
		$res = DB::table("type")->where("id",$id)->delete();
		if ($res) {
    		//添加成功
    		echo '{"code":"200","msg":"删除成功","id":"'.$res.'"}';
    	} else {
    		echo '{"code":"100","msg":"删除失败","id":"没有"}';
    	}
	}
    public function getTypexiu(Request $request)
    {
     $id = $request->param('id');
     $row = DB::table("type")->find($id);
     echo json_encode($row);
    }
    //处理类别修改
    public function getTypeedit(Request $request)
	{
	    $get = $request->except(['action']);
		$res = DB::table("type")->update($get);
		if ($res) {
    		//添加成功
    		echo '{"code":"200","msg":"修改成功","id":"'.$res.'"}';
    	} else {
    		echo '{"code":"100","msg":"修改失败","id":"没有"}';
    	}
	}
    //获取修改管理员的状态
    public function getAdminxiu(Request $request)
    {
     $id = $request->param('id');
     $row = DB::table("admin")->find($id);
     echo json_encode($row);
    }
    //修改管理员状态
    public function getAdminedit(Request $request)
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
    //回收站展示信息
    public function getGoodshui(Request $request)
	{
        $row = DB::table("goods")->order("id desc")->where("zhuangtai",'0')->select();
        foreach ($row as $k=>$v) {
            $row[$k]['time'] = date("Y-m-d",$v['time']);
        }
    
        echo json_encode($row);
	}
    //加入回收站
    public function getEdithui(Request $request)
	{
	    $get = $request->except(['action']);
		$res = DB::table("goods")->update($get);
		if ($res) {
    		//添加成功
    		echo '{"code":"200","msg":"修改成功","id":"'.$res.'"}';
    	} else {
    		echo '{"code":"100","msg":"修改失败","id":"没有"}';
    	}
	}
    //回收站
    public function getEditbian(Request $request)
	{
	    $get = $request->except(['action']);
		$res = DB::table("goods")->update($get);
		if ($res) {
    		//添加成功
    		echo '{"code":"200","msg":"修改成功","id":"'.$res.'"}';
    	} else {
    		echo '{"code":"100","msg":"修改失败","id":"没有"}';
    	}
	}
 
}
