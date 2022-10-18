<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['admin_login'])) {
    header('location: index.php');
} 
if (isset($_SESSION['admin_login'])) {
    $admin_id = $_SESSION['admin_login'];
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $conn->prepare("SELECT * FROM user JOIN order_user JOIN order_detail JOIN user_address JOIN allbooklist_volume JOIN allbooklist JOIN book_volume JOIN book_type JOIN user_checkout JOIN book_delivery
        ON user.user_id = order_user.user_id AND order_user.order_id = order_detail.order_id AND user_address.address_id = order_user.address_id AND allbooklist_volume.allbook_id = order_detail.allbook_id AND allbooklist_volume.book_id = allbooklist.book_id 
        AND allbooklist_volume.volume_id = book_volume.volume_id  AND allbooklist_volume.type_id = book_type.type_id AND order_user.delivery_id = book_delivery.delivery_id AND order_user.checkout_id = user_checkout.checkout_id
        WHERE order_user.order_id = $id");
        $stmt->execute();
        $orders = $stmt->fetchAll();

        $stmt1 = $conn->prepare("SELECT * FROM order_user WHERE order_id = $id");
        $stmt1->execute();
        $order = $stmt1->fetch();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bookstore | รายละเอียดคำสั่งซื้อ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="homeStyle.css" rel="stylesheet">
</head>
<body>
    <?php require_once 'shopHeader.php'; ?>
    <br>
    <div class="container px-4">
        <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
            <div class="container product_data rounded bg-white">
                <div class="row">
                    <div class="col-md-3 border-right border border-1 shadow p-4">
                        <?php require_once 'adminChangePage.php'; ?>
                    </div>
                    <div class="col-md-9">
                        <div class="p-4 px-5">
                            <div class="align-items-center text-center">
                                <h4>รายละเอียดคำสั่งซื้อ</h4>
                            </div><hr><br>
                            <div class="d-flex justify-content-between align-items-center experience">
                                <h4>หมายเลขคำสั่งซื้อ #<?= $id ?></h4>
                                <a href="adminOrderDetail.php" class="btn btn-outline-secondary">
                                    <i class="fa-solid fa-backward"></i> ย้อนกลับ
                                </a>
                            </div><br>
                            <p><?= date('d/m/Y',strtotime($order['created_at'])); ?> เวลา <?= date('H:i',strtotime($order['created_at'])); ?></p>
                            <p>สินค้าที่สั่งซื้อ</p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ชื่อสินค้า</th>
                                        <th scope="col">บาร์โค้ด</th>
                                        <th scope="col">ราคา</th>
                                        <th scope="col">จำนวน</th>
                                        <th scope="col">รวม</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($orders as $order) {
                                    ?>
                                        <tr>
                                            <td><?= $order['book_type_name']; ?> <?= $order['book_name']; ?> <?= $order['volume_name']; ?></td>
                                            <td><?= $order['book_barcode_volume']; ?></td>
                                            <td>฿<?= $order['book_price_volume']; ?></td></td>
                                            <td><?= $order['allbook_qty']; ?></td>
                                            <td>฿<?= $order['book_price_volume']*$order['allbook_qty']; ?></td>
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                            <div class="align-items-center text-end">
                                <p>รวม ฿<?= $order['total']-35 ?></p>
                                <p>ค่าจัดส่ง  ฿35</p>
                                <p>ราคารวม ฿<?= $order['total'] ?></p>
                            </div>
                            <h4>การจัดส่งและชำระเงิน</h4><br>
                            <h5>ที่อยู่จัดส่ง</h5>
                            <h5><?= $order['user_firstname']; ?> 
                                <?= $order['user_lastname']; ?> 
                                <?= $order['user_address']; ?> 
                                <?= $order['user_district']; ?> 
                                <?= $order['user_postcode']; ?> 
                                จังหวัด<?= $order['user_province']; ?>
                                ประเทศ<?= $order['user_country']; ?>
                                <?= $order['user_phone']; ?>
                            </h5><hr>
                            <h5>ที่อยู่ออกใบกำกับภาษี</h5>
                            <h5><?= $order['user_firstname']; ?> 
                                <?= $order['user_lastname']; ?> 
                                <?= $order['user_address']; ?> 
                                <?= $order['user_district']; ?> 
                                <?= $order['user_postcode']; ?> 
                                จังหวัด<?= $order['user_province']; ?>
                                ประเทศ<?= $order['user_country']; ?>
                                <?= $order['user_phone']; ?>
                            </h5><hr>
                            <h5>วิธีจัดส่ง</h5>
                            <h5><?= $order['delivery_name']; ?></h5><hr>
                            <h5>วิธีการชำระเงิน</h5>
                            <h5><?= $order['checkout_name']; ?></h5><hr>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <?php require_once 'shopFooter.php'; ?>     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>

