###  RESTFul API最佳实践

使用HTTP动作操作资源

HTTP动词如下:

- POST  创建资源
- PUT   修改资源
- GET   获取资源
- DELETE  删除资源

返回相对应的响应码

- 404 - 资源未找到
- 400 - 请求的地址不存在或者包含不支持的参数 (Bad request)
- 200 - get请求成功
- 201 - post请求成功
- 202 - put请求成功
- 401 - 未授权
- 403 - 资源被禁止访问
- 404 - 请求的资源不存在    
- 405 - 方法不允许(Method Not Allowed)
- 409 - 冲突
- 500 - 服务器未知错误

URL语义明确,API要有版本控制

### 学习RESTFul API
案例:

- 豆瓣API

- GITHUB开发者 API