<?php 
$guestAllowed =true;
?>

<?php
    // include("session.php");
    include("header.php");
    include("db.php");
    include("util.php");





$movieGenre='';
if(isset($_GET["movies_genres"])){
  $movieGenre = $_GET["movies_genres"];
}

$movieRating='';
if(isset($_GET["rating"])){
  $movieRating = $_GET["rating"];
  
}

?>

<form action="advance_search.php" method="GET">
<label for="movies_genres">Genres:</label>

<select name="movies_genres" id="movies_genres" value="<?php echo $asearch ?>">
  <option value="">All</option>
  <option value="action" <?php if($movieGenre=="action") echo "selected"; ?>>Action</option>
  <option value="crime"  <?php if($movieGenre=="crime") echo "selected"; ?>>Crime</option>
  <option value="Adventure" <?php if($movieGenre=="Adventure") echo "selected"; ?>>Adventure</option>
  <option value="Fantasy" <?php if($movieGenre=="Fantasy") echo "selected"; ?>>Fantasy</option>
  <option value="Science Fiction" <?php if($movieGenre=="Science Fiction") echo "selected"; ?>>Science Fiction</option>
  <option value="Drama" <?php if($movieGenre=="Drama") echo "selected"; ?>>Drama</option>
  <option value="Thriller" <?php if($movieGenre=="Thriller") echo "selected"; ?>>Thriller</option>
  <option value="Animation" <?php if($movieGenre=="Animation") echo "selected"; ?>>Animation</option>
  <option value="Western" <?php if($movieGenre=="Western") echo "selected"; ?>>Western</option>
  <option value="comedy"   <?php if($movieGenre=="comedy") echo "selected"; ?>>Comedy</option>
  <option value="Romance" <?php if($movieGenre=="Romance") echo "selected"; ?>>Romance</option>
  <option value="Mystery" <?php if($movieGenre=="Mystery") echo "selected"; ?>>Mystery</option>
  <option value="Horror"<?php if($movieGenre=="Horror") echo "selected"; ?>>Horror</option>
  <option value="War" <?php if($movieGenre=="War") echo "selected"; ?>>War</option>
  <option value="History"<?php if($movieGenre=="History") echo "selected"; ?>>History</option>
  <option value="Music" <?php if($movieGenre=="Music") echo "selected"; ?>>Music</option>
  <option value="Family" <?php if($movieGenre=="Family") echo "selected"; ?>>Family</option>
  <option value="Documentary" <?php if($movieGenre=="Documentary") echo "selected"; ?>>Documentary</option>
  <option value="TV Movie " <?php if($movieGenre=="TV Movie ") echo "selected"; ?>>TV Movie</option>
  <option value="Foreign" <?php if($movieGenre=="Foreign") echo "selected"; ?>>Foreign</option>

</select>
  
<label for="rating">Rating :</label>

<select name="rating" id="rating" value="<?php echo "floor($rating)" ?>">
  <option value="">All</option>
  <option value="9" <?php if($movieRating==floor(9)) echo "selected"; ?>>9+</option>
  <option value="8" <?php if($movieRating==floor(8)) echo "selected"; ?>>8+</option>
  <option value="7" <?php if($movieRating==floor(7)) echo "selected"; ?>>7+</option>
  <option value="6" <?php if($movieRating==floor(6)) echo "selected"; ?>>6+</option>
  <option value="5" <?php if($movieRating==floor(5)) echo "selected"; ?>>5+</option>
  <option value="4" <?php if($movieRating==floor(4)) echo "selected"; ?>>4+</option>
  <option value="3" <?php if($movieRating==floor(3)) echo "selected"; ?>>3+</option>
  <option value="2" <?php if($movieRating==floor(2)) echo "selected"; ?>>2+</option>
  <option value="1" <?php if($movieRating==floor(1)) echo "selected"; ?>>1+</option>
 

</select>

<input class="asearch" type="submit" name="asearch" value = "Search">

</form>
<div class="line">
<?php 

if(isset($_POST['submit'])){
  $id=$_SESSION['id'];
  $movieRating = $_POST['movie_rating'];
  $movieName=$_POST['movie_name'];

  $query="INSERT INTO users(user_id,movie_id,movie_rating,movie_name) 
  VALUES('$id','$movieId','$movieRating','$movieName')";
  $result=mysqli_query($con,$query);
}


//For pagination
if(isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page = 1;
}
$sql = "SELECT cover_pic,poster_path,movie_id,homepage,movie_name,movies_genres,vote_count,vote_average,runtime,overview,original_language,popularity 
FROM mytable WHERE movie_name LIKE '%".$search."%'"; 

if($movieGenre !=""){
  $sql = $sql." AND movies_genres LIKE '%".$movieGenre."%'";
}
if($movieRating !=""){
  
  $sql = $sql." AND vote_average >=$movieRating";
}

$sql = $sql." ORDER BY  popularity DESC LIMIT 20 OFFSET ".(($page-1)*20);


$result = mysqli_query($con,$sql);




if (mysqli_num_rows($result)>0){


    while($row = mysqli_fetch_assoc($result)){
    



      
        $genre = $row["movies_genres"];
        $language = $row["original_language"];

        $genre = convertGenre($genre);

        $language = str_replace("en","English",$language);
        $language = str_replace("fr","France",$language);
        $language = str_replace("it","Italic",$language);
      ?>




<div class="item"> 
 <center> <a href="movie_detail.php?id=<?php echo $row['movie_id'] ?>"><img width="300" height="450" src="<?php echo $row['cover_pic'] ?>"/><br></a>

      <h1><?php echo  $row["movie_name"]."<br>";?></h1>




<a class="btn"  href="movie_detail.php?id=<?php echo $row['movie_id'] ?>"> View Details </a> <br><br>
    </center>



    <form action="advance_search.php" method="POST">
    <input type="hidden" name="movie_id" value="<?php echo $row["movie_id"]?>"/>
    <input type="hidden" name="movie_name" value="<?php echo $row["movie_name"]?>"/>
   
    </select> <div class="form-group">

</form> </div>
</div>
<?php 
}    }?>
</div>



<?php
$query = "SELECT movie_id FROM mytable";
$result = mysqli_query($con,$query);
$count = mysqli_num_rows($result);
$pageCount = ceil($count/20);
?>

<center>
<div class="page">
<?php if($page>1){?>
  <a href="advance_search.php?page=1">First page</a>
<a href="advance_search.php?page=<?php echo $page-1 ?>">Previous</a>
<?php } ?>
<?php 
$start = $page-5;
if($start<1){
  $start = 1;
}
$end = $page+5;
if($end>$pageCount){
  $end = $pageCount;
} 
for($i=$start;$i<=$end;$i++){
  $fontSize = 20;
  if($i==$page){
    $fontSize = 32;
  }
?>
<a href="advance_search.php?page=<?php echo $i ?>"><span style="font-size:<?php echo $fontSize ?>px"><?php echo $i ?></span></a>
<?php } ?>
<?php if($page<$pageCount){ ?>
<a href="advance_search.php?page=<?php echo $page+1 ?>">Next</a>
<a href="advance_search.php?page=<?php echo $pageCount ?>">Last Page</a>
<?php } ?>
</div>
</center>

  </div>  <div class="btn2">
    <a href="#top" class="btn2" aria-label="Scroll to Top">🔝</a>
  </div>


</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>

