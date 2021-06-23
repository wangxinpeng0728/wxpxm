<template>
<div>
    <div id="mws-searchbox" class="mws-inset" style="width: 170px; float: right; background-color: #ffd1d8; margin-top: 5px; height:25px">         
                    <input type="text" class="mws-search-input" name="search" v-model="search"/>
                    <input type="submit" class="mws-search-submit" @click="sou"/>
            </div>
    <el-table border  :data="list.slice((page-1)*pnum,page*pnum)" style="width: 100%">
    <el-table-column prop="id" label="ID" width="120"></el-table-column>
    <el-table-column prop="username" label="用户名" width="120"></el-table-column>
    <el-table-column prop="status" label="状态" width="120"></el-table-column>
     <el-table-column prop="time" label="日期" width="150"></el-table-column>
    <el-table-column label="操作" width="200">
      <template>
        <router-link :to="{path:'/userinfo'}"><el-button size="mini" style="border:0px; outline:none; color:#40a9fe">查看详情</el-button></router-link>
        
      </template>
    </el-table-column>
    </el-table>    
     <el-pagination background :page-sizes='ye' @size-change="qie" layout="total,prev,next,sizes,jumper" :total="total" :page-size="pnum" current-page="page" @current-change="bian" style="height:50px"></el-pagination>   
</div>
</template>

<script>
import {usershow,ueditStatus} from '../../../request/api.js'
export default {
      name:"App",
     data(){
     return{
       list:[],
         id:"",
            k:"",
            search:"",
             page:1,//当前页
       total:0,//一共多少条
        pnum:2,//每页显示多少条
          ye:[1,2,3]
         
           
   }
  },
    created(){
    usershow({page:this.p,search:this.search}).then(res=>{
      this.list = res.list;
      this.total = res.total;
    })
  },
  methods:{
      bian(v){

        this.page = v;
    },
    qie(v){
  this.pnum = v;
  this.page=1;
    },
       jia(zhi,id,k){
      if (zhi == 1) {
        zhi = 0;
      } else {
        zhi = 1;
      }
      //发送到服务器去修改   status   id 
      ueditStatus({id:id,status:zhi}).then(res=>{
        if (res.code == '200') {
          //修改上面的文字
          this.list[k].status = zhi;
        } else {
          alert(res.msg);
          return;
        }
      })
    },
      sou(){
      //this.search
       this.p = 1;  //因为每次搜索的时候,必须回到第一页 
       usershow({page:this.p,search:this.search}).then(res=>{
         this.list = res.list;
         this.total = res.total;
       })
     },
     tiao(id){
       this.$router.push("/userinfo/"+id);
     }
  },
  

}
</script>

<style>

</style>