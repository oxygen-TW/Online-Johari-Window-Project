## API Document

### API Endpoint
``` https://home.oxygentw.net/tools/ap-api ```

### 新增使用者
```/POST /new```
```
data: 
    nickname(string)    
    trait(JSON list)
```

### 用戶回應
```/POST /add```
```
data: 
    token(string)    
    trait(JSON list)
```

### 取得結果
```/POST /result```
```
data: 
    token(string)    
```