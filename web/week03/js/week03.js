function addToCart(id) {
    $("#item_id").val(id);
    return true;
}

function removeItem(id) {
    var con = confirm("Are you sure you want to delete this item?");
    if (con == true) {
        $("#action").val("remove");
        $("#item_id").val(id);
        return true;
    }
}

function emptyCart() {
    var con = confirm("Are you sure you want to empty your entire shopping cart?");
    if (con == true){
        $("#action").val("empty");
        return true;
    }
}

function updateCart() {
    $("#action").val("update");
    return true;
}