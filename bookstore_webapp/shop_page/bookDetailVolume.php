<?php
session_start();
require_once '../config/db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM allbooklist JOIN allbooklist_volume JOIN book_volume JOIN book_type 
    ON allbooklist.book_id = allbooklist_volume.book_id AND allbooklist_volume.volume_id = book_volume.volume_id  AND allbooklist_volume.type_id = book_type.type_id 
    WHERE allbooklist_volume.allbook_id = $id");
    $stmt->execute();
    $book = $stmt->fetch();
}

if (isset($_POST['addToCartModal'])) {
    $cart_id = $_POST['cart_id'];
    $book_qty = $_POST['book_qty'];
    $success=0;
    require_once 'cartBackend.php';
    if ($success!=0) {
        echo '<script>
                window.alert("นำสินค้าใส่ตระกร้าเรียบร้อยแล้ว");
                window.location.replace("bookDetailVolume.php?id='.$cart_id.'");
              </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $book['book_name']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="homeStyle.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
</head>
<body>
    <?php require_once 'shopHeader.php'; ?>
    <br>
    <div class="container px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="index.php" class="text-decoration-none">หน้าแรก</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="allBook.php" class="text-decoration-none">รายชื่อซีรีย์</a></li>
	            <li class="breadcrumb-item" aria-current="page"><a href="bookDetail.php?id=<?= $book['book_id']; ?>" class="text-decoration-none"><?= $book['book_name']; ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $book['volume_name']; ?></li>
            </ol>
        </nav><br>
        <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
            <div class="container product_data rounded bg-white">
                <div class="row">
                    <div class="col-md-6 border-right">
                        <div class="p-3">
                            <div class="align-items-center text-center">
	            	            <img src="<?= $book['book_img_volume']; ?>" alt="" height="500" width="65%">
                            </div>
                        </div>   
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 py-5">
                            <h4><?= $book['book_type_name']; ?> <?= $book['book_name']; ?> <?= $book['volume_name']; ?></h4>
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
            </div>
        </div> 
        <div class="d-flex flex-column align-items-center text-center">
            <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            ข้อมูลสินค้า
                        </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="accordion-body col-md-8">
                                    <p class="text-secondary">StockStatus : </p>
                                    <p class="text-secondary">Barcode : <?= $book['book_barcode_volume']; ?></p><br>
                                    <h5 class="text-secondary"><?= $book['book_type_name']; ?> <?= $book['book_name']; ?> <?= $book['volume_name']; ?></h5><br>
                                    <p class="text-secondary">เรื่องย่อ : </p><br>
                                    <p class="text-secondary"><?= $book['book_detail_volume']; ?></p><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            เขียนรีวิว
                        </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                เขียนรีวิว
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            รีวิว
                        </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <p>รีวิว</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once 'bookModal.php'; ?>
        <div class="d-flex flex-column align-items-center text-center">
            <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
                <h5>สินค้ามาใหม่สำหรับคุณ</h5><hr>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php
                        $book_id = $book['book_id'];
                        $stmt = $conn->prepare("SELECT * FROM allbooklist JOIN allbooklist_volume JOIN book_volume JOIN book_type ON allbooklist.book_id = allbooklist_volume.book_id AND 
                        allbooklist_volume.volume_id = book_volume.volume_id AND allbooklist_volume.type_id = book_type.type_id WHERE allbooklist_volume.book_id != $book_id ORDER BY rand() DESC LIMIT 10");
                        $stmt->execute();
                        $booklist = $stmt->fetchAll();

                        foreach ($booklist as $book) {
                        ?>
                            <div class="swiper-slide d-flex flex-column">
                                <a data-id='<?= $book['allbook_id']; ?>' class="userinfo"><img src="<?= $book['book_img_volume']; ?>" alt="" height="200" width="100%"></a>
                                <a href="bookDetailVolume.php?id=<?= $book['allbook_id']; ?>" class="nav-link"><p class="fs-6 mt-3"><?= $book['book_type_name']; ?> <?= $book['book_name']; ?> <?= $book['volume_name']; ?></p></a>
                                <form action="bookDetail.php" method="post" enctype="multipart/form-data">
                                    <button class="btn btn-outline-primary" type="submit" name="addToCart">เพิ่ม - ฿<?= $book['book_price_volume']; ?>
                                        <input type="hidden" value="<?= $book['allbook_id']; ?>" name="cart_id">
                                        <input type="hidden" value="1" name="book_qty">
                                    </button>
                                </form><br><br>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'shopFooter.php'; ?>            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 5,
            spaceBetween: 5,
            pagination: {
            el: ".swiper-pagination",
            clickable: true,
            },
        });
    </script>
    <script src="qty.js"></script>
    <script type='text/javascript'>
        $(document).ready(function(){
            $('.userinfo').click(function(){
                var userid = $(this).data('id');
                $.ajax({
                    url: 'ajaxfile.php',
                    type: 'post',
                    data: {userid: userid},
                    success: function(response){ 
                        $('.modal-body-choose').html(response); 
                        $('#userModal1').modal('show'); 
                    }
                });
            });
        });
    </script>
</body>
</html>