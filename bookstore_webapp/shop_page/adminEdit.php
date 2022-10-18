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
    <title>bookstore | แก้ไขข้อมูลส่วนตัว</title>
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
                                <h4>แก้ไขข้อมูลส่วนตัว</h4>
                            </div><hr><br>
                            <form action="adminBackend.php" method="post" enctype="multipart/form-data">
                                <div class="row mt-2">
                                    <div class="col-md-6"><input type="text" class="form-control" placeholder="ชื่อ" name="firstname" value="<?= $user['user_firstname']; ?>" required></div>
                                    <div class="col-md-6"><input type="text" class="form-control" placeholder="นามสกุล" name="lastname" value="<?= $user['user_lastname']; ?>" required></div>
                                </div><br>
                                <div class="row mt-2">
                                    <div class="col-md-6"><input type="date" class="form-control" placeholder="วันเกิด" name="birthdate" value="<?= $user['user_birthday']; ?>" required></div>
                                    <div class="col-md-6">
                                        <select class="form-select" name="gender" aria-label="Default select example" required>
                                            <option selected>เลือกเพศ</option>
                                            <?php 
                                                $selected = $user['user_gender'];
                                                foreach ($genders as $gender) { 
                                                    if ($selected == $gender['gender_id']) {
                                            ?>
                                                    <option selected="$selected" value="<?= $gender['gender_id']; ?>"><?= $gender['gender_name']; ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $gender['gender_id']; ?>"><?= $gender['gender_name']; ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div> 
                                </div><br>
                                <input type="hidden" value="<?= $user['user_id']; ?>" name="id">
                                <div class="col-md-12"><input type="email" readonly class="form-control" name="email" aria-describedby="email" placeholder="อีเมล" value="<?= $user['user_email']; ?>" required></div><br><br>
                                <div class="modal-footer">
                                    <button class="btn btn-outline-success btn-lg col-md-2" type="submit" name="update">
                                        <i class="fa-solid fa-pen-to-square"></i> ยืนยัน
                                    </button>
                                    <a href="adminProfile.php" class="ms-2 btn btn-outline-danger btn-lg col-md-2">
                                        <i class="fa-solid fa-ban"></i> ยกเลิก
                                    </a>
                                </div><br>
                            </form> 
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

