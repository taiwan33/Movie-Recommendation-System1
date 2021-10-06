<?php
date_default_timezone_set('UTC');
include('comment2.php');
include('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoviePath</title>
    <link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
    Comments <br>
    

<?php

getComment($con,$movieId);

if(isset($_SESSION['username'])){
?>

   <form method='POST' action=''>
    <input type='hidden' name='uid' value='<?php echo $_SESSION['id'] ?>'>
    <input type='hidden' name='date' value='<?php echo date('Y-m-d H:i:s') ?>'>
    <textarea name='message'></textarea>
    <button type='submit' name='new_comment'> Comment</button>
    <input type='hidden' name='movie_id' value='<?php echo $movieId ?>'>
    
    </form>

<?php

  }else{
    echo '<a href="signin.php"><h2>Login to comment</h2></a>';
  }
  ?>
</body>
</html>