<template>
  <div class="container">
        <div class="mws-panel grid_8">
            <div class="mws-panel-header">
                <span class="mws-i-24 i-table-1">查看类别</span>
            </div>
            <div class="mws-panel-body">
                <table class="mws-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>用户名</th>
                            <th>操作</th>
                        </tr>
                        <tr class="gradeX"  v-for="(v,k) in list" :key="v.id" :tt="k">
                        <th style="background-color: #f2f2f2;">{{v.id}}</th>
                        <th style="background-color: #f2f2f2;">{{v.tname}}</th>                     
                        <th style="background-color: #f2f2f2;">
                          <button @click="del(k)">删除</button>|<button @click="zis(v.id)">查看</button>|<button @click="edit(v.id)">修改</button>
                    </th>
                    </tr>
                     
                    </thead>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
import {typezishow,typedel} from '../../../request/api.js'
export default {
      name:"App",
        data(){
        return{
          id:"",
          list:[]  
      }
  },
  methods:{  
    del(k){
   if(!confirm("确定吗")) return
      let id = this.list[k].id;
      typedel({id:id}).then(res=>{
         if (res.code == '200') {
          this.list.splice(k,1);
        } else {
          alert("nono");
        }
      })
    },
     edit(id){
        this.$router.push("/typeedit/"+id);
     },
      zis(id){
        this.$router.push("/typeziss/"+id);
     },
  },
   created(){
    let id = this.$route.params.id;
    this.id = id;
    //通过id 查询当前的那一条数据 
    typezishow({id:id}).then(res=>{
        this.list = res;
    })
    },
}
</script>

<style>

</style>