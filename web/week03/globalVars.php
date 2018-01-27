<?php
session_start();

$cart = isset($_SESSION['CART']) ? $_SESSION['CART'] : [];

function emptyCart() {
    global $cart;
    $cart = [];
    saveCart();
}

$items = array(
    array('id' => 1, 'name' => 'Title 1', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu eleifend nisi.', 'price' => 3.00),
    array('id' => 2, 'name' => 'Title 2', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu eleifend nisi.', 'price' => 5.00),
    array('id' => 3, 'name' => 'Title 3', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu eleifend nisi.', 'price' => 8.00)
);

function getCartItemQuantity($id) {
    global $cart;
    return (array_key_exists($id, $cart) ? $cart[$id] : 0);
}

function getCartTotal() {
    global $cart;
    $total = 0;

    foreach ($cart as $item_id => $qty) {
        $item = getItem($item_id);
        $total += $qty * $item['price'];
    }

    return $total;
}

function getItem($id) {
    global $items;
    foreach ($items as $item) {
        if ($item['id'] == $id) return $item;
    }
    return null;
}

function getShipping() {
    return (isset($_SESSION['SHIPPING']) ? $_SESSION['SHIPPING'] : array('name' => '', 'address' => ''));
}

function incrementItemQuantity($id, $qty = 1) {
    updateItemQuantity($id, getCartItemQuantity($id) + $qty);
}

function safe_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function safe_post($key, $default = '') {
    return safe_input(isset($_POST[$key]) ? $_POST[$key] : $default);
}

function saveCart() {
    global $cart;
    $_SESSION['CART'] = $cart;
}

function saveShipping($name, $address) {
    $_SESSION['SHIPPING'] = array(
        'name' => $name, 
        'address' => $address);
}

function clearShipping() {
    unset($_SESSION['SHIPPING']);
}

function getCartQuantity() {
    global $cart;
    $qty = 0;
    foreach ($cart as $item_id => $item_qty) {
        $qty += $item_qty;
    }
    return $qty;
}

function updateItemQuantity($id, $qty) {
    global $cart;
    if (getItem($id) == null){ 
        throw new Exception('Item not found');
    }

    $itemInCart = array_key_exists($id, $cart);
    if ($qty <= 0) {
        if ($itemInCart) unset($cart[$id]);
    } 
    else {
        $cart[$id] = $qty;
    }

    saveCart();
}

$states	= array(
    'ID' => 'Idaho',
    'UT' => 'Utah'
);

?>