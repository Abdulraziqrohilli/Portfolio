<?php
    require("../db_files/connection.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $title = $_POST['title'];
      $description = $_POST['description'];
      $icon = $_POST['icon'];
      $id = $_POST['id'];


      $sql = "UPDATE services SET 
      title='$title', description='$description',icon='$icon' WHERE id=$id";
      
      if ($conn->query($sql) === TRUE) {
        header("Location: editservices.php?id=$id&servicesUpdated");
      } else {
        header("Location: editservices.php?id=$id&servicesError");
      } 

    }else{
    session_start();
    $id = $_SESSION['user_id'];
    if(isset($_GET['id'])){
      $services_id = $_GET['id'];
    }

    $sql = "SELECT * FROM services WHERE id = $services_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $services = $result->fetch_assoc();
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
              <h3 class="box-title">Edit services</h3>

              <?php if(isset($_GET['servicesUpdated'])) { ?>
                <span class="p-b-10 p-t-10 text-success">
                  successcully updated
                </span>
              <?php } ?>

              <?php if(isset($_GET['servicesError'])) { ?>
                <span class="p-b-10 p-t-10 text-danger">
                  services cannot be updated!
                </span>
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="id" id="" value="<?php echo $services['id']; ?>">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="<?php echo $services['title']; ?>" placeholder="Enter the title">
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" id="description" name="description" value="<?php echo $services['description']; ?>" placeholder="Enter the descripton">
                </div>
                <div class="form-group">
                  <label for="icon">Icon</label>
                  <input type="text" class="form-control" id="icon" name="icon" value="<?php echo $services['icon']; ?>" placeholder="Enter the icon path">
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