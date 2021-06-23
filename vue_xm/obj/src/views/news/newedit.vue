<template>
   <div class="container">
    <div class="mws-panel grid_8">
      <div class="mws-panel-header">
        <span class="mws-i-24 i-list">修改新闻</span>
      </div>
      <div class="mws-panel-body">
        <form class="mws-form" action="/news/editdo" method="post" enctype="multipart/form-data">
          <input type="hidden" value="{$row.id}" name="id"/>
          <div class="mws-form-inline">
           
            <div class="mws-form-row">
              <label>标题</label>
              <div class="mws-form-item small">
                <input
                  type="text"
                  class="mws-textinput"
                  name="name"
                  id="name"
                  value=""
                />
              </div>
            </div>
            <div class="mws-form-row">
              <label>内容</label>
              <div class="mws-form-item small">
                <textarea  class="mws-textinput"
                name="content"
                id="content" cols='5' rows="5"
                > </textarea>
                
              </div>
            </div>
            <div class="mws-button-row">
              <input id="an" type="submit" value="提交" class="mws-button green" />
              <input type="reset" value="重置" class="mws-button red" />
            </div>
          </div> 
          
        </form>
      </div>
    </div>
</div>
</template>

<script>
export default {

}
</script>

<style>

</style>