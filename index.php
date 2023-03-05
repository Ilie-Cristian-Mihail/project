<?php
$page_title = "Home Page";
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Login and registration System in PHP</h2>
                <h3>With Email Verification</h3>
                <h4>Please login in order to see other projects</h4>
                <div style="display: flex; align-items: center; justify-content: center; margin-top:50px;">
                    <button type="button" class="btn btn-dark" style="margin-right: 50px; width: 120px;"><a href="https://webook.ro/register.php" style="color: white; text-decoration: none;">Register now</a></button>
                    <span style="text-align: center; white-space: nowrap;">or</span>
                    <button type="button" class="btn btn-dark" style="margin-left: 50px; width: 120px;"><a href="https://webook.ro/login.php" style="color: white; text-decoration: none;">Login</a></button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>