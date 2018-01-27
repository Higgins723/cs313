<?php
    $pageTitle = 'Browse';
    $currentPage = htmlspecialchars($_SERVER["PHP_SELF"]);

    require 'globalVars.php';
    include("../includes/header.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = intval(safe_post('item_id'));
        if ($id > 0) {
            incrementItemQuantity($id);
        }
        
        header("Location: $currentPage"); 
    } else {
        require 'week03Nav.php';
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1><?php echo $pageTitle; ?></h1>
        </div>
    </div>

    <hr/>

    <form name="form_browse" action="<?php echo $pageNumber; ?>" method="post">
        <input type="hidden" id="item_id" name="item_id" />
        <div class="container-fluid">
            <div class="row">
                <?php
                foreach($items as $item) {
                    $itemName = $item['name'];
                    $description = $item['description'];
                    $id = $item['id'];
                    $qty = getCartItemQuantity($id);
                    $price = number_format($item['price'], 2);                    
                ?>
                    <div class="col-sm-4">
                        <div class="card" style="width: 20rem; margin-bottom: 2em;">
                            <img class="card-img-top" src="images/item_<?php echo $id; ?>.jpg" alt="Card image cap">
                            <div class="card-block" style="margin: 1em;">
                                <h4 class="card-title"><?php echo $itemName; ?> <?php echo ($qty > 0 ? "<span class=\"badge badge-pill badge-secondary\">" . $qty . "</span>" : ""); ?></h4>
                                <span style="color: green;"><i class="fas fa-dollar-sign"></i><?php echo $price; ?></span>
                                <p class="card-text"><?php echo $description; ?></p>
                                <button href="#" onclick="addToCart(<?php echo "($id)"; ?>)" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </form>
</div>

<?php
}
include("../includes/footer.php");
?>