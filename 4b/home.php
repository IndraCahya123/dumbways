<?php
session_start();

if (isset($_SESSION['login'])) {
    echo ("<script>
        alert('Sudah Login');
        document.location.href = 'index.php';
    </script>");
}

require './controller.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $searchUser = mysqli_query($conn, "SELECT * FROM user WHERE name = '$username';");

    
    if (mysqli_num_rows($searchUser) === 1) {
        $row = mysqli_fetch_assoc($searchUser);
        $_SESSION['login'] = true;

        if (password_verify($password, $row['password'])) {
            header("Location: index.php");
            exit;
        }
    }

    echo ("<script>
        alert('Username / Password salah');
    </script>");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dumbways</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container p-3 d-flex flex-column align-items-center justify-content-center" style="width: 80%;">
        <div class="welcome-message w-100 text-center mt-4">
            <h1>Welcome</h1>
            <p>Login to explore more!</p>
        </div>
        <div class="login-form">
            <div class="card">
                    <form action="" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Username</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Password</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="password" placeholder="Username">
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                            <a href="./register.php">Register</a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>