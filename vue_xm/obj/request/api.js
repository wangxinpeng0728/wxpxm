import axi from './inter.js'

//管理员展示
export const getuser = can=>axi.get("user/index",{params:can});
export const getusers = can=>axi.get("user/indexs",{params:can});
//管理员添加
export const useradd = can=>axi.get("user/add",{params:can});

//接收管理员种类
export const getType = can=>axi.get("user/type",{params:can});

//管理员删除
export const userdel = can=>axi.get("user/del",{params:can});

//管理员修改
export const useredit = can=>axi.get("user/edit",{params:can});

//用户展示
export const usershow = can=>axi.get("user/usershow",{params:can});

//新闻展示
export const newshow = can=>axi.get("user/newshow",{params:can});

//新闻添加
export const newadd = can=>axi.get("user/newadd",{params:can});

//类别添加
export const typeadd = can=>axi.get("goods/typeadd",{params:can});

//新闻删除
export const newdel = can=>axi.get("user/newdel",{params:can});

//新闻修改
export const newedit = can=>axi.get("user/newedit",{params:can});

//登录
export const login = can=>axi.post("goods/login",can);

//类别展示
export const typeindex = can=>axi.get("user/typeindex",{params:can});

//类别删除
export const typedel = can=>axi.get("user/typedel",{params:can});

//商品展示
export const goodsshow = can=>axi.get("user/goodsshow",{params:can});

//商品删除
export const goodsdel = can=>axi.get("user/goodsdel",{params:can});

//修改商品状态
export const editStatus = can=>axi.get("/user/status",{params:can});
//修改管理员状态
export const aeditStatus = can=>axi.get("/user/statuss",{params:can});


//获取商品里面的时候所有类别
export const getTypes = can=>axi.get("/goods/type",{params:can});

//商品添加
export const addGoods = can=>axi.post("/goods/add",can);

//查询那一条数据
export const getOne = can=>axi.get("/goods/One",{params:can});
//商品修改
export const editGoods = can=>axi.post("/goods/edit",can);

//修改用户状态
export const ueditStatus = can=>axi.get("/user/statusss",{params:can});

//查询那一条用户地址数据
export const getOnes = can=>axi.get("/goods/Ones",{params:can});

//查询那一条用户详情数据
export const getOness = can=>axi.get("/goods/Oness",{params:can});

//查询订单信息
export const dingshow = can=>axi.get("/goods/dingshow",{params:can});
//修改订单状态
export const deditStatus = can=>axi.get("/goods/dstatus",{params:can});

//类别详情
export const typezishow = can=>axi.get("goods/typezishow",{params:can});

//孙类别
export const typezishows = can=>axi.get("goods/typezishows",{params:can});
//框类别
export const typezishowx = can=>axi.get("goods/typezishowx",{params:can});

//子类别删除
export const typedels = can=>axi.get("goods/typedels",{params:can});

//获取类别修改信息
export const typexiu = can=>axi.get("goods/typexiu",{params:can});

//进行类别修改
export const typeedit = can=>axi.get("goods/typeedit",{params:can});

//获取管理员修改信息
export const adminxiu = can=>axi.get("goods/adminxiu",{params:can});

//修改管理员信息
export const adminedit = can=>axi.get("goods/adminedit",{params:can});

//回收站展示信息
export const huishow = can=>axi.get("goods/goodshui",{params:can});

//进入回收站
export const edithui = can=>axi.get("goods/edithui",{params:can});

//离开回收站
export const editbian = can=>axi.get("goods/editbian",{params:can});

//登录等级
export const getlevel = can=>axi.get("goods/level",{params:can});

//ajax
export const userajax = can=>axi.get("user/userajax",{params:can});
///////////////////
//评论
export const plshow = can=>axi.get("/goods/plshow",{params:can});
export const plStatus = can=>axi.get("/goods/plstatus",{params:can});
export const pldel = can=>axi.get("/goods/pldel",{params:can});
//收藏
export const scshow  = can=>axi.get("goods/scshow",{params:can});
export const scstatus  = can=>axi.get("goods/scstatus",{params:can});
export const scdel  = can=>axi.get("goods/scdel",{params:can});
//漫画展示
export const getmanhua  = can=>axi.get("goods/manhua",{params:can});
//漫画删除
export const manhuadel  = can=>axi.get("goods/manhuadel",{params:can});



