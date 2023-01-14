<?php

require_once 'config.php';

if(count($_POST) > 0) {
    if(isset($_POST['username'])) {
        $username = $_POST['username'];
    }
    if(isset($_POST['password'])) {
        $password = $_POST['password'];
    }
    // array = [] | object = {}
    if($username == "" || $password == "") {
        $response = [
            'code' => 401,
            'message' => 'Invalid username or password is empty.',
        ];
        // echo $response; die;
        json_response($response);
    }
    
    $sql = "SELECT * FROM user_accounts WHERE username = '$username' AND PASSWORD = '$password' LIMIT 1";
    $result = db_all($conn, $sql);
    // print_r เฉพาะข้อมูล array, object
    // var_dump(); คล้าย ๆกับ print_r
    // echo 'abc';
    if(count($result) > 0) {
        $response = [
            'code' => 200,
            'message' => 'Success',
            'result' => $result[0],
        ];
        json_response($response);
    } else {
        $response = [
            'code' => 402,
            'message' => 'Failed',
        ];
        json_response($response);
    }
}
?>