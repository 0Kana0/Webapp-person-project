<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<?php
    session_start();
    unset($_SESSION['user_login']);
    unset($_SESSION['admin_login']);
    unset($_SESSION['committee_login']);
    echo '<script>
        setTimeout(function() {
            swal({
                title: "ออกจากระบบสำเร็จ",
                type: "error"
            }, function() {
             window.location = "index.php";
            });
        }, 10);
    </script>';
?>