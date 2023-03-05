<?php 
session_start();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
$page_title = "Registration Form";
include('includes/header.php'); 
include('includes/navbar.php');

if(isset($_SESSION['authentificated']))
{
    $_SESSION['status'] = "You are already logged in.";
    header('Location: dashboard.php');
    exit(0);
}

?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="alert">
                        <?php
                        if(isset($_SESSION['status']))
                        {
                            ?>
                            <div class="alert alert-success">
                                <h5><?= $_SESSION['status'];?></h5>
                            </div>
                            <?php
                            unset($_SESSION['status']);
                        }
                        ?>
                </div>
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Registration Form</h5>
                    </div>
                    <div class="card-body">

                       <form action="code.php" method="POST">
    <div class="form-group mb-3">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" required minlength="5">
    </div>
     <div class="form-group mb-3">
        <label for="">Phone number</label>
        <input type="text" name="phone" class="form-control" pattern="[0-9]*" inputmode="numeric" title="Only numbers">
     </div>
    <div class="form-group mb-3">
        <label for="">Email Address</label>
        <input type="email" name="email" class="form-control" required minlength="5">
    </div>
    <div class="form-group mb-3">
        <label for="">Password</label>
        <input type="password" name="password" class="form-control" required minlength="8">
    </div>
    <div class="form-group mb-3">
        <label for="">Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control" required minlength="8">
    </div>
    <div class="form-group">
        <button type="submit" name="register_btn" class="btn btn-primary">Register Now</button>
    </div>
</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>