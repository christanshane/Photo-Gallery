<?php
    require_once("../../includes/initialize.php");
    if(!$session->is_logged_in()) {
        if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['username']) && !empty($_POST['password'])){
            $user_id = mysql_real_escape_string($_POST['user_id']);
            $first_name = mysql_real_escape_string($_POST['first_name']);
            $last_name = mysql_real_escape_string($_POST['last_name']);
            $username = mysql_real_escape_string($_POST['username']);
            $password = mysql_real_escape_string($_POST['password']);
             
             $checkusername = mysql_query("SELECT * FROM users WHERE Username = '".$username."'");
              
            if(mysql_num_rows($checkusername) == 1){
            echo "<script type='text/javascript'>alert('Error! Sorry, that username is taken. Please go back and try again.')</script>";
            }
            else{
                $registerquery = mysql_query("INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`) VALUES('$user_id', '$first_name', '$last_name', '$username', '$password')");
                if($registerquery){
                    echo "<script type='text/javascript'>alert('Success! Your account was successfully created.')</script>";
                    redirect_to('login.php');
                }
                else{
                    echo "<script type='text/javascript'>alert('Error! your registration failed. Please go back and try again.')</script>";
                }       
            }
        }
    }
?>

<?php include_layout_template('header.php'); ?>
    <h1>Register</h1>
    <?php echo output_message($message); ?>
   <p>Please enter your details below to register.</p>
     
    <form method="post" action="register.php" name="registerform" id="registerform">
    <fieldset>
        <table>
            <tr>
              <td>First name:</td>
              <td>
                <input type="text" name="first_name" maxlength="30"/>
              </td>
            </tr>
            <tr>
              <td>Last name:</td>
              <td>
                <input type="text" name="last_name" maxlength="30"/>
              </td>
            </tr>
            <tr>
              <td>Username:</td>
              <td>
                <input type="text" name="username" maxlength="30"/>
              </td>
            </tr>
            <tr>
              <td>Password:</td>
              <td>
                <input type="password" name="password" maxlength="30"/>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <input type="submit" name="submit" value="Register" />
              </td>
            </tr>
          </table>
    </form>

<?php include_layout_template('footer.php'); ?>