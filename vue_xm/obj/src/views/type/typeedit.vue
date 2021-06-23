<template>
  <div>
    <div class="container">
       <h1 style="margin-top:-100px;margin-left:-200px">类别修改</h1>
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
import {typexiu,typeedit} from '../../../request/api.js'
export default {
      name:"App",
        data(){
        return{
          id:"",
          user:{
            tname:"",
            id:""
          } 
      }
  },
  methods:{  
    add(){
       typeedit(this.user).then(res=>{
       if (res.code == 200){
       this.$router.push("/typeindex");
        console.log(res)    
       } else{
         alert ("失败");
       }
     })
    }
},
  created(){
    let id = this.$route.query.id;
    this.id = id;
 
    typexiu({id:id}).then(res=>{
       console.log(res)
        this.user = res;
          
  
      })
    },
}
</script>

<style>

</style>