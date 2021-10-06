<?php
if(!isset($_GET['id'])){
  header("Location:index.php");
}
$movieId = $_GET['id'];
include('db.php');
include('header.php');
include('util.php');
?>
<html lang="en">
<head>
    <link rel="stylesheet" href="css.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies Path</title>

    <link rel="stylesheet" type="text/css" href="css.css">  
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel='stylesheet' type='text/css' media='screen' href='css.css'>

<script src="/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<?php 
if(isset($_POST['submit'])){ 
  include('session.php');
  $id=$_SESSION['id'];
  $movieRating= $_POST['movie_rating'];
  $movieName=$_POST['movie_name'];  
  $query = "INSERT INTO users(user_id,movie_id,movie_rating,movie_name) 
  VALUES ('$id','$movieId','$movieRating','$movieName')";
  $result=mysqli_query($con,$query);
}
$sql = "SELECT cover_pic,poster_path,movie_id,homepage,release_date,movie_name,movies_genres,vote_count,vote_average,runtime,overview,original_language,popularity 
FROM mytable WHERE movie_id=".$movieId; 
$result = mysqli_query($con,$sql);
if (mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $genre = $row["movies_genres"]; 
        $language = $row["original_language"];
        $gen = convertGenre($genre);
        $language = str_replace("en","English",$language);
        $language = str_replace("fr","France",$language);
        $language = str_replace("it","Italic",$language);
      ?>
<div class ="seperation" style="display:flex" > 
  <div class="image1"><a href="movie_detail.php"><img width="400" height="550" src="<?php echo $row['cover_pic'] ?>"/></a></div>
  <div  class ="seperation">

    <h1><?php echo  $row["movie_name"];?><br></h1>
       <h2><?php echo($gen);?><br></h2>
      <h2><?php echo "Run Time: " .$row["runtime"]." min". "<br>";?></h2>
      <h2><?php echo "Release Date: " .$row["release_date"]. "<br>";?></h2>
      <h2><?php echo "Original language: ".$language."<br>"; ?></h2>
      <h2><?php echo "Vote Count: " .$row["vote_count"]."<br>";?></h2>
      <h2><?php echo "Average Vote: ".$row["vote_average"]."<br>";?></h2>
      <h2><?php echo "Popularity: " .$row["popularity"]."<br>";?></h2>
</div>
</div>
<br>
<div class="overview">
<h2> <?php echo "Overview "."<br>"."</h2>".  $row["overview"]."<br>";?> </div><br>
    <form action="#" method="POST">
    <input type="hidden" name="movie_id" value="<?php echo $row["movie_id"]?>"/>
    <input type="hidden" name="movie_name" value="<?php echo $row["movie_name"]?>"/>
   
    </select> <div class="form-group">

  <?php
 if(isset($_SESSION['username'])){
  ?>

 <form method='POST' action=''> 
  <label for="username"> Movie Rating </label>
  <select name="movie_rating" >
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10" selected>10</option>
</select> 
</div><br>
<button type='submit' name='submit'> Submit </button>
  <?php
 }else{
   echo '<a href="signin.php"><h2>Login to Give rating</h2></a>';
 } 
  ?>  
</form>
</div>
<?php 
}  
include('comment.php');
}?>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>


