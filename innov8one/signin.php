<?php
include("connection.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM signup WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: profile.php");
        exit();
    } else {
        echo '<script>
            alert("Invalid username or password. Please try again or sign up.");
            window.location.href="signin.php";
        </script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign In - Novate</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1 id="company"><i>Novate</i></h1>
            <nav>
                <div class="nav-left">
                    <a href="dashboard.php" id="dash">Dashboard</a>
                </div>
                <div class="nav-right">
                    <a href="about.php">About</a>
                    <a href="signin.php">Sign In</a>
                    <a href="#footer">Contact Us</a>
                </div>
            </nav>
        </header>
        <main>
            <section id="signin">
                <h2>Sign In</h2>
                <form method="POST">
                    <table>
                        <caption>Sign In Form</caption>
                        <tr>
                            <td><label for="username">Username:</label></td>
                            <td><input type="text" id="username" name="username" required></td>
                        </tr>
                        <tr>
                            <td><label for="password">Password:</label></td>
                            <td><input type="password" id="password" name="password" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit">Sign In</button></td>
                        </tr>
                    </table>
                </form>
                <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
            </section>
        </main>
        <footer id="footer">
            <p>Contact Us: omniaeshra@ejust.edu.eg | Phone: 01283940186</p>
        </footer>
    </div>
</body>
</html>