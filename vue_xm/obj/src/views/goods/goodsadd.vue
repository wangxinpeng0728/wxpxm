<template>
  <div>
      <div class="container">
    <div class="mws-panel grid_8">
      <div class="mws-panel-header">
        <span class="mws-i-24 i-list">商品添加</span>
      </div>
      <div class="mws-panel-body">
       
          <div class="mws-form-inline">
            <div class="mws-form-row">
              <label>商品名</label>
              <div class="mws-form-item small">
                <input type="text" class="mws-textinput" v-model="gname"/>
              </div>
            </div>
            <div class="mws-form-row">
              <label>原价</label>
              <div class="mws-form-item small">
               <input type="text" v-model="yprice" @blur="shi()"> <span :style="{color:c}">{{mprice}}</span> <br>
                
              </div>
            </div>
            <div class="mws-form-row">
              <label>现价</label>
              <div class="mws-form-item small">
                <input
                  type="text"
                  class="mws-textinput"
                  v-model="price" @blur="shis()"
                /><span :style="{color:cs}">{{mprices}}</span> <br>
              </div>
            </div>
            <div class="mws-form-row">
              <label>商品类别</label>
              <div class="mws-form-item small">
                <select name="tid" v-model="tid">
              
                  <option value="0">请选择</option>
                    <option v-for="(v,k) in list" :key="v.id" :value="v.id" :meiyong="k">{{v.tname}}</option>
                
                </select>
              </div>
            </div>
             
            <div class="mws-form-row">
              <label>商品图片</label>
              <div class="mws-form-item clearfix">
                <ul class="mws-form-list inline" style="list-style:none">
                  <li>
                    <input type="file" name="pic" ref="file"/> 
                  </li>
                </ul>
              </div>
            </div>

            <div class="mws-form-row">
              <label>商品描述</label>
              <div class="mws-form-item small">
                <input
                  type="text"
                  class="mws-textinput"
                  v-model="content"
                />
              </div>
            </div>
            <div class="mws-form-row">
              <label>商品库存</label>
              <div class="mws-form-item small">
                <input
                  type="text"
                  class="mws-textinput"
                 v-model="store"
                />
              </div>
            </div>
            <div class="mws-form-row">
              <label>状态</label>
              <div class="mws-form-item clearfix">
                <ul class="mws-form-list inline" style="list-style:none">
                  <li>
                    <input type="radio" name="status" value="1"  v-model="status" />
                    <label>上架</label>
                  </li>
                  <li>
                    <input type="radio" name="status" value="0"  v-model="status"/>
                    <label>下架</label>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="mws-button-row">
            <input id="an" type="submit" value="提交" class="mws-button green" @click="add()"/>
           
          </div>
       
      </div>
    </div>
</div>
  </div>
</template>

<script>
import {getTypes,addGoods} from '../../../request/api.js'
export default {
  data(){
    return{
       gname:"",
       yprice:"",
       price:"",
       mprice:"",
       tid:"0",
       pic:"",
       content:"",
       store:"",
       sale:"",
       status:"1",
       list:[],
        c:"red",
        cs:"",
          mprices:"",
    }
  },
  methods:{
     
    add(){
        if (this.ganme != ""  && this.price != "" ) {
       let f = new FormData;
          f.append("gname",this.gname);
          f.append("yprice",this.yprice);
          f.append("price",this.price);
          f.append("tid",this.tid);
          f.append("content",this.content);
          f.append("store",this.store);
          f.append("sale",this.sale);
          f.append("status",this.status);
          //处理文件上传
          let file = this.$refs.file.files[0];
          f.append("pic",file);
          addGoods(f).then(res=>{
              if (res.code == '200') {
                  this.$router.push("/goodsshow")
              } else {
                  alert(res.msg);
                  return;
              }
              

          })
            } else {
          alert("请将信息填写完成");
         
        }
          
    },
     shi(){
            //表单验证
            let p = /^[0-9]*$/;
            if (!p.test(this.yprice)) {
                this.mprice = "价格请输入纯数字";
                this.c = "red"
                return false;
            } else {
                this.mprice="成功"
                this.c = "green"
                return true;
            }
        },
         shis(){
            //表单验证
            let p = /^[0-9]*$/;
            if (!p.test(this.yprices)) {
                this.mprices = "价格请输入纯数字";
                this.cs = "red"
                return false;
            } else {
                this.mprices="成功"
                this.cs = "green"
                return true;
            }
        }
  },
  created(){
    getTypes().then(res=>{
      if (res) {
        this.list = res;
      }
    })
  }

}
</script>

<style>

</style>