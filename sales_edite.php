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
            <h1>Sales Update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="user_list.php">Sales</a></li>
              <li class="breadcrumb-item active">Sales Update</li>
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
                <h3 class="card-title">Sales Information Update</h3>
              </div>
              <!-- /.card-header -->
            <?php
                $id=$_GET['id'];    
                $w['id']=$id;
                $user_data=$mysqli->common_select_single('sales','*',$w);
            ?>
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <?php include('message.php'); ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="customer_id" class="form-label">Customer ID:</label>
                        <input type="number" value="<?= $user_data['data']->customer_id ?>" class="form-control" id="customer_id" placeholder="Enter Customer ID" name="customer_id">
                        </div>
                        <div class="col-md-6">
                        <label for="note" class="form-label">Note:</label>
                        <textarea class="form-control" id="note" placeholder="Enter Note" name="note"> <?= $user_data['data']->note ?> </textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                        <label for="sale_date" class="form-label">Sale Date:</label>
                        <input type="datetime" value="<?= $user_data['data']->sale_date ?>" class="form-control" id="sale_date" placeholder="Enter Sale Date" name="sale_date">
                        </div>
                        <div class="col-md-6">
                        <label for="sub_amount" class="form-label">Sub Amount:</label>
                        <input type="text" value="<?= $user_data['data']->sub_amount ?>" class="form-control" id="sub_amount" placeholder="Enter Sub Amount" name="sub_amount">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                        <label for="tax" class="form-label">Tax:</label>
                        <input type="text" value="<?= $user_data['data']->tax ?>" class="form-control" id="tax" placeholder="Enter Tax" name="tax">
                        </div>
                        <div class="col-md-6">
                        <label for="discount" class="form-label">Discount:</label>
                        <input type="text" value="<?= $user_data['data']->discount ?>" class="form-control" id="discount" placeholder="Enter Discount" name="discount">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                        <label for="total_amount" class="form-label">Total Amount:</label>
                        <input type="text" value="<?= $user_data['data']->total_amount ?>" class="form-control" id="total_amount" placeholder="Enter Total Amount" name="total_amount">
                        </div>
                        <div class="col-md-6">
                        <label for="payment" class="form-label">Payment:</label>
                        <input type="text" value="<?= $user_data['data']->payment ?>" class="form-control" id="payment" placeholder="Enter Due" name="payment">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <?php
                if($_POST){
                  $upwhere['id']=$id;
                  $result=$mysqli->common_update('sales',$_POST,$upwhere);
                  if($result['error']){
                    $_SESSION['class']="danger";
                    $_SESSION['msg']=$result['msg'];
                    echo "<script> location.replace('$base_url/sales_edite.php?id=$id')</script>";
                  }else{
                    $_SESSION['class']="success";
                    $_SESSION['msg']=$result['msg'];
                    echo "<script> location.replace('$base_url/sales_list.php')</script>";
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

