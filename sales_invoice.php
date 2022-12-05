<?php include_once('include/settings.php'); ?>
<?php
    $id=$_GET['id'];
    $w['id']=$id;
    $sales=$mysqli->common_select_single('sales','*',$w)['data'];
    $cw['id']=$sales->customer_id;
    $customer=$mysqli->common_select_single('customer','*',$cw)['data'];
    $sql="SELECT sales_details.*,product.product_name FROM `sales_details` 
    join product on product.id=sales_details.product_id
    WHERE `sales_id`=$id";
    $sales_details=$mysqli->common_query($sql)['data'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inv-<?= sprintf('%05d',$sales->id) ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <br>
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i>Super Shop
                    <small class="float-right">Date: <?= date('d/m/Y',strtotime($sales->sale_date)) ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-6 invoice-col">
                  From
                  <address>
                    <strong>Biplab Uddin</strong><br>
                    Admin Resort (3rd Floor)100,<br>
                    CDA Avenue, Nasirabad, Chattogram � 4203<br>
                    Phone: 01762726907<br>
                    Email: biplab@gmail.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-6 invoice-col pl-5">
                  <b>Invoice #<?= sprintf('%05d',$sales->id) ?></b><br>
                  <b>Customer Name: <?= $customer->customer_name ?></b><br>
                  <b>Customer Phone: <?= $customer->contact ?></b><br>
                  <?php if(($sales->total_amount - $sales->payment) > 0) { ?>
                  <b>Payment Due:</b> <?= $sales->total_amount - $sales->payment ?>
                  <?php } else{ ?>
                    <b>Paid</b>
                  <?php } ?>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>#SL</th>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Qty</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php foreach($sales_details as $i=>$sd){ ?>
                        <tr>
                          <td><?= ++$i?></td>
                          <td><?= $sd->product_name ?></td>
                          <td><?= $sd->price ?></td>
                          <td><?= $sd->qty ?></td>
                          <td><?= ($sd->price*$sd->qty) ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <div class="col-6"></div>
                <div class="col-6">
                <?php if(($sales->total_amount - $sales->payment) > 0) { ?>
                  <p class="lead">Amount Due: <?= $sales->total_amount - $sales->payment ?></p>
                  <?php } else{ ?>
                    <p class="lead">Paid</p>
                  <?php } ?>
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td><?= $sales->sub_amount ?></td>
                      </tr>
                      <tr>
                        <th>Tax </th>
                        <td><?= $sales->tax ?></td>
                      </tr>
                      <tr>
                        <th>Discount:</th>
                        <td><?= $sales->discount ?></td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td><?= $sales->total_amount ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer no-print">
    <div class="text-center"><b>Copyright &copy; Super Shop</b></div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<script type="text/javascript">
  window.onafterprint = window.close;
  window.print();
</script>
</body>
</html>