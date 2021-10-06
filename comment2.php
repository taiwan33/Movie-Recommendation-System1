<?php
// session_start();
include('db.php');



   if(isset($_POST['new_comment'])){
      $uid=$_POST['uid'];
      $date=$_POST['date'];
      $message=$_POST['message'];
      $movie_id=$_POST['movie_id'];

      $sql= "INSERT INTO comment_section(uid,date,message,movie_id) 
      VALUES('$uid','$date','$message','$movie_id')";
      $result = $con->query($sql);

   }
function getComment($con,$movie_id){
  

   $sql ="SELECT comment_section.id,comment_section.message,comment_section.date,login_form.username,
   comment_section.uid,comment_section.movie_id
   FROM comment_section JOIN login_form ON comment_section.uid=login_form.id JOIN mytable ON mytable.movie_id=comment_section.movie_id WHERE mytable.movie_id = $movie_id";
   $result= $con->query($sql);
   while($row = $result->fetch_assoc()){

     
      echo "<div class='comment'><p>";
         echo $row['username']."<br/>";
         echo nl2br($row['message'])."<br/>";
         echo $row['date']."<br/>";
      echo "</p>";

      if( (isset($_SESSION['username']) && ($row['username'] == $_SESSION['username'])) || (isset($_SESSION['admin']) && $_SESSION['admin']==1)){

      ?>

      <form class= 'delete-form' method='POST' action='movie_detail.php?id=<?php echo $movie_id?>'>
            <input type='hidden' name='delete_id' value="<?php echo $row['id']?>">
            
            <input type='hidden' name='movie_id' value="<?php echo $movie_id?>">
         <button type='submit'> Delete </button>
      </form>

      <form class='edit-form' method='POST' action='edit_comment.php'>
      <input type='hidden' name='id' value= <?php echo $row['id'] ?>>
      <input type='hidden' name='uid' value=<?php echo $row['uid'] ?>>
      <input type='hidden' name='date' value=<?php echo $row['date'] ?>>
      <input type='hidden' name='message' value='<?php echo $row['message'] ?>'>
      <input type='hidden' name='movie_id' value=<?php echo $row['movie_id'] ?>>
         <button>Edit</button>
      </form>

      <?php } ?>

      </div>
      <?php
    }
}
   if(isset($_POST['edit_comment'])){

      $id=$_POST['id'];
      $uid=$_POST['uid'];
      $date=$_POST['date'];
      $message=$_POST['message'];
      $movie_id=$_POST['movie_id'];
      
      $sql= "UPDATE comment_section SET message='$message' WHERE id='$id' ";
      $result = $con->query($sql);
      header("Location:movie_detail.php?id=".$movie_id);
   }



   if(isset($_POST['delete_id'])){
      $id=$_POST['delete_id'];
      $sql= "DELETE FROM comment_section WHERE id='$id'";
      $result = $con->query($sql);
      header("Location:movie_detail.php?id=".$_POST['movie_id']);
   }

?>