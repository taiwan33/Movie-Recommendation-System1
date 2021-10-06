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
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>

<?php
    $id = $_POST['id'];
    $uid=$_POST['uid'];
    $date=$_POST['date'];
    $message=$_POST['message'];
    $movie_id= $_POST['movie_id']; ?>
    <form method='POST' action='movie_detail.php?id=<?php echo $movie_id;?>'>
   <input type='hidden' name='id' value=<?php echo $id ?>>
    <input type='hidden' name='uid' value= <?php echo $uid ?>>
    <input type='hidden' name='date' value= <?php echo $date ?>>
    <textarea name='message'><?php echo $message ?></textarea>
    <input type='hidden' name='movie_id' value=<?php echo $movie_id ?>>
    <button type='submit' name='edit_comment'> Edit</button>
    
    </form>
  
</body>
</html>