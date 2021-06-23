
<template>
<div style="background:#f5f5f5;margin-left:-160px;margin-top:-60px">
     <div id="mws-searchbox" class="mws-inset" style="width: 170px; float: right; background-color: #ffd1d8; margin-top: 5px; height:25px">         
                    <input type="text" class="mws-search-input" name="search" v-model="search"/>
                    <input type="submit" class="mws-search-submit" @click="sou"/>
            </div>
<el-table border  :data="list.slice((page-1)*pnum,page*pnum)"  style="width: 100%;" >
     <el-table-column prop="id" label="ID" width="120"></el-table-column>
     <el-table-column prop="cname" label="漫画名" width="120"></el-table-column>
     <el-table-column prop="likes" label="点赞数" width="150"></el-table-column>
     <el-table-column prop="pingfen" label="评分" width="150"></el-table-column>
     <el-table-column prop="time" label="日期" width="150"></el-table-column>
    <el-table-column label="操作" width="200">
      <template  slot-scope="scope">
             <router-link :to="{}">  <el-button type="danger" icon="el-icon-delete" circle  @click="deleteData(scope.$index,list)"></el-button></router-link>
             <router-link :to="{path:'/adminedit',query:{id:scope.row.id}}" style="margin-left:10px"> <el-button type="primary" icon="el-icon-edit" circle></el-button></router-link>
             <router-link :to="{}">  <el-button type="danger" icon="el-icon-plus" circle  style="margin-left:10px"></el-button></router-link>
      </template>
    </el-table-column>
    </el-table> 
    <el-pagination background :page-sizes='ye' @size-change="qie" layout="total,prev,next,sizes,jumper" :total="total" :page-size="pnum" current-page="page" @current-change="bian" style="height:50px"></el-pagination>
</div>                   
</template>
<script>
import {getmanhua,manhuadel,useredit,aeditStatus,getusers} from '../../../request/api.js'
export default {
   name:"App",
     data(){
     return{
       list:[],
       page:1,//当前页
       total:0,//一共多少条
       pnum:2,//每页显示多少条
       k:"",
       user:{username:"",level:"",id:""},
       id:"",
       search:"",
       ye:[1,2,3],
       p:1
    }
  },
  methods:{
    deleteData(index){
          let id = this.list[index].id;
          manhuadel({id:id}).then(res=>{
             })
          this.list.splice(index, 1);
          alert('删除成功');
    },
    bian(v){
        this.page = v;
    },
    qie(v){
        this.pnum = v;
        this.page=1;
    },
    sou(){ 
       getmanhua({page:this.p,search:this.search}).then(res=>{
          this.list = res.item;
         this.total = res.total;
       })
 },
  
jia(zhi,id,k){
   if(this.list[k].level == "超级管理员"){
    alert('无法对超级管理员进行操作')
    return}else{
      if (zhi == 1) {
        zhi = 0;
      } else {
        zhi = 1;
      }
      //发送到服务器去修改   status   id 
      aeditStatus({id:id,status:zhi}).then(res=>{
        if (res.code == '200') {
          //修改上面的文字
          this.list[k].status = zhi;
        } else {
          alert(res.msg);
          return;
        }
      })
    }
    },
  },
  
 created(){
    getmanhua({page:this.p,search:this.search}).then(res=>{
      console.log(res)
      this.list = res.item;
      this.total = res.total;
    })
  }
}
</script>

<style>

</style>