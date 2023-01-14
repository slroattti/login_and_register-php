<?php 
require_once 'config.php';
// print_r($_POST); die;
if(count($_GET) > 0) {
    $username = isset($_GET['username']) ? $_GET['username'] : '';

    if($username == '') {
        $response = [
            'code' => 400,
            'message' => 'Invalid username is empty.',
        ];
        json_response($response);
    }

    $sql = 'SELECT username FROM user_accounts WHERE username = ' . "'$username'" . ' LIMIT 1';
    // echo $sql; die;
    $result = db_all($conn, $sql);
    if(count($result) > 0) {
        $sql = 'SELECT * FROM user_infos ORDER BY id LIMIT 1';
        $result = db_all($conn, $sql);
        if(count($result) > 0){
            $response = [
                'code' => 200,
                'message' => 'Successfully',
                'result' => $result,
            ];
            json_response($response);
        } else {
            $response = [
                'code' => 401,
                'message' => 'Failed',
            ];
            json_response($response);
        }
    } else {
        $response = [
            'code' => 404,
            'message' => 'Result not found.',
        ];
        json_response($response);
    }
}

?>