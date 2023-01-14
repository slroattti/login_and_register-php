<?php

require_once 'config/config.php';

// if(isset($_POST['send'])) {
// echo '<pre>';
// print_r($_POST); die;
// print_r('จำนวนที่ $_POST จากหน้า form มีการส่งข้อมูลมาก : ' . count($_POST)); die;
// }

if(isset($_POST['send']) && count($_POST) > 0) {
    //Ternary Operators if and else : ตัวแปล = condition(เงื่อนไข) ?(true) เก็บค่าที่ส่งมา :(false) ค่าว่างหรืออื่นๆ 
    // $username = isset($_POST['username']) ? $_POST['username'] : '';
    // $password = isset($_POST['password']) ? $_POST['password'] : '';
    if(isset($_POST['username'])) {
        $username = $_POST['username'];
        // echo 'ค่าของ : ' . $username; die;
        if($username == '') {
            echo '<script>
            alert("Please enter your username!");
            window.location.href = "login.php";
        </script>';
        }
    }
    if(isset($_POST['password'])) {
        $password = $_POST['password'];
        if($password == '') {
            echo '<script>
            alert("Please enter your password!");
            window.location.href = "login.php";
        </script>';
        }
    }
    
    $url = API_URL . "loginapi.php";
    // echo $url; die;
    $data = [
        'username' => $username,
        'password' => $password,
    ];
    $response = curl_post($url, $data);
    // print_r($response); die;
    // json_decode = string to json object
    // json_encode = json object to string
    $res = json_decode($response, true);
    // print_r($res); die;
    $data = $res['result'];
    // echo '<pre>';
    // print_r($data); die;
    if(!is_array($res)) {
        echo '<script>
            alert("Response is not JSON");
            window.location.href = "login.php";
        </script>';
    }

    if($res['code'] == 200) {
        // $success = "successfully logged";
        // header('location: index.php');
        $_SESSION['username'] = $data['username'];
        echo '<script>
            alert("Successfully logged");
            window.location.href = "index.php";
        </script>';
    } else {
        // $error = "Login failed";
        // header('location: login.php');
        echo '<script>
            alert("Failed logged");
            window.location.href = "login.php";
        </script>';
    }

}
