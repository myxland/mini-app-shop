Nginx隐藏index.php:
```
location / {
  if (!-e $request_filename) {
      rewrite  ^(.*)$  /index.php?s=/$1  last;
      break;                                                          
  }    
}   

```

让nginx处理php脚本:
```
location ~ \.php$ {
    fastcgi_pass   127.0.0.1:9000;
    fastcgi_index  index.php;
    fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
    include        fastcgi_params;
}
   
```