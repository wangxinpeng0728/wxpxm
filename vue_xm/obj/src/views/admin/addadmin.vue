<template>
<div> 
       <h1 style="margin-top:-50px;margin-left:-200px">管理员添加</h1>
        <div class="da">
        <div class="xing">
                <div style="position:absolute;top:30px;left:270px">用户名：</div>
                <el-input v-model="user.username" placeholder="请输入用户名" type="text"></el-input><!--<span :style="{color:b}">{{yprice}}</span><-->
          </div>
          <div class="mi">
            <div style="position:absolute;top:120px;left:280px">密码：</div>
              <el-input placeholder="请输入密码" v-model="user.password" show-password class="bb"></el-input><!--<span :style="{color:c}">{{mprice}}</span><br/><-->
        </div>
     </div>

  <div class="zhuang">
      <label>状态:</label>
       <el-radio v-model="user.status" label="1" border>正常</el-radio>
       <el-radio v-model="user.status" label="2" border>禁用</el-radio>
  
  </div>
              <div class="mws-form-row quan" style="" >
              
              <div class="mws-form-item small">
              <div style="position:absolute;top:240px;left:280px">权限:</div>
                <select v-model="user.level" id="" name="" style="width:200px; height:30px; border: 2px solid #dcdfe6; outline: none; background-color: rgba(0, 0, 0, 0);" outline: none>
                 <option value="0">超级管理员</option>
                <option value="1">用户管理员</option>
                <option value="2">漫画管理员</option>
                <option value="3">互动管理员</option>
                </select>
              
              </div>
            </div>    
 
        
          <div class="mws-button-row" style="margin-left:-100px;margin-top:-50px">
        
            <el-button type="primary" @click="adddo()">提交</el-button>
              <el-button type="danger">重置</el-button>
          </div> 
          
      </div>
 

</template>

<script>
import {useradd,userajax} from '../../../request/api.js'
  export default {
     data(){
     return{
         user:{
           username:"",
           password:"",
           status:"",
           level:"",
    
       },     
       mprice:"", 
       c:"",
         yprice:"", 
       b:""
   }
  },
  methods:{ 
     adddo(){ 
      if (this.user.username != ""  && this.user.password != ""  && this.user.level != "") {
      useradd(this.user).then(res=>{
         if (res.code == "200") {
          alert("添加成功")
          this.$router.push({path: '/admin'});
        }
      })
        } else {
          alert("请将信息填写完成");
        }
     
    },
      shi(){
            //表单验证
            let p = /^[0-9]*$/;
            if (!p.test(this.user.password)) {
                this.mprice = "价格请输入纯数字";
                this.c = "red"
                return false;
            } else {
                this.mprice="成功"
                this.c = "green"
                return true;
            }
      },
       shis(){
           userajax({username:this.user.username}).then(res=>{
             console.log(res)
               if (res == '1') {
                 this.yprice = "用户名重复";
                this.b = "red"
                return false;
              } else {
                this.yprice="成功"
                this.b = "green"
                return true;
              }
           })
          
      },
      
  },
}


</script>

<style>
.xing{
  height: 100px;
  margin-top: -100px;
  width:300px;
  margin-left: -50px;
}
.mi{
   width:300px;
    margin-top: -10px;
     margin-left: -50px;
}
.da{
  margin-left: 400px;
}
.zhuang{
  margin-top: -100px;
  margin-left: -80px;
}
.quan{
  margin-left: -65px;
   margin-top: -100px;
}
</style>