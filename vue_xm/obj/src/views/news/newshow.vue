<template>
  <div>
      <div class="container" v-show=zong>
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span class="mws-i-24 i-table-1">新闻列表</span>
            
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
                        <th>标题</th>
                        <th>内容</th>
                        <th>添加时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                   
                    <tr class="gradeX"  v-for="(v,k) in list" :key="v.id" :tt="k">
                        <td>{{v.id}}</td>
                        <td style="width: 300px;">{{v.name}}</td>
                        <td class="center" style="width: 300px;">
                       {{v.content}}
                        </td>
                        <td class="center">{{v.time}}</td>
                        <td class="center">
                          <button @click="del(k)">删除</button> | <button @click="edit(k)">修改</button>
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

 <div class="container" v-show=xiao>
    <div class="mws-panel grid_8">
      <div class="mws-panel-header">
        <span class="mws-i-24 i-list">修改新闻</span>
      </div>
      <div class="mws-panel-body">
      
         
          <div class="mws-form-inline">
           
            <div class="mws-form-row">
              <label>标题</label>
              <div class="mws-form-item small">
                <input
                  type="text"
                  class="mws-textinput"
                  name="name"
                  id="name"
                  value=""  v-model="name"
                  style="width:300px"/>
              </div>
            </div>
            <div class="mws-form-row">
              <label>内容</label>
              <div class="mws-form-item small">
                <textarea  class="mws-textinput"
                name="content"
                id="content" cols='5' rows="8"  v-model="content"   style="width:300px; height:200px"
                > </textarea>
                
              </div>
            </div>
            <div class="mws-button-row">
              <button @click="editdo()">提交</button>|
               <button> 重置</button>|
            </div>
          </div> 
          
     
      </div>
    </div>
</div>

  </div>
</template>

<script>
import {newshow,newdel,newedit} from '../../../request/api.js'
export default {
      name:"App",
     data(){
     return{
       list:[],
        k:"",
        id : "",
        zong:true,
        xiao:false,
        name:"",
        content:"",
        p:1,
        total:0,
        search:""
   }
  },
   methods:{
    del(k){
   if(!confirm("确定吗")) return
      let id = this.list[k].id;
      newdel({id:id}).then(res=>{
         if (res.code == '200') {
          this.list.splice(k,1);
           newshow({page:this.p,search:this.search}).then(res=>{
         this.list = res.list;
         this.total = res.total;
       })
        } else {
          alert("nono");
        }
      })
    },
    edit(k){
    this.xiao = true;
    this.zong = false;
     this.name = this.list[k].name;
     this.content = this.list[k].content;
     this.id = this.list[k].id;
     this.k = k;
   },
   editdo(){
   
    this.zong = true;
     newedit({name:this.name,content:this.content,id:this.id}).then(res=>{
       if (res.code == 200){
         this.xiao = false;
         let obj = {name:this.name,content:this.content,id:this.id};
         this.list[this.k] = obj;

       } else{
         alert ("失败");
       }
     })
    
   },
   sou(){
      //this.search
       this.p = 1;  //因为每次搜索的时候,必须回到第一页 
       newshow({page:this.p,search:this.search}).then(res=>{
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
     newshow({page:this.p,search:this.search}).then(res=>{
         this.list = res.list;
         this.total = res.total;
       })
     },
},
 

  
    created(){
    newshow({page:this.p,search:this.search}).then(res=>{
       this.list = res.list;
         this.total = res.total;
    })
  }

}
</script>

<style>

</style>