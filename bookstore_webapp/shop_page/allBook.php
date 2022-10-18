<?php
session_start();
require_once '../config/db.php';

$limit_page = 12;
if(isset($_GET["page"])){
    $start_page = $_GET["page"]*$limit_page;
} else {
    $start_page=0;
}
$countsql = $conn->prepare("SELECT COUNT(book_id) FROM allbooklist");
$countsql->execute();
$row = $countsql->fetch();
$num_rows = $row[0];
$num_page = ceil($num_rows/$limit_page);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bookstore | รายชื่อซีรีย์ทั้งหมด</title>
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
                <li class="breadcrumb-item" aria-current="page"><a href="index.php" class="text-decoration-none">หน้าเเรก</a></li>
                <li class="breadcrumb-item active" aria-current="page">รายชื่อซีรีย์</li>
            </ol>
        </nav>
        <div class="d-flex flex-column align-items-center text-center">
            <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
                <h5>เรื่องยอดฮิต</h5><hr>
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <?php
                            $stmt = $conn->prepare("SELECT * FROM allbooklist JOIN allbooklist_volume ON allbooklist.book_id = allbooklist_volume.book_id WHERE allbooklist_volume.volume_id = 1 LIMIT 10");
                            $stmt->execute();
                            $booklist = $stmt->fetchAll();

                            foreach ($booklist as $book) { 
                            ?>
                                <div class="swiper-slide d-flex flex-column">
                                    <a href="bookDetail.php?id=<?= $book['book_id']; ?>"><img src="<?= $book['book_img_volume']; ?>" alt="" height="180" width="180"></a>
                                    <p class="mt-3 fw-bold"><?= $book['book_name']; ?></p><br><br>
                                </div>
                            <?php } ?>
                        </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div> 
        <div class="d-flex flex-column align-items-center text-center">
            <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
                <h5>ซีรีย์ทั้งหมด</h5><hr>
                <div class="row">
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM allbooklist JOIN allbooklist_volume ON allbooklist.book_id = allbooklist_volume.book_id AND allbooklist.book_type = allbooklist_volume.type_id WHERE allbooklist_volume.volume_id = 1 LIMIT $start_page,$limit_page");
                    $stmt->execute();
                    $booklist = $stmt->fetchAll();

                    foreach ($booklist as $book) {
                    ?>
                        <div class="col-md-3">
                            <a href="bookDetail.php?id=<?= $book['book_id']; ?>"><img src="<?= $book['book_img_volume']; ?>" alt="" height="300" width="70%"></a>
                            <p class="mt-3 fw-bold"><?= $book['book_name']; ?></p><br><br>
                        </div>
                    <?php } ?>
                </div>
                <nav aria-label="...">
                    <ul class="pagination justify-content-center">
                        <?php
                            if($start_page/$limit_page<=0) {
                        ?>
                            <li class="page-item disabled">
                                <a class="page-link" tabindex="-1">Previous</a>
                            </li>
                        <?php }else{ ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?=($start_page/$limit_page)-1?>" tabindex="-1">Previous</a>
                            </li>
                        <?php } ?>

                        <?php
                            for($i=0;$i<$num_page;$i++) {
                                if($_GET["page"] == $i) {
                        ?>
                            <li class="page-item active"><a class="page-link" href="?page=<?=$i?>"><?=$i+1?></a></li>
                        <?php } else {?>
                            <li class="page-item"><a class="page-link" href="?page=<?=$i?>"><?=$i+1?></a></li>
                        <?php } 
                        }
                        ?>

                        <?php
                            if($start_page/$limit_page>=$num_page-1) {
                        ?>
                            <li class="page-item disabled">
                                <a class="page-link" tabindex="-1">Next</a>
                            </li>
                        <?php }else{ ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?=($start_page/$limit_page)+1?>">Next</a>
                            </li>
                        <?php } ?>        
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <?php require_once 'shopFooter.php'; ?>            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
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
</body>
</html>

