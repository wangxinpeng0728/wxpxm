<template>
<div>
   <div class="container">
       <h1 style="margin-top:-100px;margin-left:-200px">类别添加</h1>
        <div class="xing">
                <div style="position:absolute;top:10px;left:200px">类别名：</div>
                <el-input v-model="user.tname" placeholder="请输入类别名" type="text" style="width:200px;display:block;margin-top:-70px;margin-left:250px"></el-input>
          <div class="mws-button-row" style="margin-left:300px;margin-top:-50px">
            <el-button type="primary" @click="add()" style="position:absolute;top:171px;left:250px">提交</el-button>
              <el-button type="danger" style="position:absolute;top:171px;left:330px">重置</el-button>
          </div> 
      </div>
     </div>
</div>
</template>
<script>
import {getTypes,typeadd} from '../../../request/api.js'
export default {
   data(){
    return{     
       tid:"0",
       list:[],
       id:"",
       user:{
          tname : "",
          pid : ""
        
       },
    }
  },
   created(){
    getTypes().then(res=>{
      if (res) {
        this.list = res;
      }
    })
  },
  methods:{
     add(){
      if (this.user.tname != "") {
      typeadd(this.user).then(res=>{
         if (res.code == "200") {
          this.user.id = res.id;
          this.list.unshift(this.user)
          alert("添加成功")
          this.$router.push({path: '/typeindex'});

        }
      })
      } else {
          alert("请将信息填写完成");
         
        }
    },

  },

}
</script>

<style>

</style>