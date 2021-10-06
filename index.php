
<body>
<?php
$guestAllowed = true;
include ("header.php");
include ("db.php");
include ("util.php");

if(isset($_SESSION['id'])){
include("recommended_block.php");
}
?>
<?php
$topCategories = array("Action","Comedy","Horror","Thriller","Romance");

foreach($topCategories as $category){
$sql = "SELECT * FROM mytable WHERE movies_genres LIKE '%".$category."%' LIMIT 3";
?>
<hr style="background:white"/>
<h2 style="padding:20px;"> <?php echo $category?></h2>
<div class="line">
<?php
$result = mysqli_query($con,$sql) or die( mysqli_error($con));
if ($result || mysqli_num_rows($result)>0){
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
?> 
</div>
<a style="float:right;padding:20px" href="expand.php?genre=<?php echo $category?>">See More <?php echo $category ?> movies </a>
<br/>
<br/>
<?php
} 
?>

</body>
</html>