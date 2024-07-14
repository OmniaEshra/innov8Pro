<?php
include("connection.php");

$sql = "SELECT * FROM signup";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Records - Novate</title>
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
            <section id="records">
                <h2>All Records</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </table>
            </section>
        </main>
        <footer id="footer">
            <p>Contact Us: omniaeshra@ejust.edu.eg | Phone: 01283940186</p>
        </footer>
    </div>
</body>
</html>