<?php
    $is_unique = false;
    $error = ''; // Variable To Store Error Message
    if (isset($_POST['submit'])) {
        if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['passwordConfirm'])) {
            $error = "All fields are required!";
        }
        else {
            // Define $username and $password
            $username = $_POST['username'];
            $password = $_POST['password'];
            $passwordConfirm = $_POST['passwordConfirm'];

            if ($password !== $passwordConfirm) {
                $error = "Passwords do not match!";
            }
            else {
                $db = pg_connect("host=ec2-54-83-204-230.compute-1.amazonaws.com port=5432 dbname=d3543m9j6kgfsp user=fiaajpoaucvhfo password=8ea88d18e1cd3b174c4a8572cdd658544d8030a9b44769b0ab38299bddca0033");
                $result = pg_query($db, "SELECT * FROM shoppinglist_users");
                
                while ($row=pg_fetch_assoc($result)) {
                    if ($username == $row['username']) {
                        $error = "Sorry " . $username . " already exists. Choose a different username.";
                        $is_unique = false;
                        break;
                    }
                    else {
                        $is_unique = true;
                    }
                }

                if ($is_unique == true) {
                    $result = pg_query($db,"INSERT INTO shoppinglist_users VALUES (default, '$username', '$password')");
                    header("location: index.php");
                }
            }
        }
    }
?>
