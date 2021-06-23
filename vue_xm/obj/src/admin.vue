<template>
  <div>
    <el-container>
  <el-header style="height:75px; background:#ffe1e6">
      <img src="./assets/logo-kmh.png" alt=""  style="width:200px; height:50px;margin-left:-20px;margin-top:0px"/><b style="margin-top:30px;"></b>
      <el-link style="margin-left:900px;background:#409eff;border-radius:10px;width:100px;height:30px;opacity:0.7;z-index:1">
        <i class="el-icon-user-solid"><span style="color:#333333;z-index:100">{{username}}</span>
                      </i>    
                      <br/>
                     
      </el-link>
   
  <a href="javascript:void(0)" @click="xiao()" style=" text-decoration:none; color:#409eff; margin-left:10px;margin-top:30px">退出</a>

              
             <el-dropdown trigger="click" style="margin-left:15px;color:#409eff;font-size:12px;margin-top:10px">
  <span class="el-dropdown-link">
    点我查看<i class="el-icon-caret-bottom el-icon--right"></i>
  </span>
  <el-dropdown-menu slot="dropdown">
    <el-dropdown-item class="clearfix">
      评论
      <el-badge class="mark" :value="12" />
    </el-dropdown-item>
    <el-dropdown-item class="clearfix">
      回复
      <el-badge class="mark" :value="3" />
    </el-dropdown-item>
  </el-dropdown-menu>
</el-dropdown>
     <el-badge :value="2" class="item" style="margin-left:10px;margin-top:-5px">
             <a href="#" style=" text-decoration:none; color:#409eff;margin-left:10px ">帮助</a> 
             </el-badge>
                <el-badge :value="5" class="item" style="margin-top:-5px">
             <a href="#" style=" text-decoration:none; color:#409eff; margin-left:10px">关于</a>   
             </el-badge>  
  </el-header>
  <el-container>
    <el-aside width="200px;">
         <el-aside width="200px" style="background-color: #fff4f4;height:900px" class="aa">
    <el-menu :default-openeds="['1', '5']" style="background:#fff8f8;width:200px">
        <div class="abc">
              <el-link icon="el-icon-s-home" type="primary" class="yy">   <router-link to="/" style="text-decoration:none;color:#409eff">首页</router-link></el-link>&nbsp;
        
          <!-- <el-link type="primary"> <router-link to="/" style="text-decoration:none;">首页</router-link> </el-link> -->
          </div>
       
      <el-submenu index="1" style="margin-top:-60px;">
        <template slot="title">管理员管理</template>
        <el-menu-item-group>
            
           <el-menu-item index="1-1"><router-link to="/admin" style="text-decoration:none; color:#409eff">管理员管理</router-link></el-menu-item>
          <el-menu-item index="1-1"><router-link to="/addadmin"  style="text-decoration:none; color:#409eff">管理员添加</router-link></el-menu-item>
        </el-menu-item-group>
      </el-submenu>

      <el-submenu index="2">
        <template slot="title">用户管理</template>
        <el-menu-item-group>  
       <el-menu-item index="2-1"><router-link to="/user"  style="text-decoration:none; color:#409eff">用户管理</router-link></el-menu-item>
         
        </el-menu-item-group>

      </el-submenu>
      <el-submenu index="3">
        <template slot="title">类别管理</template>
          <el-menu-item-group>
       <el-menu-item index="3-1"><router-link to="/typeindex"  style="text-decoration:none; color:#409eff">查看类别</router-link></el-menu-item>
          <el-menu-item index="3-1"><router-link to="/typeadd"  style="text-decoration:none; color:#409eff">类别添加</router-link></el-menu-item>
        </el-menu-item-group>
      </el-submenu>
        <el-submenu index="4">
        <template slot="title">漫画管理</template>
        <el-menu-item-group>
        <el-menu-item index="4-1"><router-link to="/manhua"  style="text-decoration:none; color:#409eff">查看漫画</router-link></el-menu-item>
          <el-menu-item index="4-1"><router-link to="/addadmin"  style="text-decoration:none; color:#409eff">漫画添加</router-link></el-menu-item>
        </el-menu-item-group>
      </el-submenu>
        <el-submenu index="5">
        <template slot="title">评论管理</template>
        <el-menu-item-group>
        <el-menu-item index="5-1"><router-link to="/comment"  style="text-decoration:none; color:#409eff">评论查看</router-link></el-menu-item>
        </el-menu-item-group>
      </el-submenu>
      <el-submenu index="6">
        <template slot="title">收藏管理</template>
        <el-menu-item-group>
        <el-menu-item index="5-1"><router-link to="/collection"  style="text-decoration:none; color:#409eff">收藏查看</router-link></el-menu-item>
        </el-menu-item-group>
      </el-submenu>
    </el-menu>
  </el-aside>
    </el-aside>
    <el-container>
      <el-main style="">
           <div id="mws-container" class="clearfix" style="height:490px;">
            <div class="container">
            	 <router-view/>
            </div>            
        </div>
      </el-main>
    </el-container>
  </el-container>
   <el-footer style="background:#ffe1e6">
      技术支持:欣鹏科技有限公司
   </el-footer>
</el-container>
  </div>
</template>
<script>
import {getlevel} from "../request/api.js"
export default {
     data(){
        return { 
            imgUrl1:require("./assets/images/mws-logo.png"),
            imgUrl2:require("./assets/example/profile.jpg"),
            shouxian:false,
            yongxian:false,
            liexian:false,
            shangxian:false,
            dingxian:false,
            xinxian:false,
            dingdans:false,
            username:localStorage.getItem("username"),
            level:"",
            //管理员权限
            guan:false,
            yongs:false,
            lei:false,
            shangs:false,
            xins:false,
            huai:false

           
        }
    },
    methods:{
         xiao(){
            localStorage.removeItem("username")
            this.$router.push("/login");
        }
    },
    
    created(){
         
    // getuser().then(res=>{
    //   console.log(res)
    //   this.list = res.item;
    //   this.total = res.total;
    // })
  }

}
</script>

<style>
  .el-header, .el-footer {
    background-color: #B3C0D1;
    color: #333;
    text-align: center;
    line-height: 60px;
  }
  
  .el-aside {
    background-color: #D3DCE6;
    color: #333;
    text-align: center;
    line-height: 200px;
  }
  
  .el-main {
    background-color: #E9EEF3;
    color: #333;
    text-align: center;
    line-height: 160px;
  }
  
  body > .el-container {
    margin-bottom: 40px;
  }
  
  .el-container:nth-child(5) .el-aside,
  .el-container:nth-child(6) .el-aside {
    line-height: 260px;
  }
  
  .el-container:nth-child(7) .el-aside {
    line-height: 320px;
  }
  li{
     list-style:none;
    
  }
  router-link{
    text-decoration:none;
  }
  .abc{
      margin-top: -50px;
      
  }
.el-menu-item{
    font-size: 12px;
} 

</style>