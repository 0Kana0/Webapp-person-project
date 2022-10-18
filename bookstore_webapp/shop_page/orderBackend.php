<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_login'])) {
    header('location: index.php');
}

if (isset($_POST['order'])) {
    $id = $_POST['id'];
    $address = $_POST['address'];
    $delivery = $_POST['delivery'];
    $checkout = $_POST['checkout'];
    $total = $_POST['total'];

    $stmt = $conn->prepare("INSERT INTO order_user(user_id, address_id, delivery_id, checkout_id, total) 
    VALUES (:user_id, :address_id, :delivery_id, :checkout_id, :total)");
    $stmt->bindParam(":user_id", $id);
    $stmt->bindParam(":address_id", $address);
    $stmt->bindParam(":delivery_id", $delivery);
    $stmt->bindParam(":checkout_id", $checkout);
    $stmt->bindParam(":total", $total);
    $stmt->execute();

    $conn->exec($stmt);
    $last_id = $conn->lastInsertId();

    $stmt1 = $conn->prepare("INSERT INTO order_detail(order_id, allbook_id, allbook_qty) VALUES (:order_id, :allbook_id, :allbook_qty)");
    foreach ($_SESSION['addcart'] as $book) {
        $stmt1->bindParam(":order_id", $last_id);
        $stmt1->bindParam(":allbook_id", $book['cart_id']);
        $stmt1->bindParam(":allbook_qty", $book['book_qty']);
        $stmt1->execute();
    }
    unset($_SESSION['addcart']);

    if ($stmt) {
        echo '<script>
                setTimeout(function() {
                swal({
                    title: "สั่งซื้อสินค้าสำเร็จ",
                    type: "success"
                }, function() {
                    window.location = "userOrderDetail.php";
                });
            }, 10);
        </script>';
    }
}
?>