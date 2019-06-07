<?php
    include_once "../config.php";
    //error_reporting(E_ALL);
    //ini_set('display_errors', 1);
    header('Access-Control-Allow-Origin:*');
    $output_valve = 0.5;

    //SELECT * FROM `result` WHERE `token` = '10293c8c2a61cd2ef9684e2f41e529a9'
    function GetResult($token,$mode,$dbconfig,$output_valve){
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
            //print($sql);
            //有value的變數存進arr
            $arr=array();
            $nums=mysqli_affected_rows($conn);

            if($nums <= 0){
                die("{\"success\":\"false\",\"error\":\"Token not found.\",\"coding\":\"unicode\"}");
            }

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $arr = $row;
                //echo "loop";
                //print_r($row);
            }

            $ReturnArray = array();
            $totalCount = 0;
            foreach($arr as $key => $value) {
                if($key == "count"){
                    $totalCount = $value;
                }
                if(($value/$totalCount) >= $output_valve && $key != "id" && $key != "token" && $key != "count"){
                        print($value.":".$output_valve.":".($value/$totalCount)." ");
                        array_push($ReturnArray,$key);
                }
            }

            //print_r($ReturnArray);
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

            //var_dump($arr);
            //print_r($arr["traits"]);
            return json_decode($arr["traits"]);
        }
    }

    function Process($UserArray,$ResultArray,$token){
        $openMe = array_values(array_intersect($UserArray,$ResultArray));
        $hiddenMe = array_values(array_diff($UserArray,$ResultArray));
        $cantSeeMe = array_values(array_diff($ResultArray,$UserArray));

        //print_r($UserArray);
        //print_r($ResultArray);
        $resultArray = array("success"=>"true","token"=>$token,"coding"=>"unicode","openMe"=>$openMe,"hiddenMe"=>$hiddenMe,"cantSeeMe"=>$cantSeeMe,"unknownMe"=>"");

/*      echo "<br/>開放我：";
        print_r($openMe);
        echo "<br/>隱藏我：";
        print_r($hiddenMe);
        echo "<br/>盲目我：";
        print_r($cantSeeMe);*/
        return json_encode($resultArray,JSON_UNESCAPED_UNICODE);
    }

    header("Access-Control-Allow-Origin:*");
    if ($_POST['token']) {
        $token =  $_POST['token'];
            print(htmlspecialchars(Process(GetResult($token,"user",$dbconfig,0.5),GetResult($token,"result",$dbconfig,0.5),$token)));//htmlspecialchars 防範 XSS
    } else {
        exit("{\"success\":\"false\",\"error\":\"Arguments error.\",\"coding\":\"unicode\"}");
    };
?>
