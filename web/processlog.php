<?php

require_once 'config/config.php';

// if(isset($_POST['send'])) {

// }
$success = "";
$error = "";
if(count($_POST) > 0) {
    // $username = isset($_POST['username']) ? $_POST['username'] : '';
    // $password = isset($_POST['password']) ? $_POST['password'] : '';
    if(isset($_POST['username'])) {
        $username = $_POST['username'];
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
    $res = json_decode($response, true);
    // echo '<pre>';
    // print_r($res); die;
    if(!is_array($res)) {
        echo '<script>
            alert("Response is not JSON");
            window.location.href = "login.php";
        </script>';
    }

    if($res['code'] == 200) {
        // $success = "successfully logged";
        // header('location: index.php');
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
