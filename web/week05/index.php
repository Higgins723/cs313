<?php
    include('login.php');
    include("../includes/header.php");

    if(isset($_SESSION['login_user'])){
        header("location: profile.php");
    }
?>

<nav style="margin-top: 4em;" class="navbar navbar-expand-md navbar-light bg-faded">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="/week05/">Shopping List</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="/week05/">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Login</h1>
            <form class="form-inline my-2 my-lg-0" action="" method="post">
                <input class="form-control mr-sm-2" id="username" name="username" type="text" placeholder="Username">
                <input class="form-control mr-sm-2" id="password" name="password" type="password" placeholder="Password">
                <button class="btn btn-outline-success my-2 my-sm-0" id="submit" name="submit" type="submit">Login</button>      
            </form>
            <span style="color:red;"><?php echo $error; ?></span>
            <hr/>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Your List</h1>
            <?php
                $user_id = 1;

                $db = pg_connect("host=ec2-54-83-204-230.compute-1.amazonaws.com port=5432 dbname=d3543m9j6kgfsp user=fiaajpoaucvhfo password=8ea88d18e1cd3b174c4a8572cdd658544d8030a9b44769b0ab38299bddca0033");
                $result = pg_query($db,"SELECT id, item, complete FROM shopping_list WHERE id = $user_id");
                echo "<table class='table table-striped'>";
                    echo "<thead class='thead-dark'>";
                        echo "<tr>";
                            echo "<th scope='col'>Item</th>";
                            echo "<th scope='col'>Complete</th>";
                            echo "<th scope='col'>Actions</th>";
                        echo "</tr>";
                    echo "</thead>";
                    while($row=pg_fetch_assoc($result)){echo "<tr>";
                        echo "<td>" . $row['item'] . "</td>";
                        echo "<td>"; 
                            if ($row['complete'] == 't'){
                                echo "<i class='far fa-check-circle'></i>";
                            } else {
                                echo "<i class='far fa-square'></i>";
                            }
                        echo "</td>";
                        echo "<td></td>";
                    echo "</tr>";}
                echo "</table>";
            ?>
            <hr/>
        </div>
    </div>
</div>

<?php
    include("../includes/footer.php");
?>