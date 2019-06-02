<?php
    include_once "config.php";
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    //SELECT * FROM `result` WHERE `token` = '10293c8c2a61cd2ef9684e2f41e529a9'
    function GetResult($token,$mode,$dbconfig){
        $conn = mysqli_connect( $dbconfig["host"], $dbconfig["user"], $dbconfig["passwd"]);
        if (empty($conn)){
            print mysqli_error($conn);
            die ("{\"success\":\"false\",\"error\":\"Can not connect to database.\",\"coding\":\"unicode\"}");
            exit;
        }

        if( !mysqli_select_db($conn, $dbconfig["name"])) {
            die ("{\"success\":\"false\",\"error\":\"Batabase setting error.\",\"coding\":\"unicode\"}");
        }

        // 設定連線編碼
        mysqli_query( $conn, "SET NAMES 'utf8'");

        if($mode == "result"){
            // 選擇資料表
            //mysqli_query($conn, "SELECT * FROM `user`");

            $sql = "SELECT * FROM `result` WHERE `token` = '$token'";
            $result = mysqli_query($conn, $sql);

            //有value的變數存進arr
            $arr=array();

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $arr = $row;
            }

            $ReturnArray = array();
            foreach($arr as $key => $value) {
                if($value != 0 && $key != "id" && $key != "token"){
                    array_push($ReturnArray,$key);
                }
            }

            mysqli_close($conn);
            return $ReturnArray;
        }
        elseif($mode == "user"){
            // 選擇資料表
            //mysqli_query($conn, "SELECT * FROM `user`");

            $sql = "SELECT * FROM `user` WHERE `token` = '$token'";
            $result = mysqli_query($conn, $sql);
 
            //有value的變數存進arr
            $arr=array();
 
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                 $arr = $row;
            }
 
            return json_decode($arr["traits"]);
        }
    }

    function Process($UserArray,$ResultArray,$token){
	$openMe = array_intersect($UserArray,$ResultArray);
	$hiddenMe = array_values(array_diff($UserArray,$ResultArray));
	$cantSeeMe = array_values(array_diff($ResultArray,$UserArray));

	
	$resultArray = array("success"=>"true","token"=>$token,"coding"=>"unicode","openMe"=>$openMe,"hiddenMe"=>$hiddenMe,"cantSeeMe"=>$cantSeeMe,"unknownMe"=>"");

/*	echo "<br/>開放我：";
	print_r($openMe);
	echo "<br/>隱藏我：";
	print_r($hiddenMe);
        echo "<br/>盲目我：";
	print_r($cantSeeMe);*/
	return json_encode($resultArray);
    }

    if ($_GET['token']) {
        $token =  $_GET['token'];
	    print(htmlspecialchars(Process(GetResult($token,"user",$dbconfig),GetResult($token,"result",$dbconfig),$token)));//htmlspecialchars 防範 XSS
    } else {
        exit("{\"success\":\"false\",\"error\":\"Arguments error.\",\"coding\":\"unicode\"}");
    };
?>
