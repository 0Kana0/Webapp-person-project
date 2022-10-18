<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<?php
session_start();
require_once '../config/db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $check_data = $conn->prepare("SELECT * FROM user WHERE user_email = :email");
        $check_data->bindParam(":email", $email);
        $check_data->execute();
        $row = $check_data->fetch(PDO::FETCH_ASSOC);

        if ($check_data->rowCount()>0) {
            if ($email == $row['user_email']) {
                if (password_verify($password, $row['user_password'])) {
                    if ($row['user_role'] == 'admin') {
                        $_SESSION['admin_login'] = $row['user_id'];
                        echo '<script>
                            setTimeout(function() {
                                swal({
                                    title: "เข้าสู่ระบบสำเร็จ ผู้ดูแล '.$row['user_firstname'].'",
                                    type: "success"
                                }, function() {
                                    window.location = "index.php";
                                });
                            }, 10);
                        </script>';
                    } else if ($row['user_role'] == 'user') {
                        $_SESSION['user_login'] = $row['user_id'];
                        echo '<script>
                            setTimeout(function() {
                                swal({
                                    title: "เข้าสู่ระบบสำเร็จ ผู้ใช้ '.$row['user_firstname'].'",
                                    type: "success"
                                }, function() {
                                    window.location = "index.php";
                                });
                            }, 10);
                        </script>';
                    }
                } else {
                    $_SESSION['error'] = "รหัสผ่านผิด";
                    header("location: index.php");
                }
            } else{
                $_SESSION['error'] = "อีเมลผิด";
                header("location: index.php");
            } 
        } else {
            $_SESSION['error'] = "ไม่มีข้อมูลในระบบ";
            header("location: index.php");
        }
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>