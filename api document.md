# API v1 Document

### API Endpoint
``` https://csmu.oxygentw.net/tools/ap-apiv1 ```

> 注意 送到API的資料必須全部使用半形引號```"```  **而非全形**```”``` <br/>
> 送入錯誤字元會導致資料比對出現```null```
## 新增使用者
```/POST /new```
```
data:{
    nickname:string,  
    trait:JSON-LIST
}
```

Example:
```
data:{
    nickname:"USER124",  
    trait:["開朗","樂觀"]
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

Example:
```
data:{
    token:"86e1507e5d6a666e24a91e269833d858",  
    trait:["壓抑","悲觀"]
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
