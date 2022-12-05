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
            <h1>Supplier List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Supplier List</li>
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
                <h3 class="card-title">Supplier</h3>
                <a href="supplier_create.php" class="btn float-right btn-primary" title="Create">Add New</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php include('message.php'); ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>#SL</th>
                        <th>Supplier name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                     $sql="SELECT supplier.*,purchese.purchese_id FROM `supplier` JOIN purchese on purchese.id=supplier.purchese_id";
                     $result=$mysqli->common_query($sql);
                       if(!$result['error']){
                         foreach($result['data'] as $i=>$sales){
                        /* $result=$mysqli->common_select("sales");
                         if(!$result['error']){
                             foreach($result['data'] as $i=>$sales){*/
                     ?> 
                        <!-- //$where['status']=1;
                        $sql="select * from supplier";
                        $result=$mysqli->common_query($sql);
                        if(!$result['error']){
                            foreach($result['data'] as $i=>$supplier){  -->
                            <tr>
                                <td><?= ++$i; ?></td>
                                <td><?= $supplier->sup_name ?></td>
                                <td><?= $supplier->contact ?></td>
                                <td><?= $supplier->email ?></td>
                                <td><?= $supplier->total_amount ?></td>
                                <td><?= $supplier->payment==$supplier->total_amount?"Paid":"Due - ".($supplier->total_amount-$supplier->payment ) ?></td>
                                <td><?= $supplier->note ?></td>
                    
                                <td>
                                  <a href="supplier_edit.php?id=<?=$supplier->id ?>" class="btn btn-xs btn-info" title="Update"><i class="fa fa-edit"></i></a>
                                  <a onclick="return confirm('Are you sure to delete?')" href="supplier_delete.php?id=<?= $supplier->id ?>" class="btn btn-xs btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                  <?php if($sales->payment<$sales->total_amount){ ?>
                                    <button onclick="pay_due_set('<?= $sales->customer_name ?>','<?= $sales->id ?>','<?=($sales->total_amount-$sales->payment) ?>','<?= $sales->payment ?>')" type="button" data-toggle="modal" data-target="#sales_payment" class="btn btn-xs btn-warning" title="Payment"><i class="fa fa-money-bill"></i></button>
                                  <?php } ?>
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
      "buttons": [ "csv", "excel", "pdf"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
