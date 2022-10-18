<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_login'])) {
    header('location: index.php');
}

if (isset($_POST['addAddress'])) {
    $id = $_POST['id'];
    $address = $_POST['address'];
    $postcode = $_POST['postcode'];
    $district = $_POST['district'];
    $province = $_POST['province'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("INSERT INTO user_address(user_id, user_address, user_postcode, user_district, user_province, user_country, user_phone) 
    VALUES (:id, :address, :postcode, :district, :province, :country, :phone)");
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":address", $address);
    $stmt->bindParam(":postcode", $postcode);
    $stmt->bindParam(":district", $district);
    $stmt->bindParam(":province", $province);
    $stmt->bindParam(":country", $country);
    $stmt->bindParam(":phone", $phone);
    $stmt->execute();
    if ($stmt) {
        echo '<script>
                setTimeout(function() {
                swal({
                    title: "เพิ่มที่อยู่จัดส่งสำเร็จ",
                    type: "success"
                }, function() {
                    window.location = "userAddress.php";
                });
            }, 10);
        </script>';
    }
}

if (isset($_POST['editAddress'])) {
    $id = $_POST['address_id'];
    $address = $_POST['address'];
    $postcode = $_POST['postcode'];
    $district = $_POST['district'];
    $province = $_POST['province'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];

    $sql = $conn->prepare("UPDATE user_address 
    SET user_address = :address, user_postcode = :postcode, user_district = :district, user_province = :province, user_country = :country, user_phone = :phone
    WHERE address_id = :id");
    $sql->bindParam(":id", $id);
    $sql->bindParam(":address", $address);
    $sql->bindParam(":postcode", $postcode);
    $sql->bindParam(":district", $district);
    $sql->bindParam(":province", $province);
    $sql->bindParam(":country", $country);
    $sql->bindParam(":phone", $phone);
    $sql->execute();
    if ($sql) {
        echo '<script>
                setTimeout(function() {
                swal({
                    title: "เเก้ไขที่อยู่จัดส่งสำเร็จ",
                    type: "warning"
                }, function() {
                    window.location = "userAddress.php";
                });
            }, 10);
        </script>';
    }
}
?>