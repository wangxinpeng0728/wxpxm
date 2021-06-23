<template>
  <div>
<div class="container">   
        <div class="mws-panel grid_8">
            <div class="mws-panel-header">
                <span class="mws-i-24 i-table-1">回收站</span>
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
                        <tr class="gradeX" v-for="(v,k) in list" :key="v.id" :tt="k">
                            <td>{{v.id}}</td>
                            <td>{{v.gname}}</td>
                             <td><img :src="v.pic" width="50" height='50' alt=""></td>
                            <td class="center">{{v.price}}</td>
                            <td class="center">{{v.sale}}</td>
                            <td class="center">{{v.store}}</td>
                            <td class="center">
                              
                             {{v.status?"上架":"下架"}}
                        
                            </td>
                            <td class="center">{{v.time}}</td>
                            <td class="center">
                              <button @click="del(k)">删除</button>| <button @click="bian(v.zhuangtai,v.id,k)">恢复</button>
                            </td>
                        </tr>
                     
                     
                    </tbody>
                </table>
            </div>
        </div>
        
        
    </div>
  </div>
</template>

<script>
import {huishow,goodsdel,editbian} from '../../../request/api.js'
export default {
  data(){
    return{
        list:[],
        id:"",
        k:""
     
    }
  },
  methods:{
          del(k){
       if(!confirm("确定吗")) return
      let id = this.list[k].id;
      goodsdel({id:id}).then(res=>{
         if (res.code == '200') {
          this.list.splice(k,1);
        } else {
          alert("nono");
        }
      })
    },
    bian(zhi,id,k){  
      
        zhi = 1;
      //发送到服务器去修改   status   id 
      editbian({id:id,zhuangtai:zhi}).then(res=>{
        if (res.code == '200') {
           this.list.splice(k,1);
            alert("恢复成功");
        } else {
          alert(res.msg);
          return;
        }
      })
    },
    
  },
created(){
    huishow().then(res=>{
         this.list = res;
       })
     },

}
</script>

<style>

</style>