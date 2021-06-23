<template>
  <div>
      <div class="container">
    <div class="mws-panel grid_8">
      <div class="mws-panel-header">
        <span class="mws-i-24 i-list">商品修改</span>
      </div>
      <div class="mws-panel-body">
     
          <div class="mws-form-inline">
            <div class="mws-form-row">
              <label>商品名</label>
              <div class="mws-form-item small">
                <input
                  type="text"
                  class="mws-textinput"
                  v-model="item.gname"
                
                />
              </div>
            </div>
            <div class="mws-form-row">
              <label>原价</label>
              <div class="mws-form-item small">
                <input
                  type="text"
                  class="mws-textinput"
                  v-model="item.yprice"
                />
                
              </div>
            </div>
            <div class="mws-form-row">
              <label>现价</label>
              <div class="mws-form-item small">
                <input
                  type="text"
                  class="mws-textinput"
                  v-model="item.price"
                />
              </div>
            </div>

             
            <div class="mws-form-row">
              <label>商品图片</label>
              <div class="mws-form-item clearfix">

                 
                    <input type="file" ref="file"><img :src="item.pic" width="50" height="50" alt="">
                  
              </div>
            </div>

            <div class="mws-form-row">
              <label>商品描述</label>
              <div class="mws-form-item small">
                <input
                  type="text"
                  class="mws-textinput"
                   v-model="item.content"
                />
              </div>
            </div>
            <div class="mws-form-row">
              <label>商品库存</label>
              <div class="mws-form-item small">
                <input
                  type="text"
                  class="mws-textinput"
                   v-model="item.store"
                  
                />
              </div>
            </div>
           
          <div class="mws-button-row">
            <input id="an" type="submit" value="提交" class="mws-button green" @click="edit()"/>
            <input type="reset" value="重置" class="mws-button red" />
          </div>
      
          </div>
      </div>
</div>
</div>
  </div>
    <!---->
</template>

<script>
import {getOne,editGoods} from "../../../request/api";
export default {
  data(){
    return{
        item:{
                gname:"",
                yprice:"",
                price:"",
                tid:"0",
                pic:"",
                content:"",
                store:"",
                sale:"",
            },
      list:[],
      id:''
    }
  },
  created(){
    let id = this.$route.params.id;
    this.id = id;
    //通过id 查询当前的那一条数据 
    getOne({id:id}).then(res=>{
        console.log(res);
        this.item = res;
  
    })
    },
    //查询所有的类别 
   
  methods:{
      edit(){
          let f = new FormData;
          f.append("gname",this.item.gname);
          f.append("yprice",this.item.yprice);
          f.append("price",this.item.price);
          f.append("tid",this.item.tid);
          f.append("content",this.item.content);
          f.append("store",this.item.store);
          f.append("sale",this.item.sale);
          //再插入一个id
          f.append("id",this.id);
          //处理文件上传
          let file = this.$refs.file.files[0];
          if (this.$refs.file.files.length >= 1) {
            f.append("pic",file);
          }
          editGoods(f).then(res=>{
              console.log(res);
              if (res.code == '200') {
                  this.$router.push("/goodsshow")
              } else {
                  alert(res.msg);
                  return;
              }

          })
    }
  }
}

</script>

<style>

</style>