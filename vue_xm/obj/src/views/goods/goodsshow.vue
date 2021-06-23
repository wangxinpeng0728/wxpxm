<template>
  <div>
       <div class="container">   
        <div class="mws-panel grid_8">
            <div class="mws-panel-header">
                <span class="mws-i-24 i-table-1">查看商品</span>
            </div>
            <div id="mws-searchbox" class="mws-inset" style="width: 200px; float: right; background-color: #36393c; margin-top: 5px;">
             
                    <input type="text" class="mws-search-input" name="search" style="width: 170px;" v-model="search"/>
                    <input type="submit" class="mws-search-submit" @click="sou"/>
              
            </div>
            <div class="mws-panel-body">
                <table class="mws-table">
                    <thead>
                        <tr>
                          
                            <th>ID</th>
                            <th>商品名</th>
                            <th>商品图片</th>
                            <th>商品价格</th>
                            <th>商品销量</th>
                            <th>商品库存</th>
                            <th>状态</th>
                            <th>添加时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                     
                        <tr class="gradeX"  v-for="(v,k) in list" :key="v.id" :tt="k">
                            <td>{{v.id}}</td>
                            <td>{{v.gname}}</td>
                             <td><img :src="v.pic" width="50" height='50' alt=""></td>
                            <td class="center">{{v.price}}</td>
                            <td class="center">{{v.sale}}</td>
                            <td class="center">{{v.store}}</td>
                             <td><button @click="jia(v.status,v.id,k)">{{v.status==1?"上架":"下架"}}</button></td>
                            <td class="center">{{v.time}}</td>
                            <td class="center">
                               <button @click="hui(v.zhuangtai,v.id,k)">删除</button>
                            
                               <button @click="edit(v.id)">修改</button>
                            </td>
                        </tr>
                     
                     <td colspan="7">
                       
                            <a href="javascript:void(0)" @click='page("shou")' style="text-decoration:none;">首页</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="javascript:void(0)" @click='page("prev")' style="text-decoration:none;">上一页</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="javascript:void(0)" @click='page("next")' style="text-decoration:none;">下一页</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="javascript:void(0)" @click='page("total")' style="text-decoration:none;">尾页</a>

                        共{{p}}/{{total}}页
                      </td>
                    </tbody>
                </table>
            </div>
        </div>
        
        
    </div>

    <!---->

  </div>
</template>

<script>
import {goodsshow,goodsdel,editStatus,edithui} from '../../../request/api.js'
export default {
      name:"App",
     data(){
     return{
       list:[],
       id:"",
       k:"",
        p:1,
        total:0,
        search:"",
     }
  },
  
created(){
    goodsshow({page:this.p,search:this.search}).then(res=>{
         this.list = res.list;
         this.total = res.total;
       })
     },

  methods:{
    //    del(k){
    //    if(!confirm("确定吗")) return
    //   let id = this.list[k].id;
    //   goodsdel({id:id}).then(res=>{
    //      if (res.code == '200') {
    //       this.list.splice(k,1);
    //      goodsshow({page:this.p,search:this.search}).then(res=>{
    //      this.list = res.list;
    //      this.total = res.total;
    //    })
    //     } else {
    //       alert("nono");
    //     }
    //   })
    // },
     sou(){
      //this.search
       this.p = 1;  //因为每次搜索的时候,必须回到第一页 
       goodsshow({page:this.p,search:this.search}).then(res=>{
         this.list = res.list;
         this.total = res.total;
       })
     },
   
  
    //    getall(){
    //   getGoods({page:this.p,search:this.search}).then(res=>{
    //     this.list = res.list;
    //     this.total = res.total;
    //   })
    // },
     page(v){
      switch(v){
        case "shou":
          this.p = 1;
          break;
        case "prev":
          //首页边界判断
          if (this.p <= 1){
            alert("已经是首页");
            return;
          }
          this.p--;
          break;
        case "next":
          //尾页边界判断
          if (this.p >= this.total) {
            alert("已经到头了");
            return;
          }
          this.p++;
          break;
        case "total":
          this.p = this.total;
      }
    //计算好页码后,重新请求数据
    // this.getall();
     goodsshow({page:this.p,search:this.search}).then(res=>{
         this.list = res.list;
         this.total = res.total;
       })
     },
      jia(zhi,id,k){
      if (zhi == 1) {
        zhi = 0;
      } else {
        zhi = 1;
      }
      //发送到服务器去修改   status   id 
      editStatus({id:id,status:zhi}).then(res=>{
        if (res.code == '200') {
          //修改上面的文字
          this.list[k].status = zhi;
        } else {
          alert(res.msg);
          return;
        }
      })
    },

    //回收站
     hui(zhi,id,k){  
       if(!confirm("确定吗")) return
        zhi = 0;
      //发送到服务器去修改   status   id 
      edithui({id:id,zhuangtai:zhi}).then(res=>{
        if (res.code == '200') {
           this.list.splice(k,1);
              alert("删除成功");
        } else {
          alert(res.msg);
          return;
        }
      })
    },
    //搜索
 edit(id) {

      this.$router.push("/edit/"+id);
    }
    

  },

}

</script>

<style>
.abc{
  font-size: 52px;
}
</style>