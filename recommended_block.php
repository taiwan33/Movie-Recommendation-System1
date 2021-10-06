
<div><h2>Your Recommendeded Movies are:</h></div>
<div class="line"> 
<br/>

<?php

include("recommend.php"); ?>

<div class="line">
<?php

$userMovies=mysqli_query($con, "SELECT * FROM users");

$matrix=array();
while($userMovie=mysqli_fetch_array($userMovies)){
    $matrix[$userMovie['user_id']][$userMovie['movie_name']]=$userMovie['movie_rating'];
}
$recommendedMovies = getRecommendation($matrix,$_SESSION['id']);

$allMoviesResult = mysqli_query($con, "SELECT * FROM mytable");
$allMovies = array();
while($movie=mysqli_fetch_array($allMoviesResult)){
    $allMovies[] = $movie;  
    
}

$recommendedMoviesDetails = array();
foreach($recommendedMovies as $key=>$value){
    $movie = $allMovies[array_search($key, array_column($allMovies,'movie_name'))];
    if(count($recommendedMoviesDetails)<6){
        $recommendedMoviesDetails[] = $movie;

    }        
}


foreach($recommendedMoviesDetails as $movie){
    
    $genre = $movie["movies_genres"];
    $language = $movie["original_language"];
    
    $genre = str_replace("{'id': 28, 'name': 'Action'}","Action",$genre);
    $genre = str_replace("{'id': 12, 'name': 'Adventure'}","Adventure",$genre);
    $genre = str_replace("{'id': 14, 'name': 'Fantasy'}","Fantasy",$genre);
    $genre = str_replace("{'id': 878, 'name': 'Science Fiction'}","Science Fiction",$genre);
    $genre = str_replace("{'id': 80, 'name': 'Crime'}","Crime",$genre);
    $genre = str_replace("{'id': 18, 'name': 'Drama'}","Drama",$genre);
    $genre = str_replace("{'id': 53, 'name': 'Thriller'}","Thriller",$genre);
    $genre = str_replace("{'id': 16, 'name': 'Animation'}","Animation",$genre);
    $genre = str_replace("{'id': 37, 'name': 'Western'}","Western",$genre);
    $genre = str_replace("{'id': 35, 'name': 'Comedy'}","Comedy",$genre);
    $genre = str_replace("{'id': 10749, 'name': 'Romance'}","Romance",$genre);
    $genre = str_replace("{'id': 9648, 'name': 'Mystery'}","Mystery",$genre);
    $genre = str_replace("{'id': 27, 'name': 'Horror'}","Horror",$genre);
    $genre = str_replace("{'id': 10752, 'name': 'War'}","War",$genre);
    $genre = str_replace("{'id': 36, 'name': 'History'}","History",$genre);
    $genre = str_replace("{'id': 10402, 'name': 'Music'}","Music",$genre);
    $genre = str_replace("{'id': 10751, 'name': 'Family'}","Family",$genre);
    $genre = str_replace("{'id': 99, 'name': 'Documentary'}","Documentary",$genre);

    $language = str_replace("en","English",$language);
    $language = str_replace("fr","France",$language);
 


    ?>

<div class="image">
<div class="item">
<a href="movie_detail.php?id=<?php echo $movie['movie_id'] ?>"><img width="300" height="450" src="<?php echo $movie['cover_pic'] ?>"/><br></a><br><br>
    <?php

    echo $movie["movie_name"]."<br/><br/>";
  
 ?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<a class="btn"  href="movie_detail.php?id=<?php echo $movie['movie_id'] ?>"> View Details </a> 

</div>
</div>
<?php } ?>
  </div>  
  </div>
</div>
<a style="float:right;padding:20px" href="user_recommendation.php">See all recommended movies </a>
<br/>
<br/>

