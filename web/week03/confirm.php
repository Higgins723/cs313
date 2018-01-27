<?php
    $totalCost = number_format(getCartTotal(), 2);
?>

<table class="table table-striped">
    <thead class="thead-inverse">
        <th>Item</th>
        <th>Price Per Item</th>
        <th>Amount</th>
        <th>Total For Item/Items</th>
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
                <td><?php echo $item_qty; ?></td>
                <td><i class="fas fa-dollar-sign"></i><?php echo $total; ?></td>
            </tr>
        <?php
            }
        }
        ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td class="font-weight-bold">Grand Total: <i class="fas fa-dollar-sign"></i><?php echo $totalCost; ?></td>            
        </tr>
    </tbody>
</table>