<?php 
session_start();
if(isset($guestAllowed) || isset($_SESSION['id'])){

}else{
    header("location:signin.php");
}
?>