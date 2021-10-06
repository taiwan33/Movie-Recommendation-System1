<?php
session_start(); 
?>
<body>
<?php
include ("header.php");
include ("db.php");
include ("util.php");

$genre = $_GET['genre'];
?>
<?php


$sql = "SELECT * FROM mytable WHERE movies_genres LIKE '%".$genre."%' ORDER BY rand() LIMIT 21";
echo "<h2>$genre</h2>";
?>


<div class="line">
<?php


$result = mysqli_query($con,$sql);



if (mysqli_num_rows($result)>0){


  while($row = mysqli_fetch_assoc($result)){

    
  $genre = $row["movies_genres"];
  $genre = convertGenre($genre);
  
  ?>
 

  <div class="item"> 
  <a href="movie_detail.php?id=<?php echo $row['movie_id'] ?>"><img width="300" height="450" src="<?php echo $row['cover_pic'] ?>"/><br><br></a>
 <?php 
 echo  $row["movie_name"]."<br>";

?>

<a class="btn"  href="movie_detail.php?id=<?php echo $row['movie_id'] ?>"> View Details </a> <br><br></div><?php

  } 
  }
?> <br>


</div>
<?php

?>

</body>
</html>