<template>
  <div>
      

	
        
         <div>
            	<h1>欢迎来到樱桃商城信息管理中心</h1> 
            
        </div>
        <el-calendar v-model="value">
        </el-calendar>
    </div>
   
  
</template>

<script>
export default {
     data(){
        return { 
            imgUrl1:require("../assets/images/mws-logo.png"),
            imgUrl2:require("../assets/example/profile.jpg"),
            shouxian:false,
            yongxian:false,
            liexian:false,
            shangxian:false,
            dingxian:false,
            xinxian:false,
            value: new Date(),
        }
    },
    methods:{
        shou(){
            this.shouxian = !this.shouxian
        },
        yong(){
            this.yongxian = !this.yongxian
        },
        lie(){
            this.liexian = !this.liexian
        },
        shang(){
            this.shangxian = !this.shangxian
        },
         ding(){
            this.dingxian = !this.dingxian
        },
        xin(){
            this.xinxian = !this.xinxian
        },
    }

}
</script>

<style>
@import "../assets/css/demo.css";
@import "../assets/css/fluid.css";
@import "../assets/css/mws.theme.css";
@import "../assets/css/reset.css";
@import "../assets/css/text.css"; 
@import "../assets/css/core/button.css";
@import "../assets/css/core/core.css";
@import "../assets/css/core/error.css";
@import "../assets/css/core/gallery.css";
@import "../assets/css/core/login.css";
@import "../assets/css/core/misc.css";
@import "../assets/css/core/panels.css";
@import "../assets/css/core/report.css";
@import "../assets/css/core/table.css";
@import "../assets/css/core/themer.css";
@import "../assets/css/fonts/ptsans/stylesheet.css";
@import "../assets/css/icons/ic.css";
@import "../assets/css/icons/ic-16.css";
@import "../assets/css/icons/icons.css";
@import "../assets/css/jui/jquery.ui.css";
</style>


