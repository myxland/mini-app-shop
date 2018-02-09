 小程序商城API文档
===========

## 获取Banner接口

测试域名:mini.app
正式域名:******

- 接口地址: api/:version/banner
- 请求方式: GET
- http响应码: 200(成功响应)/400(资源未找到)
- 接口返回
```
{
	"code": 0,
	"message": "return successfully!",
	"data": {
		"id": 1,
		"position": "index_top",
		"description": "首页轮播图",
		"items": [{
			"keyword": "6",
			"type": 1,
			"img": {
				"url": "http:\/\/mini.app\/banner-4a.png"
			}
		}, {
			"keyword": "25",
			"type": 1,
			"img": {
				"url": "http:\/\/mini.app\/banner-2a.png"
			}
		}, {
			"keyword": "11",
			"type": 1,
			"img": {
				"url": "http:\/\/mini.app\/banner-3a.png"
			}
		}, {
			"keyword": "10",
			"type": 1,
			"img": {
				"url": "http:\/\/mini.app\/banner-1a.png"
			}
		}]
	}
}
```


