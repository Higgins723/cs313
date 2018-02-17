<?php
    include("../includes/header.php");
    include("login.php");

    // if logged in redirect to profile.php
    if(isset($_SESSION["userId"])) {
        header('Location: profile.php');
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
            <br>
        </div>
        <div class="col-md-12">
            <h3>Login Information</h3>
            <p>Create an account or use a testing username and password from below.</p>
            <p>
                Username: <b>admin</b><br>
                Password: <b>password</b>
            <p>
            <p>
                Username: <b>testingUser</b><br>
                Password: <b>password1</b>
            </p>
            <hr/>
        </div>
    </div>
</div>


<?php
    include("../includes/footer.php");
?>
