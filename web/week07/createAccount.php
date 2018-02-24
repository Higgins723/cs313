<?php
    include("../includes/header.php");
    include("createUser.php");
?>

<nav style="margin-top: 4em;" class="navbar navbar-expand-md navbar-light bg-faded">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="/week07/">Shopping List</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="/week07/">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h2>Create Account</h2>
            <form class="form my-2 my-lg-0" action="" method="post">
                <input class="form-control mr-sm-2" id="username" name="username" type="text" placeholder="Username">
                <br>
                <input class="form-control mr-sm-2" id="password" name="password" type="password" placeholder="Password">
                <br>
                <input class="form-control mr-sm-2" id="passwordConfirm" name="passwordConfirm" type="password" placeholder="Confirm Password">
                <br>
                <button class="btn btn-outline-success my-2 my-sm-0" id="submit" name="submit" type="submit">Create Account</button>      
            </form>
            <span style="color:red;"><?php echo $error; ?></span>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>
</div>

<?php
    include("../includes/footer.php");
?>
