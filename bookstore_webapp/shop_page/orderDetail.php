<?php
session_start();
require_once '../config/db.php';

if (isset($_SESSION['user_login'])) {
    $user_id = $_SESSION['user_login'];
    $stmt = $conn->prepare("SELECT * FROM user JOIN user_gender JOIN user_address
    ON user.user_gender = user_gender.gender_id AND user.user_id = user_address.user_id
    WHERE user.user_id = $user_id");
    $stmt->execute();
    $users = $stmt->fetchAll();
}
$stmt1 = $conn->prepare("SELECT * FROM book_delivery");
$stmt1->execute();
$deliverys = $stmt1->fetchAll();

$stmt2 = $conn->prepare("SELECT * FROM user_checkout");
$stmt2->execute();
$checkouts = $stmt2->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bookstore | สินค้าในตระกร้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="homeStyle.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
</head>
<body>
    <?php require_once 'shopHeader.php'; ?>
    <br><br>
    <form action="orderBackend.php" method="post" enctype="multipart/form-data">
        <div class="container px-4">
            <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
                <div class="container p-3 rounded bg-white">
                    <div class="row">
                        <div class="col-md-8 border-right">
                        
                            <h3>เลือกที่อยู่จัดส่งสินค้า</h3><hr>
                            <?php 
                            $i = 1;
                            if ($users) {
                                foreach ($users as $user) { 
                            ?>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" required type="radio" name="address" value="<?= $user['address_id']; ?>">
                                        <div class="card">
                                            <div class="card-body">
                                                <p class="card-text">ที่อยู่จัดส่งที่ <?= $i ?></p>
                                                <h5 class="card-title"><?= $user['user_firstname']; ?> <?= $user['user_lastname']; ?></h5>
                                                <p class="card-text"><?= $user['user_address']; ?> 
                                                                    <?= $user['user_district']; ?> 
                                                                    <?= $user['user_postcode']; ?> 
                                                                    จังหวัด<?= $user['user_province']; ?>
                                                                    ประเทศ<?= $user['user_country']; ?>
                                                                    <?= $user['user_phone']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                            <?php $i++; } 
                                } else {
                            ?>
                                <br><h4>ยังไม่มีที่อยู่จัดส่งสินค้า ไปที่หน้า <a href="userAddress.php" class="text-decoration-none">ที่อยู่จัดส่ง</a> เพื่อเพิ่มที่อยู่จัดส่งสินค้า</h4><br>
                            <?php } ?><br>
                            <h3>รูปแบบการจัดส่งสินค้า</h3><hr>
                            <?php 
                                foreach ($deliverys as $delivery) { 
                            ?>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" required type="radio" name="delivery" value="<?= $delivery['delivery_id']; ?>">
                                        <label class="form-check-label" for="flexRadioDefault1"><?= $delivery['delivery_name']; ?></label>
                                    </div>
                                </div><br>
                            <?php } ?><br>
                            <h3>รูปแบบการชำระเงิน</h3><hr>
                            <?php 
                                foreach ($checkouts as $checkout) { 
                            ?>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" required type="radio" name="checkout" value="<?= $checkout['checkout_id']; ?>">
                                        <label class="form-check-label" for="flexRadioDefault1"><?= $checkout['checkout_name']; ?></label>
                                    </div>
                                </div><br>
                            <?php } ?><br>
                        </div>
                        <div class="col-md-4">
                            <br>
                            <h4>สรุปรายการสั่งซื้อ/Order Summary</h4><br>
                            <?php 
                            if ($_SESSION['addcart']) { 
                                $i=1;
                                $total=0;
                                foreach ($_SESSION['addcart'] as $book) {
                                    $total+=$book['book_price_volume']*$book['book_qty'];
                                    $i++; 
                                } 
                            ?>
                                <div class="d-flex justify-content-between align-items-center experience"><p>ราคาค่าส่ง (Shipping Fee) </p><p>35 บาท(฿)</p></div>
                                <div class="d-flex justify-content-between align-items-center experience"><p>ราคารวม (Subtotal) </p><p><?= $total ?> บาท(฿)</p></div>
                                <div class="d-flex justify-content-between align-items-center experience"><p>ประหยัด (Discount) </p><p>0 บาท(฿)</p></div>
                                <div class="d-flex justify-content-between align-items-center experience"><p>ส่วนลด (Promo code) </p><p>0 บาท(฿)</p></div><br>
                                <hr><br>
                                <div class="d-flex justify-content-between align-items-center experience"><h4>ราคาสุทธิ (Total) </h4><h4><?= $total + 35 ?> บาท</h4></div><br>
                            <?php } ?>
                            <input type="hidden" value="<?= $total + 35 ?>" name="total">
                            <input type="hidden" value="<?= $user['user_id']; ?>" name="id">
                            <button class="btn btn-outline-primary btn-lg col-md-12" type="submit" name="order">ยืนยันการสั่งซื้อ</button>
                        </div>           
                    </div>
                </div>
            </div> 
        </div>
    </form> 
    <?php require_once 'shopFooter.php'; ?>     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>

