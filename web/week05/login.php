<?php
    session_start(); // Starting Session
    $error = ''; // Variable To Store Error Message
    if (isset($_POST['submit'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $error = "Username or Password is invalid";
        }
        else {
            // Define $username and $password
            $username = $_POST['username'];
            $password = $_POST['password'];

            $db = pg_connect("host=ec2-54-83-204-230.compute-1.amazonaws.com port=5432 dbname=d3543m9j6kgfsp user=fiaajpoaucvhfo password=8ea88d18e1cd3b174c4a8572cdd658544d8030a9b44769b0ab38299bddca0033");
            $result = pg_query($db,"SELECT * FROM shoppinglist_users WHERE username = '$username' AND password = '$password'");


            $rows = pg_num_rows($result);
            if ($rows == 1) {
                echo "<script>alert(" . $username . ")";
                $_SESSION['login_user'] = $username; // Initializing Session
                header("location: profile.php"); // Redirecting To Other Page
            } else {
                $error = "Username or Password is invalid";
            }
            pg_close($db);
        }
    }
?>