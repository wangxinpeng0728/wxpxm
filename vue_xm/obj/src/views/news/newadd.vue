<template>
  <div>
      <div class="container">
    <div class="mws-panel grid_8">
      <div class="mws-panel-header">
        <span class="mws-i-24 i-list">新闻添加</span>
      </div>
      <div class="mws-panel-body">
        
          <div class="mws-form-inline">
           
            <div class="mws-form-row">
              <label>标题</label>
              <div class="mws-form-item small">
                <input
                  type="text"
                  class="mws-textinput"
                  v-model="user.name"
                /><font id="myfont"></font>
              </div>
            </div>
            <div class="mws-form-row">
              <label>内容</label>
              <div class="mws-form-item small">
                <textarea  class="mws-textinput"
               
                cols='5' rows="5"  v-model="user.content"></textarea>
                
              </div>
            </div>
            <div class="mws-button-row">
             <button @click="adddo()">提交</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="reset" value="重置" />
            </div>
          </div> 
          
      
      </div>
    </div>
</div>
  </div>
</template>

<script>
import {newadd} from '../../../request/api.js'
 export default {
   name:"App",
     data(){
     return{
       list:[],
        user:{
          name : "",
          content : ""
        
       },
         id : "",
       k:""
           
   }
  },
  methods:{
     adddo(){
      if (this.user.name != ""  && this.user.content != "" ) {  
      newadd(this.user).then(res=>{
        console.log(res);
         if (res.code == "200") {
          this.user.id = res.id;
          this.list.unshift(this.user)
          alert("添加成功")
          this.$router.push({path: '/newshow'});

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