
<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "uas");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = $koneksi->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    
    if ($result->num_rows > 0) {
        $_SESSION["loggedin"] = true;
        $_SESSION["email"] = $email;

        setcookie("users_email", $email, time() + (30 * 24 * 60 * 60), "/"); 
        header("Location: index.php");
        exit;
    } else {
        $error = "Email atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Login</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= isset($_COOKIE['users_email']) ? $_COOKIE['users_email'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
