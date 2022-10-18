<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_login'])) {
    header('location: index.php');
} 
if (isset($_SESSION['user_login'])) {
    $user_id = $_SESSION['user_login'];
    $stmt = $conn->prepare("SELECT * FROM user JOIN user_gender 
    ON user.user_gender = user_gender.gender_id
    WHERE user.user_id = $user_id");
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
    <title>bookstore | ความคิดเห็นของผู้ใช้</title>
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
                                <h4>รีวิวของผู้ใช้</h4>
                            </div><hr><br>
                            <div class="align-items-center text-center">
                                <br><br><br><h4>ยังไม่มีรีวิวของผู้ใช้</h4><br><br><br><br><br><br><br><br>
                            </div>
                            <br>
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

