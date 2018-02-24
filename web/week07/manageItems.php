<?php
    include "login.php";
    $error = '';
    $user_id = (int) $_SESSION["userId"];

    if (isset($_POST['submit'])) {
        if (empty($_POST['item'])) {
            $error = "You must enter an item!";
        }
        else {
            $item = $_POST['item'];

            $db = pg_connect("host=ec2-54-83-204-230.compute-1.amazonaws.com port=5432 dbname=d3543m9j6kgfsp user=fiaajpoaucvhfo password=8ea88d18e1cd3b174c4a8572cdd658544d8030a9b44769b0ab38299bddca0033");
            $result = pg_query($db,"INSERT INTO shopping_list VALUES ($user_id, '$item', default)");
            header("location: profile.php");
        }
    }

    if (isset($_POST['complete'])) {
        $completedItem = $_POST['itemNameComplete'];
        $db = pg_connect("host=ec2-54-83-204-230.compute-1.amazonaws.com port=5432 dbname=d3543m9j6kgfsp user=fiaajpoaucvhfo password=8ea88d18e1cd3b174c4a8572cdd658544d8030a9b44769b0ab38299bddca0033");
        $result = pg_query($db, "UPDATE shopping_list SET complete = 't' WHERE item = '$completedItem' AND id = '$user_id'");
    }

    if (isset($_POST['delete'])) {
        $deleteItem = $_POST['itemNameDelete'];
        $db = pg_connect("host=ec2-54-83-204-230.compute-1.amazonaws.com port=5432 dbname=d3543m9j6kgfsp user=fiaajpoaucvhfo password=8ea88d18e1cd3b174c4a8572cdd658544d8030a9b44769b0ab38299bddca0033");
        $result = pg_query($db, "DELETE FROM shopping_list where item = '$deleteItem' AND id = '$user_id'");
    }
?>
