<?php
    include_once "config.php";
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    function UpdateMysql($token, $_trait, $dbconfig){

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
        //mysqli_query($conn, "SELECT * FROM `user`");
        //到此應該要成功連線資料庫

        //進行JSON解析
        $trait_arr = json_decode($_trait);

        $update_sql  = "UPDATE `result` SET `count` = `count` + 1 WHERE `result`.`token` = '$token'";
        mysqli_query($conn, $update_sql);
	
        foreach ($trait_arr as $value) {
            $sql = "UPDATE `result` SET `$value` = `$value` + 1 WHERE `result`.`token` = '$token'";
            //print($sql);
            $result = mysqli_query($conn, $sql);
        }
	
        mysqli_close($conn);
	    exit("{\"success\":\"true\",\"token\":\"$token\",\"coding\":\"unicode\"}");
    }

    if ($_POST['token'] && $_POST['trait']) {
        $token = $_POST['token'];
        $_trait = $_POST['trait'];
        UpdateMysql($token,$_trait,$dbconfig);
    } else {
        exit("{\"success\":\"false\",\"error\":\"Arguments error.\",\"coding\":\"unicode\"}");
    };
?>
