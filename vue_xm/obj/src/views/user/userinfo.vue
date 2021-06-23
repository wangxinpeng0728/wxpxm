<template>
<div>
   <!-- <div class="container">
        <div class="mws-panel grid_8">
            <h3>个人信息</h3>
            <div style="width: 300px; color: black; background-color: rgb(236, 236, 230); height: 500px; overflow: hidden; float: left;">
           <p style="margin-left: 30px; margin-top: 10px;"><h6>头像:</h6>
           <div style="width: 100px; height: 100px; margin-left: 100px; border-radius: 50px;">
           <img src="../../assets/example/cyan_hawk.jpg" width="50" height='50' alt="">
        </div>
        <div v-for="(v,k) in list" :key="v.id" :tt="k">
           <p style="margin-left: 30px; margin-top: 10px;"><h6>真实姓名:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{v.truename}}</h6>
           <p style="margin-left: 30px;"><h6>性别:{{v.sex?'男':"女"}}</h6>
           <p style="margin-left: 30px;"><h6>电话:{{v.phone}}</h6>
           <p style="margin-left: 30px;"><h6>身份证:{{v.idcard}}</h6>  
           </div>
        </div>
            <table class="table" style="width: 700px; margin-top: -50px; border: 1px; background-color: #eee; font-size: 14px; height: 100px; float: right;">
                <caption><h3>收货地址</h3></caption>
                <tr style="background: #c5d52b; margin-top: 5px; text-align: center;">
                    <td style="margin-top: 10px;">收货人</td>
                    <td>电话</td>
                    <td>省份</td>
                    <td>市</td>
                    <td>区</td>
                    <td>详细地址</td>
                    <td>邮编</td>
                </tr>
                <tr class="gradeX" v-for="(v,k) in item" :key="v.id" :tt="k">
                    <td>{{v.name}}</td>
                    <td>{{v.phone}}</td>
                    <td>{{v.sheng}}</td>
                    <td>{{v.shi}}</td>
                    <td>{{v.qu}}</td>
                    <td>
                        {{v.address}}
                    </td>
                    <td>{{v.code}}</td>
                </tr>

                
            </table>
          
        </div>
        
        
    </div> -->
     <h3>用户详情</h3>
      <el-table border  :data="list" style="width: 100%" class="ge">
    <el-table-column prop="id" label="ID" width="120"></el-table-column>
    <el-table-column prop="username" label="用户名" width="120"></el-table-column>
    <el-table-column prop="status" label="状态" width="120"></el-table-column>
    <el-table-column prop="level" label="等级" width="200"></el-table-column>
     <el-table-column prop="time" label="日期" width="150"></el-table-column>
    </el-table>      
</div>
</template>

<script>
import {getOnes,getOness} from '../../../request/api.js'
export default {
      name:"App",
      data(){
      return{
       item:[],
       id:"",
       list:[]
           
   }
  },
    created(){
    let id = this.$route.params.id;
    this.id = id;
     //通过id 查询当前的那一条数据 
    getOnes({id:id}).then(res=>{
       this.item = res;
     }),
    getOness({id:id}).then(res=>{
       this.list = res;
  
     })

  }

}
</script>

<style>
h3{
    margin-left: -1100px;
    margin-top: -50px;
}
.ge{
    margin-top: -50px;
}
</style>