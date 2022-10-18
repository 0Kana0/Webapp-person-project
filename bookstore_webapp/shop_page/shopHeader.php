<?php
session_start();
require_once '../config/db.php';

$stmt = $conn->prepare("SELECT * FROM user_gender");
$stmt->execute();
$genders = $stmt->fetchAll();
?>

<?php if (isset($_SESSION['admin_login'])) { ?>
    <nav class="navbar col-md-12 navbar-expand-sm navbar-dark bg-primary sticky-top">
        <div class="col-md-1"></div>
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="fa-solid fa-bars"></i></button>
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">Book Store</a>
            <div class="collapse navbar-collapse" id="navbarToggle">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">หน้าเเรก</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">ขายดี</a>
                    </li>
                    <li class="nav-item">
                        <a href="allBook.php" class="nav-link">ซีรีย์ทั้งหมด</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">มังงะ</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">ไลท์โนเวล</a>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="adminProfile.php" class="nav-link me-3"><i class="fa-solid fa-user"></i></a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link me-3"><i class="fa-solid fa-right-from-bracket"></i></i></a>
                </li>
                <li class="nav-item">
                    <a href="cart.php" class="nav-link position-relative">
                        <i class="fa-solid fa-cart-shopping">
                            <?php 
                            if ($_SESSION['addcart']) { 
                                $i=0;
                                foreach ($_SESSION['addcart'] as $bookcount) {
                                    $i+=$bookcount['book_qty']; 
                                } 
                            }
                            ?>
                            <span class="position-absolute top-0 start-100 badge rounded-pill bg-danger"><?= $i ?></span>
                        </i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-1"></div>
    </nav>
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdroped with scrolling</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <p>Try scrolling the rest of the page to see this option in action.</p>
        </div>
    </div>
<?php } else if (isset($_SESSION['user_login'])) { ?>
    <nav class="navbar col-md-12 navbar-expand-sm navbar-dark bg-primary sticky-top">
        <div class="col-md-1"></div>
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="fa-solid fa-bars"></i></button>
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">Book Store</a>
            <div class="collapse navbar-collapse" id="navbarToggle">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">หน้าเเรก</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">ขายดี</a>
                    </li>
                    <li class="nav-item">
                        <a href="allBook.php" class="nav-link">ซีรีย์ทั้งหมด</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">มังงะ</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">ไลท์โนเวล</a>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="userProfile.php" class="nav-link me-3"><i class="fa-solid fa-user"></i></a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link me-3"><i class="fa-solid fa-right-from-bracket"></i></i></a>
                </li>
                <li class="nav-item">
                    <a href="cart.php" class="nav-link position-relative">
                        <i class="fa-solid fa-cart-shopping">
                            <?php 
                            if ($_SESSION['addcart']) { 
                                $i=0;
                                foreach ($_SESSION['addcart'] as $bookcount) {
                                    $i+=$bookcount['book_qty']; 
                                } 
                            }
                            ?>
                            <span class="position-absolute top-0 start-100 badge rounded-pill bg-danger"><?= $i ?></span>
                        </i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-1"></div>
    </nav>
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdroped with scrolling</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <p>Try scrolling the rest of the page to see this option in action.</p>
        </div>
    </div>
<?php } else { ?>
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-5">
                    <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">เข้าสู่ระบบ</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">สมัครสมาชิก</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form action="loginBackend.php" method="post" enctype="multipart/form-data">
                                <br>
                                <div class="mt-2">
                                    <div class="col-md-12"><input type="email" class="form-control" name="email" aria-describedby="email" placeholder="อีเมล" value="" required></div><br>
                                    <div class="col-md-12"><input type="password" class="form-control" name="password" placeholder="รหัสผ่าน" value="" required></div>
                                    <a href="#" class="nav-link"><p class="d-flex flex-row-reverse">ลืมรหัสผ่าน?</p></a>
                                </div><br>
                                <div class="text-center"><button class="col-md-12 btn btn-outline-primary profile-button" type="submit" name="login">เข้าสู่ระบบ</button></div>
                            </form> 
                            <hr>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form action="registrationBackend.php" method="post" enctype="multipart/form-data">
                                <br>
                                <div class="row mt-2">
                                    <div class="col-md-6"><input type="text" class="form-control" placeholder="ชื่อ" name="firstname" value="" required></div>
                                    <div class="col-md-6"><input type="text" class="form-control" placeholder="นามสกุล" name="lastname" value="" required></div>
                                </div><br>
                                <div class="row mt-2">
                                    <div class="col-md-6"><input type="date" class="form-control" placeholder="วันเกิด" name="birthdate" value="" required></div>
                                    <div class="col-md-6">
                                        <select class="form-select" name="gender" aria-label="Default select example" required>
                                            <option selected>เลือกเพศ</option>
                                            <?php foreach ($genders as $gender) { ?>
                                                <option value="<?= $gender['gender_id']; ?>"><?= $gender['gender_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div><br>
                                <div class="col-md-12"><input type="email" class="form-control" name="email" aria-describedby="email" placeholder="อีเมล" value="" required></div><br>
                                <div class="col-md-12"><input type="password" class="form-control" name="password" placeholder="รหัสผ่าน" value="" required></div><br>
                                <div class="col-md-12"><input type="password" class="form-control" name="c_password" placeholder="ยืนยันรหัสผ่าน" value="" required></div><br><br>
                                <div class="text-center"><button class="col-md-12 btn btn-outline-primary profile-button" type="submit" name="register">สมัครสมาชิก</button></div>
                            </form> 
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar col-md-12 navbar-expand-sm navbar-dark bg-primary sticky-top">
        <div class="col-md-1"></div>
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="fa-solid fa-bars"></i></button>
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">Book Store</a>
            <div class="collapse navbar-collapse" id="navbarToggle">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">หน้าเเรก</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">ขายดี</a>
                    </li>
                    <li class="nav-item">
                        <a href="allBook.php" class="nav-link">ซีรีย์ทั้งหมด</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">มังงะ</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">ไลท์โนเวล</a>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link me-3" data-bs-toggle="modal" data-bs-target="#userModal"><i class="fa-solid fa-user"></i></a>
                </li>
                <li class="nav-item">
                    <a href="cart.php" class="nav-link position-relative">
                        <i class="fa-solid fa-cart-shopping">
                            <?php 
                            if ($_SESSION['addcart']) { 
                                $i=0;
                                foreach ($_SESSION['addcart'] as $bookcount) {
                                    $i+=$bookcount['book_qty']; 
                                } 
                            }
                            ?>
                            <span class="position-absolute top-0 start-100 badge rounded-pill bg-danger"><?= $i ?></span>
                        </i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-1"></div>
    </nav>
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Backdroped with scrolling</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <p>Try scrolling the rest of the page to see this option in action.</p>
        </div>
    </div>
<?php } ?>