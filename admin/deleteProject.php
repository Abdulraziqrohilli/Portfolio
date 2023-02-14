<?php
    require("../db_files/connection.php");
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      if(isset($_GET['id'])){
      $id = $_GET['id'];


      $sql = "DELETE FROM portfolio WHERE id=$id";
      
      if ($conn->query($sql) === TRUE) {
        header("Location: listProjects.php?projectDeleted");
      } else {
        header("Location: listProjects.php?projectError");
      } 
    }else{
      header("Location: listProjects.php?projectError");
    }
  }else{
    header("Location: listProjects.php?projectError");
  }
?>