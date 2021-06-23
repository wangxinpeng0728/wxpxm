<template>
<div>
<h1 style="margin-top:-50px;margin-left:-200px">管理员修改</h1>
        <div class="da">
        <div class="xing">
                <div style="position:absolute;top:30px;left:260px">用户名：</div>
                <el-input v-model="user.username" placeholder="请输入用户名" type="text"></el-input>
          </div>
     </div>
     
              <div class="mws-form-row quan" style="" >  
              <div class="mws-form-item small">
              <div style="position:absolute;top:118px;left:260px">权限:</div>
                <select v-model="user.level"  style="width:200px; height:30px; border: 2px solid #dcdfe6; outline: none; background-color: rgba(0, 0, 0, 0); margin-left:100px; outline: none;margin-top:100px">
                 <option value="0">超级管理员</option>
                <option value="1">用户管理员</option>
                <option value="2">漫画管理员</option>
                <option value="3">互动管理员</option>
                </select>   
               
              </div>
            </div>   
           
          <div class="mws-button-row" style="margin-left:-200px;margin-top:-50px">
            <el-button type="primary" @click="editdo()">提交</el-button>
              <el-button type="danger">重置</el-button>
          </div> 
</div>
</template>
<script>
import {adminxiu,adminedit} from '../../../request/api.js'
export default {
   name:"App",
     data(){
     return{
      user:{
        username:"",
        level:"",
        status:"",
      },
       k:"",
       id:"", 
   }
  },
  methods:{

 editdo(){
       adminedit(this.user).then(res=>{
       if (res.code == 200){
       this.$router.push("/admin");
        alert ("修改成功");
       } else{
         alert ("失败");
       }
     })
    }
   },
    created(){
    let id = this.$route.query.id;
    this.id = id;
    //通过id 查询当前的那一条数据 
    adminxiu({id:id}).then(res=>{
        this.user = res;
      })
    },
    
  }


</script>

<style>
.xing{
  height: 100px;
  margin-top: -100px;
  width:300px;
   margin-left: -80px;
}
.mi{
   width:300px;
    margin-top: -10px;
}
.da{
  margin-left: 400px;
}
.zhuang{
  margin-top: 0px;
  margin-left: -310px;
}
.quan{
  margin-left: -220px;
   margin-top: -50px;
}

</style>