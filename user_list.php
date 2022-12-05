  <!-- header -->
  <?php include_once('include/header.php'); ?>

  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- /.header -->
  <!-- Top Navbar -->
  <?php include_once('include/top_nav.php'); ?>
  <!-- /.Top Navbar -->
  <!-- Side menu bar -->
  <?php include_once('include/sidebar.php'); ?>
  <!-- /.Side menu bar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">User List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All User</h3>
                <a href="user_create.php" class="btn float-right btn-primary" title="Create">Add New</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php include('message.php'); ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>#SL</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>image</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $where['status']=1;
                        //$result=$mysqli->common_select("auth","*",$where);
                        $sql="select auth.*, role.role from auth join role on role.id=auth.role_id where auth.status=1";
                        $result=$mysqli->common_query($sql);
                        if(!$result['error']){
                            foreach($result['data'] as $i=>$user){
                    ?> 
                            <tr>
                                <td><?= ++$i; ?></td>
                                <td><?= $user->name ?></td>
                                <td><?= $user->contact ?></td>
                                <td><?= $user->email ?></td>
                                <td><?= $user->role ?></td>
                                <td> <img width="80px" src="images/user_pic/<?= $user->image ?>" alt=""> </td>
                                <td>
                                    <a href="user_edit.php?id=<?= $user->id ?>" class="btn btn-xs btn-info" title="Update"><i class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Are you sure to delete?')" href="user_delete.php?id=<?= $user->id ?>" class="btn btn-xs btn-danger" title="Delete"><i class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                    <?php  }
                        }
                    ?>
                  
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
    <!-- Side menu bar -->
    <?php include_once('include/footer.php'); ?>
    <!-- /.Side menu bar -->
    <!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
