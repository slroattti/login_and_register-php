<?php require_once 'config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="container w-50">
        <h1 class="text-info fs-1 mt-3">Register</h1>
        <hr>
        <form action="processreg.php" method="post">
            <div class="mb-3">
                <label for="Firstname" class="form-label">Firstname</label>
                <input type="text" class="form-control" name="firstname" aria-describedby="firstname">
            </div>
            <div class="mb-3">
                <label for="Lastname" class="form-label">Lastname</label>
                <input type="text" class="form-control" name="lastname" aria-describedby="lastname">
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="email">
            </div>
            <div class="mb-3">
                <label for="Username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" aria-describedby="username">
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <label for="Comfirm Password" class="form-label">Comfirm Password</label>
                <input type="password" class="form-control" name="comfirm_password">
            </div>
            <div class="mb-3">
                <label for="Phone" class="form-label">Phone</label>
                <input type="number" class="form-control" name="phone">
            </div>
            <div class="mb-3">
                <label for="Address" class="form-label">Address</label>
                <textarea name="address" class="form-control" cols="30" rows="5"></textarea>
            </div>
            <button type="submit" name="send" class="btn btn-info form-control">Sign Up</button>
            <hr>
            <p>If you has been accout <a href="<?php echo BASE_URL; ?>login.php">Click</a> login</p>
        </form>
    </div>

</body>
</html>