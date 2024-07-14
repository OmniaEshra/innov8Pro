<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "select * from signup where username='$username'";
        $result = mysqli_query($conn, $sql);
        $count_user = mysqli_num_rows($result);
        $sql = "select * from signup where email='$email'";
        $result = mysqli_query($conn, $sql);
        $count_email = mysqli_num_rows($result);
        if($count_user == 0 & $count_email == 0){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO signup(username, email, password) VALUES('$username' , '$email' , '$hash')";
            $result = mysqli_query($conn, $sql);
            if($result){
                header("Location: about.php");
            }
        }
        else{
            if($count_user>0){
                echo '<script>
                window.location.href="signup.php";
                alert ("Username already exists!!");
                </script>';
            }
            if($count_email>0){
                echo '<script>
                window.location.href="signup.php";
                alert ("Email already exists!!");
                </script>';
            }
        }
    }

?>