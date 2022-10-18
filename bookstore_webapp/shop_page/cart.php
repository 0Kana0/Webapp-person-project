<?php
session_start();
require_once '../config/db.php';

if (isset($_GET['deleteAll'])) {
    if($_SESSION['addcart']){
        unset($_SESSION['addcart']);
        echo "<script>
            window.alert('นำสินค้าออกจากตระกร้าเรียบร้อยแล้ว');
            window.location.replace('cart.php');
        </script>";
    }
}
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
    <div class="container px-4">
        <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
            <div class="container p-3 rounded bg-white">
                <div class="row">
                    <div class="col-md-8 border-right">
                        <div class="row">
                            <div class="d-flex justify-content-between align-items-center experience">
                                <h3>รายการสินค้า/Product List</h3>
                                <a href="?deleteAll" class="btn btn-outline-danger">ลบสินค้าทั้งหมด</a>
                            </div>
                        </div><hr>
                        <table class="table">
                            <?php if ($_SESSION['addcart']) { ?>
                            <thead>
                                <tr>
                                    <th scope="col">ชื่อสินค้า</th>
                                    <th scope="col">จำนวน</th>
                                    <th scope="col">ราคา</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1;
                                    $total=0;
                                    foreach ($_SESSION['addcart'] as $book) {
                                        $total+=$book['book_price_volume']*$book['book_qty'];
                                ?>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-5 border-right text-center">
                                                    <a href="bookDetailVolume.php?id=<?= $book['cart_id']; ?>" class="nav-link"><img src="<?= $book['book_img_volume']; ?>" alt="" height="250" width="80%"></a>
                                                </div>
                                                <div class="col-md-7">
                                                    <a href="bookDetailVolume.php?id=<?= $book['cart_id']; ?>" class="nav-link"><p><?= $book['book_type_name']; ?> <?= $book['book_name']; ?> <?= $book['volume_name']; ?></p></a>
                                                    <p>รูปแบบ : <?= $book['type_name']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="col-md-8">
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control bg-white" value="<?= $book['book_qty']; ?>" min="1" max="10">
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= $book['book_price_volume']*$book['book_qty'] ?></td>
                                        <td>
                                            <a href="del_cart.php?id=<?= $i ?>" class="btn btn-outline-danger">ลบ</a>
                                        </td>
                                    </tr>
                                <?php $i++; 
                                    } 
                                } else {
                                ?>
                                    <br>
                                    <h4>ไม่มีสินค้าในตะกร้า</h4><br>
                                    <p>ไปที่ หน้าหลัก เพื่อเลือกดูรายการสินค้าเลย!</p>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <br>
                        <h4>สรุปรายการสั่งซื้อ/Order Summary</h4><br>
                        <?php if ($_SESSION['addcart']) { ?>
                            <div class="d-flex justify-content-between align-items-center experience"><p>ราคาค่าส่ง (Shipping Fee) </p><p>35 บาท(฿)</p></div>
                            <div class="d-flex justify-content-between align-items-center experience"><p>ราคารวม (Subtotal) </p><p><?= $total ?> บาท(฿)</p></div>
                            <div class="d-flex justify-content-between align-items-center experience"><p>ประหยัด (Discount) </p><p>0 บาท(฿)</p></div>
                            <div class="d-flex justify-content-between align-items-center experience"><p>ส่วนลด (Promo code) </p><p>0 บาท(฿)</p></div><br>
                            <hr><br>
                            <div class="d-flex justify-content-between align-items-center experience"><h4>ราคาสุทธิ (Total) </h4><h4><?= $total + 35 ?> บาท</h4></div><br>
                            <a href="orderDetail.php" class="btn btn-outline-primary btn-lg col-md-12">ไปหน้าถัดไป</a>
                        <?php } else { ?>
                            <div class="d-flex justify-content-between align-items-center experience"><p>ราคาค่าส่ง (Shipping Fee) </p><p>0 บาท(฿)</p></div>
                            <div class="d-flex justify-content-between align-items-center experience"><p>ราคารวม (Subtotal) </p><p>0 บาท(฿)</p></div>
                            <div class="d-flex justify-content-between align-items-center experience"><p>ประหยัด (Discount) </p><p>0 บาท(฿)</p></div>
                            <div class="d-flex justify-content-between align-items-center experience"><p>ส่วนลด (Promo code) </p><p>0 บาท(฿)</p></div><br>
                            <hr><br>
                            <div class="d-flex justify-content-between align-items-center experience"><h4>ราคาสุทธิ (Total) </h4><h4>0 บาท</h4></div><br>
                            <a href="" class="btn btn-outline-primary btn-lg col-md-12">ไปหน้าถัดไป</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <?php require_once 'shopFooter.php'; ?>     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>

