<template>
  <div>
        <div style="margin-top:-100px;margin-left:-350px">
            	<h1>欢迎来到腾讯动漫信息管理中心</h1> 
                <div id="ab" style="width:350px;height:300px;margin-left:300px"></div>
                <div id="abb" style="width:350px;height:300px;float:left;position :absolute;top:80px;left:500px"></div>
                <div id="abbb" style="width:350px;height:300px;position:absolute; left:500px;top:400px"></div>
                <div id="abbbb" style="width:350px;height:300px;position:absolute;left:-50px;top:400px"></div>
        </div>
    </div>
   
  
</template>

<script>
export default {
    mounted(){
         this.wxp();
         this.wxpp();
         this.wxppp();
         this.wxpppp();
  },
     data(){
        return { 
            imgUrl1:require("../assets/images/mws-logo.png"),
            imgUrl2:require("../assets/example/profile.jpg"),
            p:[1,2,3,4],
            value: new Date()
        }
    },
    methods:{
        wxp(){
	let box = document.getElementById("ab");
	let ec = this.$echarts.init(box);
	//3. 制定图表的数据和配置项  ***********************
	//案例 柱状图
	let option = {
		//操作x轴
		xAxis:{
			type:"category",
			data:this.p,
		},
		//操作y轴
		yAxis:{
			type:'value'
		},
		//系列列表  专门描述  x 和 y 的对应关系 , 以及 图形的具体表现形式 
		series:[
			{
				name:"商品销量",     //图象的标题
				type:"bar",			//图形的类型  bar 柱状图
				data:[1000,698,439,812,10]		//固定 : 如果哪一方的type取值是value , 值一定写在 series 
			},
			{
				name:"商品利润",     //图象的标题
				type:"line",			//图形的类型  bar 柱状图
				data:[800,308,239,512,500]		//固定 : 如果哪一方的type取值是value , 值一定写在 series 
			}

		],
        title:{
        show:true,       //显示标题
        text:"用户数据分析",   //图表标题的内容
         
    
},	
	};	
    
	
	// 4. 把配置项设置给echarts 
	ec.setOption(option);

        },
         wxpp(){
	let box = document.getElementById("abb");
	let ec = this.$echarts.init(box);
	//3. 制定图表的数据和配置项  ***********************
	//案例 柱状图
	let option = {
		//操作x轴
		xAxis:{
			type:"category",
			data:["袜子","手套","短裤","围巾","帽子"]
		},
		//操作y轴
		yAxis:{
			type:'value'
		},
		//系列列表  专门描述  x 和 y 的对应关系 , 以及 图形的具体表现形式 
		series:[
			{
				name:"商品销量",     //图象的标题
				type:"bar",			//图形的类型  bar 柱状图
				data:[1000,698,439,812,10]		//固定 : 如果哪一方的type取值是value , 值一定写在 series 
			},
			{
				name:"商品利润",     //图象的标题
				type:"line",			//图形的类型  bar 柱状图
				data:[800,308,239,512,500]		//固定 : 如果哪一方的type取值是value , 值一定写在 series 
			}

		],
        title:{
        show:true,       //显示标题
        text:"漫画数据分析",   //图表标题的内容
        }
	};	
    
	
	// 4. 把配置项设置给echarts 
	ec.setOption(option);

        },
         wxppp(){
	let box = document.getElementById("abbb");
	let ec = this.$echarts.init(box);
	//3. 制定图表的数据和配置项  ***********************
	//案例 柱状图
	let option = {
		//操作x轴
		xAxis:{
			type:"category",
			data:["袜子","手套","短裤","围巾","帽子"]
		},
		//操作y轴
		yAxis:{
			type:'value'
		},
		//系列列表  专门描述  x 和 y 的对应关系 , 以及 图形的具体表现形式 
		series:[
			{
				name:"商品销量",     //图象的标题
				type:"bar",			//图形的类型  bar 柱状图
				data:[1000,698,439,812,10]		//固定 : 如果哪一方的type取值是value , 值一定写在 series 
			},
			{
				name:"商品利润",     //图象的标题
				type:"line",			//图形的类型  bar 柱状图
				data:[800,308,239,512,500]		//固定 : 如果哪一方的type取值是value , 值一定写在 series 
			}

		],
        title:{
        show:true,       //显示标题
        text:"类别数据分析",   //图表标题的内容
        }
	};	
    
	
	// 4. 把配置项设置给echarts 
	ec.setOption(option);

        },
         wxpppp(){
	let box = document.getElementById("abbbb");
	let ec = this.$echarts.init(box);
	//3. 制定图表的数据和配置项  ***********************
	//案例 柱状图
	let option = {
		//操作x轴
		xAxis:{
			type:"category",
			data:["袜子","手套","短裤","围巾","帽子"]
		},
		//操作y轴
		yAxis:{
			type:'value'
		},
		//系列列表  专门描述  x 和 y 的对应关系 , 以及 图形的具体表现形式 
		series:[
			{
				name:"商品销量",     //图象的标题
				type:"bar",			//图形的类型  bar 柱状图
				data:[1000,698,439,812,10]		//固定 : 如果哪一方的type取值是value , 值一定写在 series 
			},
			{
				name:"商品利润",     //图象的标题
				type:"line",			//图形的类型  bar 柱状图
				data:[800,308,239,512,500]		//固定 : 如果哪一方的type取值是value , 值一定写在 series 
			}

		],
        title:{
        show:true,       //显示标题
        text:"互动数据分析",   //图表标题的内容
        }
	};	
    
	
	// 4. 把配置项设置给echarts 
	ec.setOption(option);

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

.ab{
    width: 1000px;
    height: 500px;
    margin-left: 200px;
    margin-top: -10px;
}
</style>


