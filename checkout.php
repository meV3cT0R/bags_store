<?php
    include("config.php");

    session_start();
    $uid = $_SESSION["uid"];
    $cart_products = $conn->query("SELECT sum(c.quantity*p.price) as total_price FROM cart c INNER JOIN products p ON c.bid=p.id where c.uid=$uid ");
    
    $total_price = $cart_products->fetch_assoc()["total_price"];
    $order = $conn->query("INSERT INTO orders(uid,total_price) values('$uid','$total_price')");

    $order_id = mysqli_insert_id($conn);

    $result = $conn->query("SELECT *,cart.quantity as cart_quantity from cart INNER JOIN products ON cart.bid=products.id;");

    while( $row = $result->fetch_assoc()) {
        $bid = $row["bid"];
        $quantity = $row["cart_quantity"];
        $stock_quantity = $row["quantity"];
        if($quantity>$stock_quantity)  {
            $quantity = $stock_quantity;
        }

        $conn->query("INSERT INTO order_product(oid,bid,quantity) values('$order_id','$bid','$quantity')");


        $new_quantity = $stock_quantity-$quantity;
        $conn->query("UPDATE products set quantity=$new_quantity where id=$bid");
    }

    $conn->query("DELETE FROM cart where uid=$uid");
    $url = "/bags_store/invoice.php?order_id=".urlencode($order_id);
    header("location: $url");
?>