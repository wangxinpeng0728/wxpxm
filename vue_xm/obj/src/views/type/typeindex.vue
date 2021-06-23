<template>
  <div class="container" style="margin-left:-100px">
      <div id="mws-searchbox" class="mws-inset" style="width: 170px; float: right; background-color: #ffd1d8; margin-top: 5px; height:25px">         
                    <input type="text" class="mws-search-input" name="search" v-model="search"/>
                    <input type="submit" class="mws-search-submit" @click="sou"/>
            </div>
        <el-table border  :data="list.slice((page-1)*pnum,page*pnum)" style="width: 100%;margin-top:-100px">
    <el-table-column prop="id" label="ID" width="120"></el-table-column>
    <el-table-column prop="tname" label="类别名" width="120"></el-table-column>
     <el-table-column prop="time" label="日期" width="150"></el-table-column>
    <el-table-column label="操作" width="200">
      <template  slot-scope="scope">
           <router-link :to="{}">  <el-button type="danger" icon="el-icon-delete" circle  @click="deleteData(scope.$index,list)"></el-button></router-link>
           <router-link :to="{path:'/typeedit',query:{id:scope.row.id}}" style="margin-left:10px"> <el-button type="primary" icon="el-icon-edit" circle></el-button></router-link>
      </template>
    </el-table-column>
    
    </el-table> 
    <el-pagination background :page-sizes='ye' @size-change="qie" layout="total,prev,next,sizes,jumper" :total="total" :page-size="pnum" current-page="page" @current-change="bian" style="height:50px"></el-pagination>   
    </div>
</template>
<script>
import {typeindex,typedel} from '../../../request/api.js'
export default {
      name:"App",
     data(){
     return{
       list:[],
       search:"",
       k:"",
       id:"",
        page:1,//当前页
        total:0,//一共多少条
        pnum:2,//每页显示多少条
        ye:[1,2,3]
   }
  },
  methods:{
       deleteData(index){
          let id = this.list[index].id;
          typedel({id:id}).then(res=>{
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
     del(k){
      let id = this.list[k].id;
      typedel({id:id}).then(res=>{
         if (res.code == '200') {
          this.list.splice(k,1);
           typeindex({page:this.p,search:this.search}).then(res=>{
            this.list = res.list;
            this.total = res.total;
       })
        } else {
          alert("nono");
        }
      })
    },
         zi(id){
        this.$router.push("/typezi/"+id);
     },
    edit(id) {

      this.$router.push("/edit/"+id);
    },
     sou(){
      //this.search
       this.p = 1;  //因为每次搜索的时候,必须回到第一页 
       typeindex({page:this.p,search:this.search}).then(res=>{
         this.list = res.list;
         this.total = res.total;
       })
     },

     edit(id){
        this.$router.push("/typeedit/"+id);
     },
     
  },
    created(){
     typeindex({page:this.p,search:this.search}).then(res=>{
         this.list = res.list;
         this.total = res.total;
    })
  }

}
</script>

<style>

</style>