<?php
    session_start();

    $user_check = $_SESSION['login_user'];

    $db = pg_connect("host=ec2-54-83-204-230.compute-1.amazonaws.com port=5432 dbname=d3543m9j6kgfsp user=fiaajpoaucvhfo password=8ea88d18e1cd3b174c4a8572cdd658544d8030a9b44769b0ab38299bddca0033");
    $result = pg_query($db,"SELECT username FROM shoppinglist_users WHERE username = $user_check");
    $row = pg_fetch_assoc($result);
    $login_session = $row['username'];
    if(!isset($login_session)){
        pg_close($db);
        header('Location: index.php');
    }
?>