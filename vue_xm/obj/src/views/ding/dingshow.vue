<template>
<div>
  <div class="container">
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span class="mws-i-24 i-table-1">订单列表</span>
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
                        <th>订单号</th>
                        <th>下单日期</th>
                        <th>总价</th>
                        <th>发货状态</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                  
                    <tr class="gradeX" v-for="(v,k) in list" :key="v.id" :tt="k">
                        <td>{{v.id}}</td>
                        <td>{{v.onum}}</td>
                        <td>{{v.time}}</td>
                        <td class=" center">{{v.price}}</td>
                       <td>
                            <span>
                                 <td><button @click="jia(v.status,v.id,k)">{{v.status==1?"以发货":"已付款"}}</button></td>
                               </span>
                            </td>
                        <td><a href="#">查看详情</a></td>
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
</div>
</template>

<script>
import {dingshow,deditStatus} from '../../../request/api.js'
export default {
 name:"App",
     data(){
     return{
       list:[],
         id:"",
           
            k:"",
              p:1,
        total:0,
          search:""
           
        
           
   }
  },
    created(){
     dingshow({page:this.p,search:this.search}).then(res=>{
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
      deditStatus({id:id,status:zhi}).then(res=>{
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
       dingshow({page:this.p,search:this.search}).then(res=>{
         this.list = res.list;
         this.total = res.total;
       })
     },
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
     dingshow({page:this.p,search:this.search}).then(res=>{
         this.list = res.list;
         this.total = res.total;
       })
     },
  }
}

</script>

<style>

</style>