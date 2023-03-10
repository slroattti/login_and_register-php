<?php require_once 'config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container w-50">
        <h1 class="text-success fs-1 mt-3">Log In</h1>
        <hr>
        <!-- action คือ เมื่อทำการกดปุ่ม submit or button มันจะทำการ redirect ไปหาไฟล์ที่เราตั้งไว้ -->
        <form action="processlog.php" method="post">
            <div class="mb-3">
                <label for="Username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" aria-describedby="username">
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <input name="send" class="btn btn-primary form-control" type="submit" value="Sign In">
            <!-- <button type="submit"  >Sign IN</button> -->
        </form>
        <hr>
        <p>If you not has been accout <a href="<?php echo BASE_URL; ?>register.php">Click</a> register</p>
    </div>

</body>

</html>