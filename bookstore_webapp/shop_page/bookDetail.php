<?php
session_start();
require_once '../config/db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM allbooklist JOIN allbooklist_volume JOIN book_release JOIN book_rate
    ON allbooklist.book_id = allbooklist_volume.book_id AND allbooklist.book_release = book_release.release_id AND allbooklist.book_rate = book_rate.rate_id
    WHERE allbooklist_volume.volume_id = 1 AND allbooklist.book_id = $id");
    $stmt->execute();
    $book = $stmt->fetch();
}

if (isset($_POST['addToCart'])) {
    $cart_id = $_POST['cart_id'];
    $book_qty = $_POST['book_qty'];
    $success=0;
    require_once 'cartBackend.php';
    if ($success!=0) {
        echo '<script>
                window.alert("นำสินค้าใส่ตระกร้าเรียบร้อยแล้ว");
                window.location.replace("bookDetail.php?id='.$book['book_id'].'");
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
                <li class="breadcrumb-item active" aria-current="page"><?= $book['book_name']; ?></li>
            </ol>
        </nav><br>
        <img src="<?= $book['book_cover']; ?>" alt="" height="450" width="100%"><br><br>
        <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
            <div class="d-flex flex-column align-items-center text-center ms-3 pt-2 me-3">
                <h4>รายละเอียดของหนังสือ</h4>
            </div>
            <hr>
            <div class="container rounded bg-white">
                <div class="row">
                    <div class="col-md-8 border-right">
                        <div class="p-3">
                            <div class="align-items-center text-center">
                                <h4 class="text-right"><?= $book['book_name']; ?></h4><br>
                                <p>เรื่องย่อ : </p>
                                <p><?= $book['book_detail']; ?></p><br><br>
                                <iframe width="75%" height="320" src="https://www.youtube.com/embed/<?= $book['book_video']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br><br>
                                <?php
                                $stmt2 = $conn->prepare("SELECT * FROM book_genres");
                                $stmt2->execute();
                                $book_genres = $stmt2->fetchAll();

                                $array_genres = array("");
                                $selected_genres = explode(",",$book['book_genres']);   
                                foreach ($book_genres as $genres) {
                                    if(in_array($genres['genres_id'],$selected_genres)) { 
                                        array_push($array_genres,$genres['genres_name']);
                                    } 
                                }
                                ?>
                                <span>เเนว : </span>
                                <?php
                                foreach ($array_genres as $genres) {
                                ?>
                                    <span><?= $genres ?></span>
                                <?php } ?>
                            </div>
                        </div>   
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 py-5">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="<?= $book['book_img_volume']; ?>" alt="" height="300" width="60%">
                                <br>
                                <p>ชื่อเรื่อง : <?= $book['book_name']; ?></p>
                                <?php
                                $stmt2 = $conn->prepare("SELECT * FROM book_type");
                                $stmt2->execute();
                                $book_type = $stmt2->fetchAll();

                                $array_type = array("");
                                $selected_type = explode(",",$book['book_type']);   
                                foreach ($book_type as $type) {
                                    if(in_array($type['type_id'],$selected_type)) { 
                                        array_push($array_type,$type['type_name']);
                                    } 
                                }
                                ?>
                                <span>เเนว : 
                                <?php
                                foreach ($array_type as $type) {
                                ?>
                                    <span><?= $type ?></span>
                                <?php } ?></span><br>
                                <p>แต่งเรื่อง : <?= $book['book_author']; ?></p>
                                <p>เริ่มเผยแพร่ : <?= $book['release_year']; ?></p>
                                <p>เรท : <?= $book['rate_name']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <?php require_once 'bookModal.php'; ?>
        <?php
        $stmt2 = $conn->prepare("SELECT * FROM book_type");
        $stmt2->execute();
        $book_type = $stmt2->fetchAll();

        $array_type = array("");
        $selected_type = explode(",",$book['book_type']);   
        foreach ($book_type as $type) {
            if(in_array($type['type_id'],$selected_type)) { 
                array_push($array_type,$type['type_name']);
            } 
        }
        ?>
        <div class="d-flex flex-column align-items-center text-center">
            <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
                <?php
                foreach ($array_type as $type) {
                    if ($type == 'Light Novel') {
                ?>
                    <div class="d-flex justify-content-between align-items-center experience ms-3 pt-2 me-3">
                        <?php
                        $book_id = $_GET['id'];
                        $countsql = $conn->prepare("SELECT COUNT(book_id) FROM allbooklist_volume WHERE book_id = $book_id AND type_id = 1");
                        $countsql->execute();
                        $row = $countsql->fetch();
                        $num_rows = $row[0];
                        ?>
                        <h5>Light Novel</h5><h5>มี <?= $num_rows; ?> รายการ</h5>
                    </div>
                    <hr>
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php
                            $stmt = $conn->prepare("SELECT * FROM allbooklist JOIN allbooklist_volume JOIN book_volume JOIN book_type ON allbooklist.book_id = allbooklist_volume.book_id AND 
                            allbooklist_volume.volume_id = book_volume.volume_id AND allbooklist_volume.type_id = book_type.type_id WHERE allbooklist.book_id = $id AND allbooklist_volume.type_id = 1 ORDER BY allbooklist_volume.created_at DESC");
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
                <?php  
                    } else if ($type == 'Novel') {
                ?>
                    <div class="d-flex justify-content-between align-items-center experience ms-3 pt-2 me-3">
                        <?php
                        $book_id = $_GET['id'];
                        $countsql = $conn->prepare("SELECT COUNT(book_id) FROM allbooklist_volume WHERE book_id = $book_id AND type_id = 3");
                        $countsql->execute();
                        $row = $countsql->fetch();
                        $num_rows = $row[0];
                        ?>
                        <h5>Novel</h5><h5>มี <?= $num_rows; ?> รายการ</h5>
                    </div>
                    <hr>
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php
                            $stmt = $conn->prepare("SELECT * FROM allbooklist JOIN allbooklist_volume JOIN book_volume JOIN book_type ON allbooklist.book_id = allbooklist_volume.book_id AND 
                            allbooklist_volume.volume_id = book_volume.volume_id AND allbooklist_volume.type_id = book_type.type_id WHERE allbooklist.book_id = $id AND allbooklist_volume.type_id = 3 ORDER BY allbooklist_volume.created_at DESC");
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
                <?php
                    } else if ($type == 'Manga') {
                ?>
                    <div class="d-flex justify-content-between align-items-center experience ms-3 pt-2 me-3">
                        <?php
                        $book_id = $_GET['id'];
                        $countsql = $conn->prepare("SELECT COUNT(book_id) FROM allbooklist_volume WHERE book_id = $book_id AND type_id = 2");
                        $countsql->execute();
                        $row = $countsql->fetch();
                        $num_rows = $row[0];
                        ?>
                        <h5>Manga</h5><h5>มี <?= $num_rows; ?> รายการ</h5>
                    </div>
                    <hr>
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php
                            $stmt = $conn->prepare("SELECT * FROM allbooklist JOIN allbooklist_volume JOIN book_volume JOIN book_type ON allbooklist.book_id = allbooklist_volume.book_id AND 
                            allbooklist_volume.volume_id = book_volume.volume_id AND allbooklist_volume.type_id = book_type.type_id WHERE allbooklist.book_id = $id AND allbooklist_volume.type_id = 2 ORDER BY allbooklist_volume.created_at DESC");
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
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php require_once 'shopFooter.php'; ?>            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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