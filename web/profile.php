<?php
require_once 'config/config.php';

$url = API_URL . 'getuser.php?username=' . $_SESSION['username'];
// echo $url; die;
$response = curl_get($url);
$res = $response->result;
$profile = $res[0];
// echo '<pre>';
// print_r($res[0]); die;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container w-50">
        <h1 class="text-info fs-1 mt-3">Register</h1>
        <hr>
        <?php if(isset($_SESSION['username'])) : ?>
            <form action="processreg.php" method="post">
                <div class="mb-3">
                    <label for="Username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $_SESSION['username']; ?>" aria-describedby="username" disabled>
                </div>
                <div class="mb-3">
                    <label for="Firstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control" name="firstname" value="<?php echo $profile->firstname; ?>" aria-describedby="firstname" disabled>
                </div>
                <div class="mb-3">
                    <label for="Lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" name="lastname" value="<?php echo $profile->lastname; ?>" aria-describedby="lastname" disabled>
                </div>
                <div class="mb-3">
                    <label for="Phone" class="form-label">Phone</label>
                    <input type="number" class="form-control" name="phone" value="<?php echo $profile->phone; ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="Address" class="form-label">Address</label>
                    <input type="text" name="address" value="<?php echo $profile->address; ?>" disabled>
                </div>
                <button type="submit" name="send" class="btn btn-info form-control">Sign Up</button>
            </form>
        <?php else : 
                echo 'Not Found';
            endif;
        ?>
    </div>
</body>
</html>