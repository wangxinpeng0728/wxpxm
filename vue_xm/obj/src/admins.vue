<template>
  <div>
    
        <div>
            	<h1>欢迎来到樱桃商城信息管理中心</h1> 
            <el-calendar v-model="value">
</el-calendar>
        </div>
    </div>
   
  
</template>

<script>
export default {
    data() {
      return {
        value: new Date()
      }
    }
}
</script>

<style>

</style>


