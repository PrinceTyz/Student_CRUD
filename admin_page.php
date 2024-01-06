<?php
session_start();
require_once "config/dbcon.php"; 

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

   
    $sql = "SELECT * FROM admin_users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        // Verify the provided password against the stored password
        if ($password === $stored_password) {
            // Password is correct, create a session and redirect to the admin dashboard
            $_SESSION['admin_users'] = $username;
            header("Location: index.php");
            exit;
        } else {
            $error_message = "Invalid username or password.";
        }
    } else {
        $error_message = "User not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Admin page</title>
</head>

<body>
    <div class="mt-5 my-5 container w-50 custom-form border border-warning">
        <div class="row">
            <div style="background-color: green" class="col-md-6 p-5 left-side-column">
                <h3 id="welcomeMessage" class="text-white">HI! Welcome</h3><br>
                <p class="text-white">Welcome to our student portal. Our Student Portal provides a
                    central hub for students to access various academic resources.</p>
            </div>
            <div class="col-md-6 p-5">
                <div class="login-form">
                    <h2 class="text-center my-5" style="color: black;">Administrator</h2>
                    <?php if (isset($error_message)) {
                        echo '<p class="error">' . $error_message . '</p>';
                    } ?>
                    <form action="" method="post" class="p-2">
                        <div class="form-group">
                            <label class="form-label" for="Username">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="Username">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group text-center py-4">
                            <button class="btn btn-success" type="submit" name="login">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <video autoplay muted loop id="video-bg">
        <source src="assets/BASC-bg.mp4" type="video/mp4">
    </video>

    <script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>

</html>
<style>
    #video-bg {
        position: fixed;
        right: 0;
        bottom: 0;
        min-width: 100%;
        min-height: 50%;
        width: auto;
        height: auto;
        z-index: -100;
        background-size: cover;
        opacity: 70%;
    }

    .left-side-column {
        background-image: url('assets/BASC-logo.png');
        background-size: auto 50%;
        background-repeat: no-repeat;
        background-position: center bottom;
    }

    .custom-form {
        border-radius: 15px;
        overflow: hidden;
    }
    
</style>