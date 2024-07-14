<?php
    include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up - Novate</title>
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
            <section id="signup">
                <h2>Sign Up</h2>
                <table>
                    <!-- <caption>Sign Up Form</caption> -->
                    <form action="signupp.php" method="POST">
                        <tr>
                            <td><label for="username">Username:</label></td>
                            <td><input type="text" id="username" name="username" required></td>
                        </tr>
                        <tr>
                            <td><label for="password">Password:</label></td>
                            <td><input type="password" id="password" name="password" required></td>
                        </tr>
                        <tr>
                            <td><label for="email">Email:</label></td>
                            <td><input type="email" id="email" name="email" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit" name ="submit">Sign Up</button></td>
                        </tr>
                    </form>
                </table>
                <p>Already have an account? <a href="signin.php">Sign In</a></p>
            </section>
        </main>
        <footer id="footer">
            <p>Contact Us: omniaeshra@ejust.edu.eg | Phone: 01283940186</p>
        </footer>
    </div>
</body>
</html>