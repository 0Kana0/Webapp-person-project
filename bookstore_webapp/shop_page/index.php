<?php
session_start();
require_once '../config/db.php';

if (isset($_POST['addToCartIndex'])) {
    $cart_id = $_POST['cart_id'];
    $book_qty = $_POST['book_qty'];
    $success=0;
    require_once 'cartBackend.php';
    if ($success!=0) {
        echo '<script>
                window.alert("นำสินค้าใส่ตระกร้าเรียบร้อยแล้ว");
                window.location.replace("index.php");
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
    <title>bookstore | ซื้อขาย Manga Light novel ออนไลน์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="homeStyle.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
</head>
<body>
    <?php require_once 'shopHeader.php'; ?>
    <div class="container">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $stmt = $conn->prepare("SELECT * FROM carousel");
                $stmt->execute();
                $carousels = $stmt->fetchAll();

                $stmt2 = $conn->prepare("SELECT carousel_id FROM carousel ORDER BY carousel_id DESC LIMIT 1");
                $stmt2->execute();
                $last = $stmt2->fetch();

                foreach ($carousels as $carousel) {
                    if ($carousel['carousel_id'] == $last[0]) { ?>
                        <div class="carousel-item active">
                            <a href="bookDetail.php?id=<?= $carousel['book_id']; ?>"><img src="<?= $carousel['carousel_img']; ?>" class="d-block" alt="" width="100%" height="600"></a>
                        </div>
                <?php } else { ?>
                        <div class="carousel-item">
                            <a href="bookDetail.php?id=<?= $carousel['book_id']; ?>"><img src="<?= $carousel['carousel_img']; ?>" class="d-block" alt="" width="100%" height="600"></a>
                        </div>
                <?php } 
                } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div><br>
    <div class="d-flex flex-column align-items-center text-center">
        <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
            <div class="container">
                <h5>ซีรีย์ยอดฮิตติดอันดับ</h5><hr>
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php
                            $stmt = $conn->prepare("SELECT * FROM allbooklist JOIN allbooklist_volume ON allbooklist.book_id = allbooklist_volume.book_id WHERE allbooklist_volume.volume_id = 1 LIMIT 10");
                            $stmt->execute();
                            $booklist = $stmt->fetchAll();

                            foreach ($booklist as $book) {
                            ?>
                                <div class="swiper-slide d-flex flex-column">
                                    <a href="bookDetail.php?id=<?= $book['book_id']; ?>"><img src="<?= $book['book_img_volume']; ?>" alt="" height="200" width="200" class="rounded-circle"></a>
                                    <p class="mt-3 fw-bold"><?= $book['book_name']; ?></p><br><br>
                                </div>
                            <?php } ?>
                        </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'bookModal.php'; ?>
    <div class="container px-4">
        <div class="d-flex flex-column align-items-center text-center">
            <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
                <h5>สินค้ามาใหม่สำหรับคุณ</h5><hr>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php
                        $stmt = $conn->prepare("SELECT * FROM allbooklist JOIN allbooklist_volume JOIN book_volume JOIN book_type ON allbooklist.book_id = allbooklist_volume.book_id AND 
                        allbooklist_volume.volume_id = book_volume.volume_id AND allbooklist_volume.type_id = book_type.type_id ORDER BY allbooklist_volume.created_at DESC LIMIT 10");
                        $stmt->execute();
                        $booklist = $stmt->fetchAll();

                        foreach ($booklist as $book) {
                        ?>
                            <div class="swiper-slide d-flex flex-column">
                                <a data-id='<?= $book['allbook_id']; ?>' class="userinfo"><img src="<?= $book['book_img_volume']; ?>" alt="" height="200" width="100%"></a>
                                <a href="bookDetailVolume.php?id=<?= $book['allbook_id']; ?>" class="nav-link"><p class="fs-6 mt-3"><?= $book['book_type_name']; ?> <?= $book['book_name']; ?> <?= $book['volume_name']; ?></p></a>
                                <form action="index.php" method="post" enctype="multipart/form-data">
                                    <button class="btn btn-outline-primary" type="submit" name="addToCartIndex">เพิ่ม - ฿<?= $book['book_price_volume']; ?>
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
        <div class="d-flex flex-column align-items-center text-center">
            <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
                <h5>Light Novel แนะนำ</h5><hr>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php
                        $stmt = $conn->prepare("SELECT * FROM allbooklist JOIN allbooklist_volume JOIN book_volume JOIN book_type ON allbooklist.book_id = allbooklist_volume.book_id AND 
                        allbooklist_volume.volume_id = book_volume.volume_id AND allbooklist_volume.type_id = book_type.type_id 
                        WHERE allbooklist_volume.type_id = 1 ORDER BY allbooklist_volume.book_count DESC LIMIT 10");
                        $stmt->execute();
                        $booklist = $stmt->fetchAll();

                        foreach ($booklist as $book) {
                        ?>
                            <div class="swiper-slide d-flex flex-column">
                                <a data-id='<?= $book['allbook_id']; ?>' class="userinfo"><img src="<?= $book['book_img_volume']; ?>" alt="" height="200" width="100%"></a>
                                <a href="bookDetailVolume.php?id=<?= $book['allbook_id']; ?>" class="nav-link"><p class="fs-6 mt-3"><?= $book['book_type_name']; ?> <?= $book['book_name']; ?> <?= $book['volume_name']; ?></p></a>
                                <form action="index.php" method="post" enctype="multipart/form-data">
                                    <button class="btn btn-outline-primary" type="submit" name="addToCartIndex">เพิ่ม - ฿<?= $book['book_price_volume']; ?>
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
        <div class="d-flex flex-column align-items-center text-center">
            <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
                <h5>Manga สินค้าขายดี</h5><hr>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php
                        $stmt = $conn->prepare("SELECT * FROM allbooklist JOIN allbooklist_volume JOIN book_volume JOIN book_type ON allbooklist.book_id = allbooklist_volume.book_id AND 
                        allbooklist_volume.volume_id = book_volume.volume_id AND allbooklist_volume.type_id = book_type.type_id 
                        WHERE allbooklist_volume.type_id = 2 ORDER BY allbooklist_volume.book_count DESC LIMIT 10");
                        $stmt->execute();
                        $booklist = $stmt->fetchAll();

                        foreach ($booklist as $book) {
                        ?>
                            <div class="swiper-slide d-flex flex-column">
                                <a data-id='<?= $book['allbook_id']; ?>' class="userinfo"><img src="<?= $book['book_img_volume']; ?>" alt="" height="200" width="100%"></a>
                                <a href="bookDetailVolume.php?id=<?= $book['allbook_id']; ?>" class="nav-link"><p class="fs-6 mt-3"><?= $book['book_type_name']; ?> <?= $book['book_name']; ?> <?= $book['volume_name']; ?></p></a>
                                <form action="index.php" method="post" enctype="multipart/form-data">
                                    <button class="btn btn-outline-primary" type="submit" name="addToCartIndex">เพิ่ม - ฿<?= $book['book_price_volume']; ?>
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
    <script src="toast.js"></script>
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

