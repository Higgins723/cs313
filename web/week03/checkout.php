<?php
    $pageTitle = 'Checkout';
    $currentPage = htmlspecialchars($_SERVER["PHP_SELF"]);
    $hide_checkout = true;

    require 'globalVars.php';
    include("../includes/header.php");

    $show_checkout = true;
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = safe_post('name');
        $address = safe_post('address');

        if (empty($name)) array_push($errors, 'Name is required');
        if (empty($address)) array_push($errors, 'Address is required');

        $show_checkout = (count($errors) > 0);
    } else {
        $name = '';
        $address = '';
    }

    if (!$show_checkout) {
        saveShipping($name, $address);
        header("Location: final.php"); 
    } else {
        require 'week03Nav.php';
?>
    <?php if (count($errors) > 0) { ?>
        <div class="alert alert-danger" role="alert">
            <ul>
                <?php foreach ($errors as $e) {
                    echo "<li>$e</li>";
                }?>
            </ul>
        </div>
    <?php } ?>

    <form name="form_checkout" action="<?php echo $currentPage; ?>" method="post">
        <div class="container">
            <h1>Checkout</h1>

            <h3>Items in Your Cart:</h3>
            <?php require 'confirm.php'; ?>

            <h4>Shipping Address</h4>

            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="name" placeholder="Name" />
                    <br/>
                    <input type="text" class="form-control" name="address" placeholder="Address" />
                    <hr/>
                    <button  class="btn btn-success">Purchase</button>
                </div>
            </div>

        </div>
    </form>
    <br/>
<?php
}
include("../includes/footer.php");
?>