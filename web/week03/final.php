<?php
    $pageTitle = 'Confirmation';
    $currentPage = htmlspecialchars($_SERVER["PHP_SELF"]);
    $hide_checkout = true;
    $hide_view_cart = true;

    require 'globalVars.php';
    include("../includes/header.php");
    require 'week03Nav.php';

    $shipping = getShipping();
    $name = $shipping['name'];
    $address = $shipping['address'];

?>
<div class="container">
    <h2 class="mt-5">Purchased Items</h2>
    <?php require 'confirm.php'; ?>

    <h2>Your order will arrive shortly</h2>
    <div>
        <?php echo $name; ?><br/>
        <?php echo $address; ?><br/>
    </div>
</div>

<?php
    include("../includes/footer.php");
    emptyCart();
?>