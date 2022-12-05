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
            <h1>stock List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">stock List</li>
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
                <h3 class="card-title"> User</h3>
                <a href="stock_create.php" class="btn float-right btn-primary" title="Create">Add New</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php include('message.php'); ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>#SL</th>
                        <th>Product</th>
                        <th>IN</th>
                        <th>out</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Balance</th>
                        <th>Sales Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $sql="SELECT product.product_name, sum(stock.pin) as pin,sum(stock.pout) as pout,AVG(stock.price) as price, (sum(stock.pin) * stock.`price`) stock_in_price,(sum(stock.pout) * stock.`price`) stock_out_price FROM `stock` join product on stock.product_id=product.id group by stock.product_id";
                      $result=$mysqli->common_query($sql);
                      $total_product=$total_balance=$total_sales=$tin=$tout=0;
                      if(!$result['error']){
                          foreach($result['data'] as $i=>$stock){
                            $cstock=$stock->pin - $stock->pout;
                            $balance=round(($stock->stock_in_price/$stock->pin)*$cstock);
                            $total_product+=$cstock;
                            $total_balance+=$balance;
                            $total_sales+=round($stock->stock_out_price);
                            $tin+=$stock->pin;
                            $tout+=$stock->pout;
                  ?> 
                            <tr>
                                <td><?= ++$i; ?></td>
                                <td><?= $stock->product_name ?></td>
                                <td><?= $stock->pin ?></td>
                                <td><?= $stock->pout ?></td>
                                <td><?= round($stock->price) ?></td>
                                <td><?= $cstock ?></td>
                                <td><?= $balance ?></td>
                                <td><?= round($stock->stock_out_price) ?></td>
                            </tr>
                    <?php  }
                        }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td></td>
                      <td>Total</td>
                      <td><?= $tin ?></td>
                      <td><?= $tout ?></td>
                      <td></td>
                      <td><?= $total_product ?></td>
                      <td><?= $total_balance ?></td>
                      <td><?= $total_sales ?></td>
                    </tr>
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
