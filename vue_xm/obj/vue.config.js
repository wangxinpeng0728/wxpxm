module.exports = {
    devServer:{
        //设置端口号
        
        //设置代理
        proxy:{
            "/vue_xm/demo":{
                target:"http://localhost"
            }
        }
    }
}