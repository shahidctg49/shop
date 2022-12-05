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
            <h1>Purchase List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
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
                <h3 class="card-title">All Purchase</h3>
                <a href="Purchase_create.php" class="btn float-right btn-primary" title="Create">Add New</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php include('message.php'); ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>#SL</th>
                        <th>Supplier</th>
                        <th>Purchase Data</th>
                        <th>Sub Amount</th>
                        <th>Tax</th>
                        <th>Discount</th>
                        <th>Total Amount</th>
                        <th>Payment Status</th>
                        <th>Note</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>              
                  <?php
                    $sql="SELECT purchese.*,supplier.sup_name FROM `purchese` JOIN supplier on supplier.id=purchese.supplier_id";
                    $result=$mysqli->common_query($sql);
                      if(!$result['error']){
                        foreach($result['data'] as $i=>$purchese){
                ?> 
                    <tr>
                        <td><?= ++$i; ?></td>
                        <td><?= $purchese->sup_name ?></td>
                        <td><?= date('d-m-Y',strtotime($purchese->purchese_date)) ?></td>
                        <td><?= $purchese->sub_amount ?></td>
                        <td><?= $purchese->tax ?>%</td>
                        <td><?= $purchese->discount ?></td>
                        <td><?= $purchese->total_amount ?></td>
                        <td><?= $purchese->payment==$purchese->total_amount?"Paid":"Due - ".($purchese->total_amount-$purchese->payment ) ?></td>
                        <td><?= $purchese->note ?></td>
                        <td>
                          <a href="purchase_edit.php?id=<?= $purchese->id ?>" class="btn btn-xs btn-info" title="Update"><i class="fa fa-edit"></i></a>
                          <?php if($purchese->payment<$purchese->total_amount){ ?>
                            <button onclick="pay_due_set('<?= $purchese->sup_name ?>','<?= $purchese->id ?>','<?=($purchese->total_amount-$purchese->payment) ?>','<?= $purchese->payment ?>')" type="button" data-toggle="modal" data-target="#purchase_payment" class="btn btn-xs btn-warning" title="Payment"><i class="fa fa-money-bill"></i></button>
                          <?php } ?>
                        </td>
                      </tr>
                  <?php  }
                    }
                ?>
                  


            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Modal -->
<div class="modal fade" id="purchase_payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Paid By Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <div class="col-12">
                <label for="">Due</label>
                <input type="text" class="form-control" id="dueamt" readonly>
                <input type="hidden" id="ids" name="ids" >
                <input type="hidden" id="old_pay" name="old_pay" >
              </div>
              <div class="col-12">
                <label for="">Payment</label>
                <input type="text" onkeyup="checktotal()" class="form-control" name="payment" id="pay_amount">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Pay</button>
        </div>
      </form>
    </div>
  </div>
</div><!-- Button trigger modal -->
<?php
  if($_POST){
    $whereuppay['id']=$_POST['ids'];
    $data['payment']=$_POST['old_pay'] + $_POST['payment'];
    $data['last_pay_date']=date('Y-m-d');

    $result=$mysqli->common_update('purchese',$data,$whereuppay);
    if($result['error']){
    $_SESSION['class']="danger";
    $_SESSION['msg']=$result['error'];
    echo "<script> location.replace('$base_url/purchase_list.php')</script>";
    }else{
    $_SESSION['class']="success";
    $_SESSION['msg']=$result['msg'];
    echo "<script> location.replace('$base_url/purchase_list.php')</script>";
    }
  }
?>
<!-- Side menu bar -->
<?php include_once('include/footer.php'); ?>
<!-- /.Side menu bar -->
<script>
	function pay_due_set(cname,ids,due,old_pay){
		$('#exampleModalLabel').text("Paid by "+cname);
		$('#dueamt').val(due);
		$('#ids').val(ids);
		$('#old_pay').val(old_pay);
	}

	function checktotal(){
		
		var dueamt=parseFloat($('#dueamt').val());
		var pay_amount=parseFloat($('#pay_amount').val());
		if(pay_amount > dueamt){
			alert("you cannot pay more than "+ dueamt);
			$('#pay_amount').val(dueamt);
		}
	}

</script>

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
      "buttons": ["csv", "excel", "pdf", "print",]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
