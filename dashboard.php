<?php
include('authentification.php');
error_reporting(0);
ini_set('display_errors', 0);
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
$page_title = "Dashboard";
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php
                    if(isset($_SESSION['status']))
                    {
                        ?>
                        <div class="alert alert-success">
                            <h5><?= $_SESSION['status']; ?></h5>
                        </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4>User Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <h4>Welcome!</h4>
                        <hr>
                        <h5>Username: <?= $_SESSION['auth_user']['username']; ?></h5>
                        <h5>Email: <?= $_SESSION['auth_user']['email']; ?></h5>
                        <h5>Phone: <?= $_SESSION['auth_user']['phone']; ?></h5>
                    </div>
                    
               <div class="row">
          <p style="text-align: center; margin: 20px 0px 20px 0px; font-size: 45px;">PHP Project:</p>
          <hr>
        </div>
        <div class="row" style="padding: 20px;">
            <div class="col-sm-6 col-md-6 col-lg-6">
            <a style="color: black; text-decoration: none;" target="_blank" href="https://webook.ro/phpprojects/chatbot/"><img style="width: 50%; margin-left: auto; margin-right: auto; display: block;" src="images/chatbot.jpg"/>
            <p style="color: black; text-decoration: none;text-align: center; margin-top: 15px; font-size: 20px;">Chatbot (in PHP using AJAX)</p></a>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6">
            <a style="color: black; text-decoration: none;" target="_blank" href="https://webook.ro/phpprojects/weatherapp/"><img style="width: 50%; margin-left: auto; margin-right: auto; display: block;" src="images/weather.png"/>
            <p style="color: black; text-decoration: none;text-align: center; margin-top: 15px; font-size: 20px;">Weather App (With API and AJAX)</p></a>
            </div>
      </div>
        <div class="row">
          <p style="text-align: center; margin: 20px 0px 20px 0px; font-size: 45px;">JavaScript Projects:</p>
          <hr>
        </div>
        <div class="row" style="padding: 20px;">
          <div class="col-sm-6 col-md-6 col-lg-6">
                <a style="color: black; text-decoration: none;" target="_blank" href="https://webook.ro/tic_tac_toe_by_Cristian_Ilie/"><img style="width: 50%; margin-left: auto; margin-right: auto; display: block;" src="images/1.png"/>
                <p style="color: black; text-decoration: none;text-align: center; margin-top: 15px; font-size: 20px;">Tic Tac Toe (pure HTML, CSS and JS)</p></a>
              </div>

              <div class="col-sm-6 col-md-6 col-lg-6">
                <a style="color: black; text-decoration: none;" target="_blank" href="https://webook.ro/calculator/"><img style="width: 50%; margin-left: auto; margin-right: auto; display: block;" src="images/Calculator_512.webp"/>
                <p style="color: black; text-decoration: none;text-align: center; margin-top: 15px; font-size: 20px;">Calculator (only HTML, CSS and JS)</p></a>
              </div>
        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>