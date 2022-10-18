<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<?php
session_start();
require_once '../config/db.php';

if (isset($_POST['register'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password  = $_POST['c_password'];
    $urole = 'user';

    if (empty($firstname)) {
        $_SESSION['registererror'] = 'กรุณากรอกชื่อ';
    } else if (empty($lastname)) {
        $_SESSION['registererror'] = 'กรุณากรอกนามสกุล';
    } else if (empty($email)) {
        $_SESSION['registererror'] = 'กรุณากรอกอีเมล';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['registererror'] = 'รูปแบบอีเมลไม่ถูกต้อง';
    } else if (empty($password)) {
        $_SESSION['registererror'] = 'กรุณากรอกรหัสผ่าน';
    } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        $_SESSION['registererror'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5-20 ตัวอักษร';
    } else if (empty($c_password)) {
        $_SESSION['registererror'] = 'กรุณายืนยันรหัสผ่าน';
    } else if ($password != $c_password) {
        $_SESSION['registererror'] = 'รหัสผ่านไม่ตรงกัน';
    } else {
        try {
            $check_email = $conn->prepare("SELECT user_email FROM user WHERE user_email = :email");
            $check_email->bindParam(":email", $email);
            $check_email->execute();
            $row = $check_email->fetch(PDO::FETCH_ASSOC);
                    
            if ($row['email'] == $email) {
                $_SESSION['warning'] = "มีอีเมลนี้อยู่ในระบบแล้ว <a href='signin.php'>กดที่นี่</a> เพื่อเข้าสู่ระบบ";
                header("location: index.php");
            } else if (!isset($_SESSION['error'])) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO user(user_firstname, user_lastname, user_birthday, user_gender, user_email, user_password, user_role) 
                VALUES (:firstname, :lastname, :birthdate, :gender, :email, :password, :urole)");
                $stmt->bindParam(":firstname", $firstname);
                $stmt->bindParam(":lastname", $lastname);
                $stmt->bindParam(":birthdate", $birthdate);
                $stmt->bindParam(":gender", $gender);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":password", $passwordHash);
                $stmt->bindParam(":urole", $urole);
                $stmt->execute();
                echo '<script>
                    setTimeout(function() {
                        swal({
                            title: "สมัครสมาชิกสำเร็จ",
                             type: "success"
                        }, function() {
                            window.location = "index.php";
                        });
                    }, 10);
                </script>';
            } else {
                $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                header("location: index.php");
            }
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}   
?>