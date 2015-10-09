<?php
    require_once("../../includes/initialize.php");
    if(!$session->is_logged_in()) {
        if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $user_id = mysql_real_escape_string($_POST['user_id']);
            $first_name = mysql_real_escape_string($_POST['first_name']);
            $last_name = mysql_real_escape_string($_POST['last_name']);
            $username = mysql_real_escape_string($_POST['username']);
            $email = mysql_real_escape_string($_POST['email']);
            $password = mysql_real_escape_string($_POST['password']);
             
            $checkusername = mysql_query("SELECT * FROM users WHERE Username = '".$username."'");
              
            if(mysql_num_rows($checkusername) == 1){
              echo "<script type='text/javascript'>alert('Error! Sorry, that username is taken. Please go back and try again.')</script>";
            }
            else{
                $registerquery = mysql_query("INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`) VALUES('$user_id', '$username',  '$email', '$password', '$first_name', '$last_name')");
                if($registerquery){
                    redirect_to('../index.php');
                }
                else{
                    echo "<script type='text/javascript'>alert('Error! your registration failed. Please go back and try again.')</script>";
                }       
            }
        }
    }
?>

<html>
  <head>
    <title> Register | ArtDiscrete </title>
    <link href="../stylesheets/registerstyle.css" rel="Stylesheet" type="text/css"/> 
  </head>
  <body>
    <div class="register-container">
      <header>
        <div class="header-container">
          <div class="nav-holder">
            <div class="nav-wrapper">
              <div class="button">
                
              </div>
              <div class="button">
                <a href="../index.php"><span> Home </span></a>
              </div>
              <div class="button">
                <a href="../admin/about.php"><span> About </span></a>
              </div>
              <div class="button">
                <a href="../admin/changelog.php"><span> Updates </span></a>
              </div>
              <div class="button">
                <a href="../admin/login.php"><span> Login </span></a>
              </div>
            </div>
          </div>
          <a href="index.php">
          <div class="logo-holder">

          </div>
          </a>
        </div>
      </header>
      <section>
        <div class="register-section">
          <div class="register-form">
            <div class="form-desc">
              <div class="half">
                <span> Register</span>
              </div>
              <div class="half">
                Gain access to the Members Area!
              </div>
              <hr />
            </div>
            <div class="form-input">
              <form method="POST" action="register.php">
              <input type="text" name ="first_name" placeholder="First Name" class="full" required/>
              <input type="text" name ="last_name" placeholder="Last Name" class="full" required/>
              <input type="text" name ="username" placeholder="Username" class="full" required/>
              <input type="text" name ="email" placeholder="E-mail Address" class="full" required/>
              <input type="password" name="password" placeholder="New Password" class="full" required/>
              <input type="password" placeholder="Re-enter Password" class="Full" required/>
              <div class="signupdesc">
                By clicking Sign Up, you agree to our <a href="terms.php"> Terms </a> and that you
                have read our Data Policy.
              </div>
              <input type="submit" name="submit" value="Sign Up" class="signup" />
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
  </body>
</html>