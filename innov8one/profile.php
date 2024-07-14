<?php
include("connection.php");
session_start();

// Fetch user information from database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM signup WHERE id='$user_id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = $_POST['phone'];
    $comment = $_POST['comment'];
    $hobbies = $_POST['hobbies'];
    $photo = '';

    if (!empty($_FILES['photo']['name'])) {
        $photo = $_FILES['photo']['name'];
        $target = "uploads/" . basename($photo);
        move_uploaded_file($_FILES['photo']['tmp_name'], $target);
    }

    $sql = "UPDATE signup SET phone='$phone', comment='$comment', hobbies='$hobbies', photo='$photo' WHERE id='$user_id'";
    mysqli_query($conn, $sql);

    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile - Novate</title>
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
            <section id="profile">
                <h2>Profile</h2>
                <form action="profile.php" method="POST" enctype="multipart/form-data">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" disabled>
                    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" disabled>
                    
                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" value="<?php echo $user['phone']; ?>">
                    
                    <label for="comment">Comment:</label>
                    <textarea id="comment" name="comment"><?php echo $user['comment']; ?></textarea>
                    
                    <label for="hobbies">Hobbies:</label>
                    <input type="text" id="hobbies" name="hobbies" value="<?php echo $user['hobbies']; ?>">
                    
                    <label for="photo">Photo:</label>
                    <input type="file" id="photo" name="photo">
                    
                    <button type="submit">Update Profile</button>
                </form>
            </section>
        </main>
        <footer id="footer">
            <p>Contact Us: omniaeshra@ejust.edu.eg | Phone: 01283940186</p>
        </footer>
    </div>
</body>
</html>