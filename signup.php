
<?php
// include("session.php");
include("db.php");


$fname = "";
$lname = "";
$username ="";
if(isset($_POST['submit']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
  

    if($password!=$cpassword)
    {
       
        echo "your passwords are not match";

    }
    else if ($username==null)
     {
        echo "Please fill username";
     }
    else{
        $query="insert into login_form(fname,lname,username,password)
        values('$fname','$lname','$username','$password')";
        
        $result= mysqli_query($con,$query);
        if($result)
        {
            header("Location:signin.php");
        }
    }
}
  ?>


<!DOCTYPE html>
<html>
<head>
   
    <title>Sign up Form</title>
    
    <link rel='stylesheet' type='text/css' media='screen' href='form.css'>
    <script src='main.js'></script>
</head>
<body>
    <form method ="POST" action="signup.php">
    <div class="login-box">
        <h1>Sign up</h1>
        <div class="textbox">
            
        <input type="text" placeholder="First Name" name="fname" value="<?php echo $fname ?>" id="fname" required >
    </div>
    <div class="textbox">
        <input type="text" placeholder="Last Name" name="lname" value="<?php echo $lname ?>" id="lname" required> 
    </div>


    <div class="textbox">
           
        <input type="text" placeholder="Username" name="username" value="<?php echo $username ?>" id="username" required>
    </div>

    <div class="textbox">
       
        <input type="password" placeholder="Password" name="password" value="" id="password" required>
    </div>

    <div class="textbox">
       
       <input type="password" placeholder="Confirm Password" name="cpassword" value="" id="cpassword" required>
   </div>


    <div class="form-group">
        <input class="btn" type="submit" name="submit" value="Sign Up" required font-size:"8px" style="margin-left:0 !important">
       <center> <a class="btn"  href="Signin.php"> Sign in </a> </center>
    </div>
</form>
    </body>
</html>
