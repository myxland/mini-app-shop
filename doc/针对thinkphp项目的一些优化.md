# 针对thinkphp项目的一些优化
===

1. 将配置文件中的"app_debug=>true"改成"app_debug=>false"

2. 生成数据库表字段缓存(减少SHOW COLUMS查询)
```
php think optimize:schema
```
运行命令后,会在runtime中生成scheme目录,里面放着表字段信息.

3. 路由缓存
```
php think optimize:route
```
运行命令后,会在runtime下生产一个route.php文件,route.php返回一个数组信息.