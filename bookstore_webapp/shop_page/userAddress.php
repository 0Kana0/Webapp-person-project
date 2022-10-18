<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_login'])) {
    header('location: index.php');
} 
if (isset($_SESSION['user_login'])) {
    $user_id = $_SESSION['user_login'];
    $stmt = $conn->prepare("SELECT * FROM user JOIN user_gender JOIN user_address
    ON user.user_gender = user_gender.gender_id AND user.user_id = user_address.user_id
    WHERE user.user_id = $user_id");
    $stmt->execute();
    $users = $stmt->fetchAll();
}
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $deletestmt = $conn->query("DELETE FROM user_address WHERE address_id = $delete_id");
    $deletestmt->execute();

    if ($deletestmt) {
        echo "<script>alert('ลบที่อยู่จัดส่งสำเร็จ');</script>";
        header("refresh:0.1; url=userAddress.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bookstore | ข้อมูลส่วนตัว</title>
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
                        <?php require_once 'userChangePage.php'; ?>
                    </div>
                    <div class="col-md-9">
                        <div class="p-4 px-5">
                            <div class="align-items-center text-center">
                                <h4>ที่อยู่จัดส่งของผู้ใช้</h4>
                            </div><hr>
                            <a href="userAddressAdd.php" class="btn btn-outline-primary btn-lg col-md-2">
                                <i class="fa-solid fa-plus"></i> เพิ่มที่อยู่
                            </a><br><br>
                            <?php 
                            $i = 1;
                            if ($users) {
                                foreach ($users as $user) { 
                            ?>
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
                                    </div><hr>
                                    <div class="card-body d-flex justify-content-between align-items-center experience">
                                        <a href="userAddressEdit.php?id=<?= $user['address_id']; ?>" class="btn btn-outline-info col-md-2" >
                                            <i class="fa-solid fa-pen-to-square"></i> เเก้ไข
                                        </a>
                                        <a href="?delete=<?= $user['address_id']; ?>" class="ms-2 btn btn-outline-danger col-md-2">
                                            <i class="fa-solid fa-trash-can"></i> ลบ
                                        </a>
                                    </div>
                                </div><br>
                            <?php $i++; } 
                                } else {
                            ?>
                                <div class="align-items-center text-center">
                                    <br><br><br><h4>ยังไม่มีที่อยู่จัดส่ง</h4><br><br><br><br><br><br><br><br>
                                </div>
                            <?php } ?>
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

