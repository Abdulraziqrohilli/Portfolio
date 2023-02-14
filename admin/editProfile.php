<?php
    require("../db_files/connection.php");
    session_start();
    $id = $_SESSION['user_id'];

    $sql = "SELECT * FROM user WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
      $user = $result->fetch_assoc();
    }

    $sql1 = "SELECT * FROM portfolio WHERE id = $id";
    $result1 = $conn->query($sql1);
    if ($result1->num_rows == 1) {
      $portflio = $result1->fetch_assoc();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $skill = $_POST['skill'];
      $dob = $_POST['dob'];
      $website = $_POST['website'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $city = $_POST['city'];
      $degree = $_POST['degree'];
      $image = $_POST['image'];
      $cv = $_POST['cv'];
      $address = $_POST['address'];
      $description1 = $_POST['description1'];
      $description2 = $_POST['description2'];




      $sql = "UPDATE user SET 
      first_name='$first_name', last_name='$last_name',
      skills='$skill', dob='$dob', website='$website',
      email='$email', degree='$degree', phone='$phone', 
      city='$city', freelance='$freelance', img='$image',
      cv='$cv', address='$address', description1='$description1',
      description2='$description2' WHERE id=$id ";
      
      if ($conn->query($sql) === TRUE) {
        header("Location: editProfile.php?profileUpdated");
      } else {
        header("Location: editProfile.php?updateError");
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
              <h3 class="box-title">Edit Profile</h3>

              <?php if(isset($_GET['profileUpdated'])) { ?>
                <span class="p-b-10 p-t-10 text-primary">
                  successcully updated
                </span>
              <?php } ?>

              <?php if(isset($_GET['updateError'])) { ?>
                <span class="p-b-10 p-t-10 text-danger">
                  profile cannot be updated!
                </span>
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              <div class="box-body">
              <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>" placeholder="Enter First Name">
                </div>
                <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>" placeholder="Enter Last Name">
                </div>
                <div class="form-group">
                  <label for="skill">Header</label>
                  <input type="text" class="form-control" id="skill" name="skill" value="<?php echo $user['skills']; ?>" placeholder="Enter you Heading">
                </div>
                <div class="form-group">
                  <label for="dob">Date Of Birth</label>
                  <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $user['dob']; ?>" placeholder="Enter Date of birth">
                </div>
                <div class="form-group">
                  <label for="website">Website</label>
                  <input type="text" class="form-control" id="website" name="website" value="<?php echo $user['website']; ?>" placeholder="Enter your Website">
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="degree">Degree</label>
                  <input type="text" class="form-control" id="degree" name="degree" value="<?php echo $user['degree']; ?>" placeholder="Degree">
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user['phone']; ?>" placeholder="Phone Number">
                </div>
                <div class="form-group">
                  <label for="phone">City</label>
                  <input type="text" class="form-control" id="city" name="city" value="<?php echo $user['city']; ?>" placeholder="Enter city">
                </div>
                <div class="form-group">
                  <label for="phone">Freelance</label>
                  <input type="text" class="form-control" id="freelance" name="freelance" value="<?php echo $user['freelance']; ?>" placeholder="Freelance">
                </div>
                <div class="form-group">
                  <label for="phone">image</label>
                  <input type="file" class="form-control" id="image" name="image" value="<?php echo $user['img']; ?>" placeholder="image">
                </div><div class="form-group">
                  <label for="phone">CV</label>
                  <input type="file" class="form-control" id="cv" name="cv" value="<?php echo $user['cv']; ?>" placeholder="cv">
                </div>
                <div class="form-group">
                  <label for="phone">address</label>
                  <input type="text" class="form-control" id="address" name="address" value="<?php echo $user['address']; ?>" placeholder="address">
                </div>
                <div class="form-group">
                  <label for="phone">Description 1</label>
                  <input type="text" class="form-control" id="description" name="description1" value="<?php echo $user['description1']; ?>" plceholder="Description1">
                </div><div class="form-group">
                  <label for="phone">Description 2</label>
                  <input type="text" class="form-control" id="description" name="description2" value="<?php echo $user['description2']; ?>" placeholder="Description">
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