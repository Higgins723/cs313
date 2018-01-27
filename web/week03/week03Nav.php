<?php
    $qty = getCartQuantity();
    $hideCart = (isset($hideCart) ? $hideCart : false );
    $hideCheckout = (isset($hideCheckout) ? $hideCheckout : false );    
?>

<nav style="margin-top: 4em;" class="navbar navbar-expand-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="./">Week03</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./">Home</a>
      </li>
      <?php if (!$hideCart) { ?>
        <li class="nav-item">
            <a class="<?php echo ($qty == 0 ? "disabled " : ""); ?>nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> Cart <?php echo ($qty > 0 ? "<span class=\"badge badge-pill badge-secondary\">" . $qty . "</span>" : ""); ?></a>
        </li>
      <?php } if (!$hideCheckout) { ?>
        <li class="nav-item">
            <a class="<?php echo ($qty == 0 ? "disabled " : ""); ?>nav-link" href="checkout.php"><i class="fas fa-credit-card"></i> Checkout</a>
        </li>
      <?php } ?>
    </ul>
  </div>
</nav>