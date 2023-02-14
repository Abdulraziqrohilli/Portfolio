<?php
    require("../db_files/connection.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $ProjectImage = $_POST['img'];
      echo $ProjectImage;
      die();
      $link = $_POST['link'];
      $id = $_POST['id'];


      $sql = "UPDATE portfolio SET 
      img='$image', link='$link' WHERE id=$id";
      
      if ($conn->query($sql) === TRUE) {
        header("Location: editPortfolio.php?id=$id&portfolioUpdated");
      } else {
        header("Location: editPortfolio.php?id=$id&portfolioError");
      } 

    }else{
    session_start();
    $id = $_SESSION['user_id'];
    if(isset($_GET['id'])){
      $project_id = $_GET['id'];
    }

    $sql = "SELECT * FROM portfolio WHERE id = $project_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $project = $result->fetch_assoc();
    }
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
              <h3 class="box-title">Edit Portfolio</h3>

              <?php if(isset($_GET['portfolioUpdated'])) { ?>
                <span class="p-b-10 p-t-10 text-success">
                  successcully updated
                </span>
              <?php } ?>

              <?php if(isset($_GET['portfolioError'])) { ?>
                <span class="p-b-10 p-t-10 text-danger">
                  portfolio cannot be updated!
                </span>
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  enctype="multipart/form-data">
              <div class="box-body">
              <div class="form-group">
                <input type="hidden" name="id" id="" value="<?php echo $project['id']; ?>">
                <img src="../assest/images/portfolio/<?php echo $project['img']; ?>" alt=""><br>
                  <label for="image">Image</label>
                  <input type="file" class="form-control" id="image" name="img" value="<?php echo $project['img']; ?>" placeholder="Enter image path">
                </div>
                <div class="form-group">
                  <label for="link">Link</label>
                  <input type="text" class="form-control" id="link" name="link" value="<?php echo $project['link']; ?>" placeholder="Enter the link">
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
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