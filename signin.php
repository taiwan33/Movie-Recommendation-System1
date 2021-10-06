<?php
session_start();
include("db.php");
mysqli_select_db($con,'recommendation_system1');


$username='';
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $result= mysqli_query($con,"SELECT * FROM login_form where username='$username'&& password='$password'");
    $row_count=mysqli_num_rows($result);

    if($row_count==True)
    {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['admin']=$row['admin'];

        header("Location:index.php");
       }
    
    else{
        echo "<p>"."your password and username is wrong"."</p>";
    }
}

?>



<!DOCTYPE html>
<html>
<head>
   
    <title>Login Form</title>
    <link rel='stylesheet' type='text/css' media='screen' href='form.css'>
   
</head>
<body>
    <form method ="POST" action="#">
    <div class="login-box">
        <h1>Login</h1>
        <div class="textbox">
            <i class="fa fa-user" aria-hidden="true"></i>
        <input type="text" placeholder="Username" name="username" value="<?php echo $username ?>">
    </div>
    
    <div class="textbox">
        <i class="fa fa-lock" aria-hidden="true"></i>
        <input type="password" placeholder="password" name="password" value="">
    </div>
        <input class="btn" type="submit" name="submit" value="Sign-in" required style="margin-left:0 !important">
    
    <br></br>
		Already a member? <a class="btn"  href="Signup.php"> Sign up </a>
	
        </div>
    </div>
    
    </div>
</form>
    </body>
</html>