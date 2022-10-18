<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['admin_login'])) {
    header('location: index.php');
} 
if (isset($_SESSION['admin_login'])) {
    $admin_id = $_SESSION['admin_login'];
    $stmt = $conn->prepare("SELECT * FROM user JOIN user_gender 
    ON user.user_gender = user_gender.gender_id
    WHERE user.user_id = $admin_id");
    $stmt->execute();
    $user = $stmt->fetch();
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
                        <?php require_once 'adminChangePage.php'; ?>
                    </div>
                    <div class="col-md-9">
                        <div class="p-4 px-5">
                            <div class="align-items-center text-center">
                                <h4>ข้อมูลส่วนตัว</h4>
                            </div><hr><br>
                            <ul class="list-group">
                                <li class="list-group-item p-3"><h5>ชื่อ : <?= $user['user_firstname']; ?> <?= $user['user_lastname']; ?></h5></li>
                                <li class="list-group-item p-3"><h5>วันเกิด : <?= date('d/m/Y',strtotime($user['user_birthday'])); ?></h5></li>
                                <li class="list-group-item p-3"><h5>เพศ : <?= $user['gender_name']; ?></h5></li>
                                <li class="list-group-item p-3"><h5>อีเมล : <?= $user['user_email']; ?></h5></li>
                            </ul><br><br>
                            <div class="align-items-center text-center">
                                <a href="adminEdit.php" class="btn btn-outline-info btn-lg col-md-6">
                                    <i class="fa-solid fa-pen-to-square"></i> แก้ไขข้อมูลส่วนตัว
                                </a>
                            </div><br>
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

