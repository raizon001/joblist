<?php
session_start();

// Hardcoded admin credentials for demonstration purposes
$host = "localhost";
$user = "root";
$password = "";
$db = "user";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
    $result = mysqli_query($data, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);

        if ($row) {
            if ($row["usertype"] == "user") {
                $_SESSION["username"] = $username;
                header("location:userhome.php");
            } elseif ($row["usertype"] == "admin") {
                $_SESSION["username"] = $username;
                header("location:adminhome.php");
            } else {
                echo "Invalid usertype";
            }
        } else {
            echo "Username or password incorrect";
        }
    } else {
        echo "Query execution error: " . mysqli_error($data);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelog.css" />
    <title>Login Form</title>
</head>
<body>
    <main>
        <header>
            <img src="lag.png" alt="logo">
        </header>
        <main>
            <div class="Form-box">
                <form class="Login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h1>Admin Login</h1>
                    <div class="input-box">
                        <input type="text" name="username" required>
                        <label>User:</label>
                        <ion-icon name="mail-outline"></ion-icon>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" required>
                        <label>Pass:</label>
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </div>
                    <div class="checkbox">
                        <span>
                            <input type="checkbox" id="login-checkbox">
                            <label for="login-checkbox">Remember Me</label>
                        </span>
                        <h5>Forget password ?</h5>
                    </div>
                    <button type="submit" class="submit-btn">Submit</button>
                    <div class="goback-buttons">
                        <a href="index.html" class="goback-button">Go Back &#x2190</a></h5>
                    </div>
                </form>
            </div>
            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
            <script src="script.js"></script>
        </main>
    </main>
</body>
</html>
