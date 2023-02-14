<?php
    require("../db_files/connection.php");
    session_start();
    $id = $_SESSION['user_id'];

    $sql = "SELECT * FROM portfolio WHERE user_id = $id";
    $result = $conn->query($sql);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $image = $_POST['image'];
      $link = $_POST['link'];


      $sql = "UPDATE portfolio SET 
      img='$image', link='$link' WHERE id=$id ";
      
      if ($conn->query($sql) === TRUE) {
        header("Location: editPortfolio.php?portfolioUpdated");
      } else {
        header("Location: editPortfolio.php?portfolioError");
      } 

    }else{
?>

<?php require('include/header.php'); ?>
  <?php require('include/sidebar.php'); ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small class="text-primary"><?php if(isset($_GET['projectDeleted'])){echo "project deleted";} ?></small>
        <small class="text-danger"><?php if(isset($_GET['projectError'])){echo "error occured";} ?></small>
      </h1>   
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Image</th>
                  <th>Link</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  foreach($result as $user_projects){
                  ?>
                <tr>
                  <td><?php echo $user_projects['id'] ?></td>
                  <td>
                  <img src="../assest/images/portfolio/<?php echo $user_projects['img']; ?>" alt="" width=50 height=50>
                  </td>
                  <td><a href="<?php echo $user_projects['link'] ?>" target="_blank">Link to Project</a></td>
                  <td><a href="editPortfolio.php?id=<?php echo $user_projects['id'] ?>">Edit</a> </td>
                  <td><a href="deleteProject.php?id=<?php echo $user_projects['id'] ?>">Delete</a> </td>
                </tr>
                <?php
                  }
                ?>
                <a href="addprojects.php">Add projects</a>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

    
<?php
    }

    $conn->close();
?>