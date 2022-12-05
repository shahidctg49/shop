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
            <h1>Product List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Product List</li>
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
                <h3 class="card-title">Product</h3>
                <a href="product_create.php" class="btn float-right btn-primary" title="Create">Add New</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php include('message.php'); ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>#SL</th>
                        <th>Product name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $where['status']=1;
                        $sql="select product.*, category.cat_name, brand.brand_name,(SELECT sum(`pin` - `pout`) FROM `stock` where product.id=stock.product_id) as stock from product join category on category.id=product.category_id join brand on brand.id=product.brand_id where product.status=1 order by product.id DESC";
                        $result=$mysqli->common_query($sql);
                        if(!$result['error']){
                            foreach($result['data'] as $i=>$product){
                    ?> 
                            <tr>
                                <td><?= ++$i; ?></td>
                                <td><?= $product->product_name ?></td>
                                <td><?= $product->cat_name ?></td>
                                <td><?= $product->brand_name ?></td>
                                <td><?= $product->price ?></td>
                                <td><?= $product->discount ?></td>
                                <td><?= $product->stock ?></td>
                                <td>
                                  <a href="product_edit.php?id=<?= $product->id ?>" class="btn btn-xs btn-info" title="Update"><i class="fa fa-edit"></i></a>
                                  <a onclick="return confirm('Are you sure to delete?')" href="product_delete.php?id=<?= $product->id ?>" class="btn btn-xs btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
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
