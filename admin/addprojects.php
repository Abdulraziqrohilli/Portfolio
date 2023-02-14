<?php
    require("../db_files/connection.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //$userID = get from session
      $image = $_FILES['projectImage']['name'];
      $link = $_POST['link'];


      $sql = "INSERT INTO portfolio(user_id, img , link) VALUES(1, '$image', '$link')";
      
      if ($conn->query($sql) === TRUE) {
        header("Location: addprojects.php?projectsadded");
      } else {
        header("Location: addprojects.php?projectsError");
      } 

    }else{
?>

<?php require('include/header.php'); ?>
  <?php require('include/sidebar.php'); ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Update your information
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add projects</h3>

              <?php if(isset($_GET['projectsadded'])) { ?>
                <span class="p-b-10 p-t-10 text-success">
                  Projects successfull added
                </span>
              <?php } ?>

              <?php if(isset($_GET['projectsError'])) { ?>
                <span class="p-b-10 p-t-10 text-danger">
                  projects cannot be addaded!
                </span>
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="projectImage">Image</label>
                  <input type="file" class="form-control" id="image" name="projectImage" value="" placeholder="Enter the image">
                </div>
                <div class="form-group">
                  <label for="link">Link</label>
                  <input type="text" class="form-control" id="link" name="link" placeholder="Enter the link">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->


        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>

  
    <?php require('include/footer.php'); ?>

    
<?php
    }
    $conn->close();
?>