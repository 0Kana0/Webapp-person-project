<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_login'])) {
    header('location: index.php');
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];

    $sql = $conn->prepare("UPDATE user 
    SET user_firstname = :firstname, user_lastname = :lastname, user_birthday = :birthdate, user_gender = :gender
    WHERE user_id = :id");
    $sql->bindParam(":id", $id);
    $sql->bindParam(":firstname", $firstname);
    $sql->bindParam(":lastname", $lastname);
    $sql->bindParam(":birthdate", $birthdate);
    $sql->bindParam(":gender", $gender);
    $sql->execute();

    if ($sql) {
        echo '<script>
                setTimeout(function() {
                swal({
                    title: "เเก้ไขข้อมูลส่วนตัวสำเร็จ",
                    type: "warning"
                }, function() {
                    window.location = "userEdit.php";
                });
            }, 10);
        </script>';
    }
}
?>