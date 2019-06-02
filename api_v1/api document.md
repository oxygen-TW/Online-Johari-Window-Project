# API v1 Document

### API Endpoint
``` http://csmu.oxygentw.net/tools/ap-apiv1 ```

> 注意 送到API的資料必須全部使用半形引號```"```  **而非全形**```”``` <br/>
> 送入錯誤字元會導致資料比對出現```null```

---

## 新增使用者
```/POST /new/```
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

Response:
```
{"success":"true","token":"ec6dc5b250d6c282014f67bb62be5aea","coding":"unicode"}
```
- success: true/false | 請求是否成功
- token: string | 系統回應的 token
- coding: string | API回應採用的編碼

<br/>

## 用戶回應
```/POST /add/```
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

Response:
```
{"success":"true","token":"ec6dc5b250d6c282014f67bb62be5aea","coding":"unicode"}
```
- success: true/false | 請求是否成功
- token: string | 成功寫入資料的 token
- coding: string | API回應採用的編碼

<br/>

## 取得結果
```/POST /result/```
```
data:{
    token:string    
}
```

Response:
```
{"success":"true","token":"ec6dc5b250d6c282014f67bb62be5aea","coding":"unicode","openMe":[],"hiddenMe":["開朗","樂觀"],"cantSeeMe":["悲觀","壓抑"],"unknownMe":""}
```
- success: true/false | 請求是否成功
- token: string | 系統回應的 token
- coding: string | API回應採用的編碼
- openMe: JSON-LIST | 該 token 的開放我
- hiddenMe: JSON-LIST | 該 token 的隱藏我
- cantSeeMe: JSON-LIST | 該 token 的盲目我
- unknownMe: JSON-LIST | 該 token 的未知我

<br/>

## Config.php
> 將 `config.php.example` 內容修改並改名為 `config.php` 移動到 api 的上層目錄
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
