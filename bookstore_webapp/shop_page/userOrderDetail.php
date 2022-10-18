<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_login'])) {
    header('location: index.php');
} 
if (isset($_SESSION['user_login'])) {
    $user_id = $_SESSION['user_login'];
    $stmt = $conn->prepare("SELECT * FROM user JOIN user_gender JOIN order_user 
    ON user.user_gender = user_gender.gender_id AND order_user.user_id = user.user_id 
    WHERE user.user_id = $user_id");
    $stmt->execute();
    $books = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bookstore | คำสั่งซื้อทั้งหมด</title>
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
                                <h4>คำสั่งซื้อทั้งหมด</h4>
                            </div><hr><br>
                            <?php if ($books) { ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">หมายเลขคำสั่งซื้อ</th>
                                        <th scope="col">วัน เวลา</th>
                                        <th scope="col">ชื่อ</th>
                                        <th scope="col">ยอดซื้อ</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count = 0;
                                        foreach ($books as $book) {
                                            $count++;
                                    ?>
                                        <tr>
                                            <td>#<?= $book['order_id']; ?></td>
                                            <td><?= date('d/m/Y',strtotime($book['created_at'])); ?><br>เวลา <?= date('H:i',strtotime($book['created_at'])); ?></td>
                                            <td><?= $book['user_firstname']; ?> <?= $book['user_lastname']; ?></td>
                                            <td>฿<?= $book['total']; ?></td>
                                            <td>
                                                <a href="userOrderDetailID.php?id=<?= $book['order_id']; ?>" class="btn btn-outline-warning">รายละเอียด</a>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    } else {
                                    ?>
                                        <div class="align-items-center text-center">
                                            <br><br><br><h4>ยังไม่มีรายการสั่งซื้อของผู้ใช้</h4><br><br><br><br><br><br><br><br>
                                        </div>
                                    <?php 
                                    } 
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            if ($count==1 && $count!=0) {
                                echo '<br><br><br><br><br><br>';
                            } else if ($count==2 && $count!=0) {
                                echo '<br><br><br>';
                            } 
                            ?>
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

