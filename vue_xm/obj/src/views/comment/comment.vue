<template>
<div>
<el-table border   :data="list.slice((page-1)*pnum,page*pnum)" style="width: 100%">
    <el-table-column prop="id" label="ID" width="120"></el-table-column>
    <el-table-column prop="uid" label="用户id" width="120"></el-table-column>
    <el-table-column prop="cid" label="评论id" width="120"></el-table-column>
    <el-table-column prop="like" label="点赞" width="200"></el-table-column>
     <el-table-column  prop="time" label="日期" width="150"></el-table-column>
     <el-table-column prop="content" label="详情" width="200"></el-table-column>
    <el-table-column label="操作" width="200">
        <template  slot-scope="scope">
           <router-link :to="{}">  <el-button type="danger" icon="el-icon-delete" circle  @click="deleteData(scope.$index,list)"></el-button></router-link>
      </template>
    </el-table-column>
    </el-table> 
     <el-pagination background :page-sizes='ye' @size-change="qie" layout="total,prev,next,sizes,jumper" :total="total" :page-size="pnum" current-page="page" @current-change="bian" style="height:50px"></el-pagination>          
</div>
</template>


<script>
import {plshow,plStatus,pldel} from '../../../request/api.js'
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
     plshow().then(res=>{
      this.list = res.list;
      this.total = res.total;
  
    })
  },
  methods:{
        jia(zhi,id,k){
        if (zhi == 1) {
            zhi = 0;
        } else {
            zhi = 1;
        }
      //发送到服务器去修改   status   id 
      plStatus({id:id,status:zhi}).then(res=>{
        if (res.code == '200') {
          //修改上面的文字
          this.list[k].status = zhi;
        } else {
          alert(res.msg);
          return;
        }
      })
    },
     deleteData(index){
          let id = this.list[index].id;
          pldel({id:id}).then(res=>{
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
      //this.search
       this.p = 1;  //因为每次搜索的时候,必须回到第一页 
       plshow({page:this.p,search:this.search}).then(res=>{
         this.list = res.list;
         this.total = res.total;
       })
     },
  
  }
}


</script>


<style>


</style>