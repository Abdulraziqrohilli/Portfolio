<?php
    require("../db_files/connection.php");
    session_start();
    $id = $_SESSION['user_id'];

    $sql = "SELECT * FROM services WHERE user_id = $id";
    $result = $conn->query($sql);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $title = $_POST['title'];
      $description = $_POST['description'];
      $icon = $_POST['icon'];


      $sql = "UPDATE services SET 
      title='$title', description='$description',icon=$icon WHERE id=$id ";
      
      if ($conn->query($sql) === TRUE) {
        header("Location: editservices.php?servicesUpdated");
      } else {
        header("Location: editservices.php?servicesError");
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
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
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
                  <th>Title</th>
                  <th>Description</th>
                  <th>Icon</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  foreach($result as $user_services){
                  ?>
                <tr>
                  <td><?php echo $user_services['id'] ?></td>
                  <td><?php echo $user_services['title']?></td>
                  <td><?php echo $user_services['description']?></td>
                  <td><span class="<?php echo $user_services['icon']?>"></span></td>
                  <td> <a href="editservices.php?id=<?php echo $user_services['id'] ?>">Edit</a> </td>
                  <td> <a href="editservices.php?id=<?php echo $user_services['id'] ?>">Delete</a> </td>
                </tr>
                <?php
                  }
                  ?>
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
<script src="../assest/font-awesome/all.js"></script> 

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