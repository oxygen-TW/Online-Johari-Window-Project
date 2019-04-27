<?php
    include_once "config.php";
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    function Mysql($nickname, $token, $_trait, $dbconfig){
	    $token = md5(uniqid (rand()));

        $conn = mysqli_connect( $dbconfig["host"], $dbconfig["user"], $dbconfig["passwd"]);
        if (empty($conn)){
            print mysqli_error($conn);
            die ("無法連結資料庫");
            exit;
        }

        if( !mysqli_select_db($conn, $dbconfig["name"])) {
            die ("無法選擇資料庫");
        }

        // 設定連線編碼
        mysqli_query( $conn, "SET NAMES 'utf8'");
        // 選擇資料表
        mysqli_query($conn, "SELECT * FROM `user`");

        $sql = "INSERT INTO `user` (`id`, `create_time`, `token`, `nickname`, `traits`) VALUES (NULL, CURRENT_TIMESTAMP, '$token', '$nickname', '$_trait');";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
    }

        function AddCookie($token){
            //1 day, 
            setcookie("_token",$token,time()+3600*24);
        }

    if ($_POST['nickname'] && $_POST['trait']) {
        $nickname = $_POST['nickname'];
        $_trait = $_POST['trait'];
        $token =  md5(uniqid (rand()));
        Mysql($nickname,$token,$_trait,$dbconfig);
        AddCookie($token);
        exit("{\"success\":\"true\",\"token\":\"$token\",\"coding\":\"unicode\"}");
    } else {
        exit("{\"success\":\"false\",\"error\":\"Arguments error.\",\"coding\":\"unicode\"}");
    };
?>
