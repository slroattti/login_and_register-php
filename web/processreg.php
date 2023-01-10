<?php 
require_once 'config/config.php';
if(count($_POST) > 0) {
    //basic configuration
    if(isset($_POST['firstname'])) {
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
    $address = isset($_POST['address']) ? $_POST['address'] : '';

    if(
        $firstname == '' ||
        $lastname == '' ||
        $email == '' ||
        $username == '' ||
        $password == '' ||
        $comfirm_password == '' ||
        $address == ''
    ){
        echo '<script>
            alert("Please enter input your is empty.");
            window.location.href = "register.php";
        </script>';
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>
            alert("Invalid email address incorrect.");
            window.location.href = "register.php";
        </script>';
    }
    if($password != $comfirm_password) {
        echo '<script>
            alert("Password and Comfirm password is not match.");
            window.location.href = "register.php";
        </script>';
    }

    $url = API_URL . 'registerapi.php';
    $data = [
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'username' => $username,
        'password' => $password,
        'comfirm_password' => $comfirm_password,
        'phone' => $phone,
        'address' => $address,
    ];
    $response = curl_post($url, $data);
    $res = json_decode($response, true);

    if(!is_array($res)) {
        echo '<script>
            alert("Response is not JSON");
            window.location.href = "register.php";
        </script>';
    }

    if($res['code'] == 200) {
        echo '<script>
            alert("Successfully registered");
            window.location.href = "login.php";
        </script>';
    } else {
        echo '<script>
            alert("Failed registered");
            window.location.href = "register.php";
        </script>';
    }
}

?>