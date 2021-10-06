<?php
function convertGenre($genre){
  $genre = str_replace('{"id": 28, "name": "Action"}',"Action",$genre);
  $genre = str_replace('{"id": 12, "name": "Adventure"}',"Adventure",$genre);
  $genre = str_replace('{"id": 14, "name": "Fantasy"}',"Fantasy",$genre);
  $genre = str_replace('{"id": 878, "name": "Science Fiction"}',"Science Fiction",$genre);
  $genre = str_replace('{"id": 80, "name": "Crime"}',"Crime",$genre);
  $genre = str_replace('{"id": 18, "name": "Drama"}',"Drama",$genre);
  $genre = str_replace('{"id": 53, "name": "Thriller"}',"Thriller",$genre);
  $genre = str_replace('{"id": 16, "name": "Animation"}',"Animation",$genre);
  $genre = str_replace('{"id": 37, "name": "Western"}',"Western",$genre);
  $genre = str_replace('{"id": 35, "name": "Comedy"}',"Comedy",$genre);
  $genre = str_replace('{"id": 10749, "name": "Romance"}',"Romance",$genre);
  $genre = str_replace('{"id": 9648, "name": "Mystery"}',"Mystery",$genre);
  $genre = str_replace('{"id": 27, "name": "Horror"}',"Horror",$genre);
  $genre = str_replace('{"id": 10752, "name": "War"}',"War",$genre);
  $genre = str_replace('{"id": 36, "name": "History"}',"History",$genre);
  $genre = str_replace('{"id": 10402, "name": "Music"}',"Music",$genre);
  $genre = str_replace('{"id": 10751, "name": "Family"}',"Family",$genre);
  $genre = str_replace('{"id": 99, "name": "Documentary"}',"Documentary",$genre);
  $genre = str_replace('{"id": 10770, "name": "TV Movie"}',"TV Movie",$genre);
  $genre = str_replace('{"id": 10769, "name": "Foreign"}',"Foreign",$genre);
  return $genre;
}

?>