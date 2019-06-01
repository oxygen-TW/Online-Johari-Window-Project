## API Document

### API Endpoint
``` https://home.oxygentw.net/tools/ap-apiv1 ```

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
Example:
```
data:{
    token:"86e1507e5d6a666e24a91e269833d858" 
}