<?php
session_start();
require_once '../config/db.php';
$userid = $_POST['userid'];
$stmt = $conn->prepare("SELECT * FROM allbooklist JOIN allbooklist_volume JOIN book_volume JOIN book_type 
ON allbooklist.book_id = allbooklist_volume.book_id AND allbooklist_volume.volume_id = book_volume.volume_id  AND allbooklist_volume.type_id = book_type.type_id 
WHERE allbooklist_volume.allbook_id = $userid");
$stmt->execute();
$book = $stmt->fetch();
?>

<div class="p-3">
<div class="row">
    <div class="col-md-5 border-right">
        <div class="p-3">
            <div class="align-items-center text-center">
                <a href="bookDetailVolume.php?id=<?= $book['allbook_id']; ?>" class="nav-link"><img src="<?= $book['book_img_volume']; ?>" alt="" height="400" width="100%"></a>
            </div>
        </div>   
    </div>
    <div class="col-md-7">
        <a href="bookDetailVolume.php?id=<?= $book['allbook_id']; ?>" class="nav-link"><h4><?= $book['book_type_name']; ?> <?= $book['book_name']; ?> <?= $book['volume_name']; ?></h4></a>
        <p>วันวางจำหน่าย : <?= $book['book_release_volume']; ?></p><br>
        <p>สินค้าคงเหลือ : <?= $book['book_remain']; ?> เล่ม</p>
        <p>ส่วนลด : -</p>
        <p>โปรโมชั่น : -</p><br>
        <h4 class="text-primary">ราคา <?= $book['book_price_volume']; ?> บาท<input type="hidden" class="iprice" value="<?= $book['book_price_volume']; ?>"></h4><br>
        <form action="bookDetailVolume.php" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    จำนวน
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <input type="number" class="form-control text-center iqty bg-white" onchange="subTotal()" value="1" min="1" max="10" name="book_qty">
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-outline-primary btn-lg col-md-5" type="submit" name="addToCartModal">เพิ่ม - ฿<span class="itotal"></span>
                <input type="hidden" value="<?= $book['allbook_id']; ?>" name="cart_id">
            </button>
        </form>
    </div>
</div>
</div>
<script src="qty.js"></script>
