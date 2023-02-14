<?php
session_start();
if(isset($_SESSION['user_id'])) {
    session_unset();
	header("Location: Login/index.php");
}else{
    header("Location: Login/index.php");
}
?>