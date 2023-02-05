<?php
    session_start();
    include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <script src="login.js"></script>
</head>
<body>
    <div class="bg">
        <nav>
            <img src="assets\automobile.png" alt="ini-logo">
            <ul>
                <li><a href="welcome.php">Home</a></li>
                <li><a href="search.php">Search</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="dealer.php">Dealer</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
        <form method="POST">
            <div class ="tampilan-menu">
                <div class="gambar">
                    <img src="assets\login-page.png" alt="">
                </div>
                <div class="login-page">
                    <div class="login">Login</div>
                    <div class="unp">
                        <div class="username">
                            <label>Username</label>
                            <input type="text" name="uname" placeholder ="Type your username" required>
                        </div>
                        <div class="password">
                            <label >Password</label>
                            <input id="password-input" type="password" name="pass" placeholder="Type your password" required>
                        </div>
                    </div>
                   <button class="login-button" type="submit" name="login">Login</button>
                </div>
            </div>
        </form>


        <?php
            if(isset($_POST['login'])){
                $uname = $_POST['uname'];
                $pass = $_POST['pass'];

                $query = $conn_pusat->query("SELECT * FROM customer_acc WHERE username='$uname' AND password='$pass'");
                $result = mysqli_num_rows($query);

                if($result == 1){
                    $data = $query->fetch_assoc();

                    $_SESSION['user'] = $data;
                    echo '<script>
                        window.location="user.php";
                    </script>';
                }
            }
        ?>

    </div>
</body>
</html>