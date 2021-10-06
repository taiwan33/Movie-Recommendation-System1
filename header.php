<?php
    
    include('session.php');
    $search='';
    if(isset($_GET["search"])){
      $search = $_GET["search"];
    }
?>

<html lang="en">
<head>
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel='stylesheet' type='text/css' media='screen' href='css.css'>

<script src="/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies Path</title>
     
</head>


<div class="row menu-bar" style="margin-left:0 !important">

  <div style="display:flex" class="col-md-5 logo">
  <a href="index.php"> <img src="movieBot.png"> MovieBot</a>
        <ul class="nav">
        
        <li class="nav-item">
            <a class="nav-link" href="advance_search.php">Advance Search</a>
        </li>

        <?php
        if(isset($_SESSION['id'])){
            ?>
        <li class="nav-item">
            <a class="nav-link active" href="user_recommendation.php">Recommended Movies </a>
        </li>

        <?php 
        }
        ?>
        
        <!-- <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
        </li> -->
        </ul>
    
</div>

<div class="col-md-2 logins">
    <form action="advance_search.php" method="GET">
        <input id="search" class="search" name="search" type="text" placeholder="Quick Search " value = "<?php echo $search ?>" required><br> 
    </form>
</div>


<div  class="col-md-5  logins">

<?php
if(isset($_SESSION['id'])){
    ?>
<div style="float:right">
<?php
    echo $_SESSION['username'];
     if($_SESSION['admin']==1){
         echo " (Admin)";
     }
?>
<center><a class="btn"  style="display:table-header-group" href="logout.php"> Logout </a></center>
</div>
<?php
}else{ ?>
    <a class="btn"  href="Signin.php"> Login </a>
<?php } ?>
</div>
</div>

</div><br>
</html>

