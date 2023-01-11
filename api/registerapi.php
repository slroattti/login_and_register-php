<?php
require_once 'config.php';

if (count($_POST) > 0) {
    if (isset($_POST['firstname'])) {
        $firstname = $_POST['firstname'];
    }
    //ternary configuration
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $comfirm_password = isset($_POST['comfirm_password']) ? $_POST['comfirm_password'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';

    if (
        $firstname == '' ||
        $lastname == '' ||
        $email == '' ||
        $username == '' ||
        $password == '' ||
        $comfirm_password == '' ||
        $address == ''
    ) {
        $response = [
            'code' => 401,
            'message' => "Invalid input is empty.",
        ];
        json_response($response);
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = [
            'code' => 402,
            'message' => 'Invalid email address is incorrect.',
        ];
        json_response($response);
    }
    if ($password != $comfirm_password) {
        $response = [
            'code' => 403,
            'message' => "Password and Comfirm password is not match.",
        ];
        json_response($response);
    }
    // Query ออกมาดูว่ามีข้อมูลของ user ที่สมัครอยู่รึป่าว
    $sql = "SELECT username 
    FROM user_accounts 
    WHERE username = " . "'$username'" . " LIMIT 1";
    $result = db_all($conn, $sql);
    // ถ้าไม่มี ก็ให้ Insert data
    if (count($result) == 0) {
        $sql = "INSERT INTO user_accounts (username, password, datetime)
        VALUES ('$username', '$password', now())";
        $result = $conn->exec($sql);
        // print_r($result); die;
        //ถ้ามีข้อมูลมาก็ให้ insert next database
        if ($result > 0) {
            $sql = "INSERT INTO user_infos (firstname, lastname, email, phone, address, datetime)
                    VALUES ('$firstname', '$lastname', '$email', '$phone', '$address', now())";
            $result = $conn->exec($sql);
            // print_r($result[0]); die;
            if ($result > 0) {
                $response = [
                    'code' => 200,
                    'message' => 'Success',
                ];
                json_response($response);
            } else {
                $response = [
                    'code' => 405,
                    'message' => 'Failed',
                ];
                json_response($response);
            }
        } else {
            $response = [
                'code' => 404,
                'message' => 'Result is empty.',
            ];
            json_response($response);
        }
    } else {
        $response = [
            'code' => 502,
            'message' => 'Invalid username is Duplicated!',
        ];
        json_response($response);
    }
}
