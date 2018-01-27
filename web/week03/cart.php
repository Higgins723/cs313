<?php
$pageTitle = 'Cart';
$currentPage = htmlspecialchars($_SERVER["PHP_SELF"]);

require 'globalVars.php';
include("../includes/header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = safe_post('action');
    $item_id = intval(safe_post('item_id'));
    if ($action == "empty") {
        emptyCart();
    } else if ($action == "update") {
        foreach($cart as $item_id => $item_qty) {
            if (!isset($_POST["item_$item_id"]) || !ctype_digit($_POST["item_$item_id"])) continue;
            $item_qty = intval(safe_post("item_$item_id"));
            updateItemQuantity($item_id, $item_qty);
        }
    } else if ($action == "remove") {
        if ($item_id > 0) {
            updateItemQuantity($item_id, 0);
        }
    }
    header("Location: $currentPage"); 
} else {
    require 'week03Nav.php';
    $cart_total = number_format(getCartTotal(), 2);
?>
    <form name="form_cart" action="<?php echo $currentPage; ?>" method="post">
        <input type="hidden" id="action" name="action" />
        <input type="hidden" id="item_id" name="item_id" />
        <div class="container">
            <h2>Your Cart:</h2>
            <table class="table table-striped">
                <thead class="thead-inverse">
                    <th>Item</th>
                    <th>Price Per Item</th>
                    <th>Amount</th>
                    <th>Total For Item/Items</th>
                    <th>Options</th>
                </thead>
                <tbody>
                    <?php
                    if ($qty == 0) {
                    ?>
                        <tr>
                            <td colspan="5">Nothing has been added to your cart. Return to the shop.</td>
                        </tr>
                    <?php
                    } else {
                        foreach($cart as $item_id => $item_qty) {
                            $item = getItem($item_id);
                            $itemName = $item['name'];
                            $description = $item['description'];
                            $price = number_format($item['price'], 2);
                            $total = number_format($item_qty * $item['price'], 2);
                        ?>
                        <tr>
                            <td><?php echo $itemName; ?></td>
                            <td><i class="fas fa-dollar-sign"></i><?php echo $price; ?></td>
                            <td><input type="text" name="item_<?php echo $item_id; ?>" value="<?php echo $item_qty; ?>"/></td>
                            <td><i class="fas fa-dollar-sign"></i><?php echo $total; ?></td>
                            <td><button class="btn btn-danger" onclick="removeItem(<?php echo $item_id; ?>)">Delete</button>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="font-weight-bold">Grand Total: <i class="fas fa-dollar-sign"></i><?php echo $cart_total; ?></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-2">
                    <button class="btn btn-danger" onclick="emptyCart()">Empty Entire Cart</button>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-warning" onclick="updateCart()">Update Entire Cart</button>
                </div>
                <div class="col-md-2">
                    <a href="checkout.php" class="<?php echo ($qty == 0 ? "disabled " : ""); ?>btn btn-success">Checkout</a>
                </div>
                <div class="col-md-2">
                    <a href="./" class="btn btn-primary">Keep Shopping</a>
                </div>
            </div>

            <br/>

        </div>
    </form>
<?php
}
include("../includes/footer.php");
?>