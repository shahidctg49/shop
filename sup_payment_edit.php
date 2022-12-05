<!-- header -->
<?php include_once('include/header.php'); ?>
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
            <h1>Payment Update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="payment_list.php">Payments</a></li>
              <li class="breadcrumb-item active">Payment Update</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Payment Information Update</h3>
              </div>
              <!-- /.card-header -->
            <?php
                $id=$_GET['id'];    
                $w['id']=$id;
                $data=$mysqli->common_select_single('supplier_payment','*',$w)['data'];
            ?>
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <?php include('message.php'); ?>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="supplier_id">Supplier Id</label>
                        <input type="text" value="<?= $data->supplier_id ?>" name="supplier_id" class="form-control" id="supplier_id" placeholder="Enter supplier id">
                      </div>
                    </div>
                  </div>
                <?php include('message.php'); ?>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="pay_amount">Pay amount</label>
                        <input type="text" value="<?= $data->pay_amount ?>" name="pay_amount" class="form-control" id="pay_amount" placeholder="Enter pay amount">
                      </div>
                    </div>
                  </div>
                <?php include('message.php'); ?>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="pay_date">Pay date</label>
                        <input type="text" value="<?= $data->pay_date ?>" name="pay_date" class="form-control" id="pay_date" placeholder="Enter pay date">
                      </div>
                    </div>
                  </div>
              </div>
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <?php
                if($_POST){
                  $upwhere['id']=$id;
                  $result=$mysqli->common_update('supplier_payment',$_POST,$upwhere);
                  if($result['error']){
                    $_SESSION['class']="danger";
                    $_SESSION['msg']=$result['msg'];
                    echo "<script> location.replace('$base_url/sup_payment_update.php?id=$id')</script>";
                  }else{
                    $_SESSION['class']="success";
                    $_SESSION['msg']=$result['msg'];
                    echo "<script> location.replace('$base_url/sup_payment_list.php')</script>";
                  }
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
  
  
<!-- Side menu bar -->
<?php include_once('include/footer.php'); ?>
<!-- /.Side menu bar -->

