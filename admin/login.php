<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- CSS Style -->
    <link rel="stylesheet" href="css/login.css">

    <title>Login</title>
</head>
<body>
    <main class="login-container">
        <div class="container">
            <div class="row page-login align-items-center">
                <div class="section-left col-md-6">
                    <img src="asset/cover-login.png" alt="cover-login" width="400px">
                </div>
                <div class="section-right col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="asset/logo1.png" alt="logo-login" class="w-50 mb-4">
                            </div>
                            <?php
                            if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                            {
                                echo '<h6 class="text-dark text-center" style="font-size: 12px"> '.$_SESSION['status'].' </h6>';
                                unset($_SESSION['status']);
                            };
                            ?>
                            <form action="code.php" method="POST">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="username" name="username" class="form-control" id="username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input">
                                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                </div>
                                <button type="submit" name="login" class="btn">Sign In</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Custom JavaScript -->
    <script src="js/admin.js"></script>
</body>
</html>