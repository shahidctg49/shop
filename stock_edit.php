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
            <h1>stock Update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="stock_list.php">stock</a></li>
              <li class="breadcrumb-item active">Stock Update</li>
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
                <h3 class="card-title">Stock Information Update</h3>
              </div>
              <!-- /.card-header -->
            <?php
                $id=$_GET['id'];    
                $w['id']=$id;
                $user_data=$mysqli->common_select_single('stock','*',$w);
            ?>
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <?php include('message.php'); ?>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="product_id">Product ID</label>
                            <input type="text" value="<?= $user_data['data']->product_id ?>" name="product_id" class="form-control" id="product_id">
                        </div>
                        <div class="col-md-6">
                            <label for="pin">Product IN</label>
                            <input type="text" value="<?= $user_data['data']->pin ?>" name="pin" class="form-control" id="pin">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="pout">Product Out</label>
                            <input type="text" value="<?= $user_data['data']->pout ?>" name="pout" class="form-control" id="pout">
                        </div>
                        <div class="col-md-6">
                            <label for="price">Price</label>
                            <input type="text" value="<?= $user_data['data']->price ?>" name="price" class="form-control" id="price">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row"> 
                      <div class="col-md-6">
                            <label for="purchase_id">Purchase ID</label>
                            <input type="text" value="<?= $user_data['data']->purchase_id ?>" name="purchase_id" class="form-control" id="purchase_id">
                       </div>
                       <div class="col-md-6">
                            <label for="sales_id">Sales ID</label>
                            <input type="text" value="<?= $user_data['data']->sales_id ?>" name="sales_id" class="form-control" id="sales_id">
                       </div>
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
                $result=$mysqli->common_update('stock',$_POST,$upwhere);
                if($result['error']){
                  $_SESSION['class']="danger";
                  $_SESSION['msg']=$result['msg'];
                  echo "<script> location.replace('$base_url/stock_edite.php?id=$id')</script>";
                }else{
                  $_SESSION['class']="success";
                  $_SESSION['msg']=$result['msg'];
                  echo "<script> location.replace('$base_url/stock_list.php')</script>";
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

