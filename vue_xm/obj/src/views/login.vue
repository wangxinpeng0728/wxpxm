<template>
<div class="ss">
  <div id="mws-login" style="margin-top:200px;height:260px; background:#409eff;opacity:0.7;">
    	<h1>看漫画后台管理中心</h1>
        
    	<div id="mws-login-form">
                <div class="mws-form-row" style="color:white;margin-top:20px;">
                	<div class="mws-form-item large">
                    	<!-- <input type="text" class="mws-login-username mws-textinput" placeholder="用户名"  style="width:245px" v-model="username"/> -->
                        用户名:<el-input v-model="username" placeholder="请输入用户名"></el-input>

                    </div>
                </div>
                <div class="mws-form-row" style="margin-top:20px;color:white">
                	<div class="mws-form-item large">
                    	<!-- <input type="password" class="mws-login-password mws-textinput" placeholder="密码" style="width:245px; margin-top:30px" v-model="password"/> -->
                        密码:
                        <el-input placeholder="请输入密码" v-model="password" show-password></el-input>
                    </div>
                </div>
                <div class="mws-form-row">
                      <el-button type="primary" round  @click="submit()" style="width:200px; margin-top:30px; height:40px; margin-left:40px">提交</el-button>
                </div>
        </div>
    </div>
</div>
</template>

<script>
import {login} from "../../request/api.js"
export default {
    data(){
    return{
        username:"",
        password:""
        }
    },
    methods:{
        submit(){ 
            let f  = new FormData;
            f.append("username",this.username);
            f.append("password",this.password);
            //发出
               login(f).then(res=>{
                if (res) {
                    localStorage.setItem("username",res.username)
                    localStorage.setItem("uid",res.uid)
                    alert("登录成功");
                    this.$router.push("/");
                } else {
                    alert("登录失败");
                    this.$router.push("/login");
                }
               console.log(res);
            })
        }
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
.ss{
    background: url(../assets/true.jpg) 0px 0px no-repeat;
    margin-left: 400px;
}
</style>