# Msg

**项目预览**
![项目预览](https://img.cdn.apipost.cn/client/user/1189043/avatar/5d46c0bfb5f09c093207cedd081a80576373ceae8e5d3.png)

**项目地址**

[Github](https://github.com/kaindev8/Msg)

**项目说明**

基于 [Think PHP6.0](https://www.thinkphp.cn/)，[Layui](https://layuion.com/)，[Pear Admin](http://www.pearadmin.com/) 实现的留言板系统

**运行环境**
PHP8.0 + MySQL5.7

**安装教程**

1. 导入根目录的 data.sql 文件
2. 打开 config/database.php
3. 设置数据库名，数据库用户名，数据库密码
4. 设置运行目录为

		/public

5. Nginx设置伪静态为

```
location ~* (runtime|application)/{
	return 403;
}
location / {
	if (!-e $request_filename){
		rewrite  ^(.*)$  /index.php?s=$1  last;   break;
	}
}
```

**后台**

后台地址：你的域名/admin (例如：localhost/admin)

管理员账号：admin

管理员密码：123456
