<?php

require 'function.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <!-- font google -->
     <link rel="preconnect" href="https://font.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own css -->
    <link rel="stylesheet" href="css/syle.css">

    <title>Register</title>
</head>
   
<body class="body2">
     <!-- navbar -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-center">
        <div class="container">
            <a class="navbar-brand" href="index.php">DATA SMKN 1 PETIR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- close navbar -->

    <div class="container" style="margin-left: 50px; width: 60%; margin-top: 80px;">
        <div class=" row my-5">
            <div class="col-md-6 text-center login" style="background-image: url('img/bob.jpg');  width: 350px; height: 400px; border-radius: 10px; background-size: cover; background-repeat: no-repeat; background-position: center; background-attachment: fixed;">
            <h4 class="fw-bold " style="margin-top: 40px; padding-top: 40px;" >Register | Admin</h4>
            <!-- ini error jika tidak bisa register -->
            <?php if (isset($error)) : ?>
                <?php echo '<script>alert("Username atau password sudah di gunakan!");</script>'; ?>
            <?php endif; ?>
            <form action="prosesregister.php" method="post" style="margin-top: 30px; margin-left: -120px; margin-right: -120px;">
                <div class="form-group user">
                    <input type="text" class="form-control w-50" placeholder="Masukkan Username" name="username" autocomplete="off" style="height: 50px; width: 400px; border-radius: 10px;" required>
                </div>
                <div class="form-group my-5">
                    <input type="password" class="form-control w-50" placeholder="Masukkan Password" name="password" autocomplete="off" required style="height: 50px; width: 400px; border-radius: 10px; margin-top: -27px;">
                </div>
                <button class="btn btn-primary text-uppercase" type="submit" name="register" style="margin-top: -5px; margin-left: -10px; border-radius: 5px;">Register</button>
            </form> 
        </div>        
    </div>
 </div>
    
</body>
</html>