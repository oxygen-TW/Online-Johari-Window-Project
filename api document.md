# API v1 Document

## API Endpoint
``` https://csmu.oxygentw.net/tools/ap-apiv1 ```

## 新增使用者
```/POST /new```
```
data:{
    nickname:string,  
    trait:JSON-LIST
}
```

## 用戶回應
```/POST /add```
```
data:{
    token:string,  
    trait:JSON-LIST
}
```

## 取得結果
```/POST /result```
```
data:{
    token:string    
}
```

## Config.php
> 將 `config.php.example` 修改並改名為 `config.php` 移動到 api 目錄
```php
<?php
$dbconfig= array(
	"name"=>"DBNAME",
	"user"=>"USERNAME",
	"passwd"=>"DBPASSWORD",
	"host"=>"DBHOST"
	);
?>
```