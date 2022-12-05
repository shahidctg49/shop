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
            <h1>Customer Update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="customer_list.php">Customer</a></li>
              <li class="breadcrumb-item active">Customre Update</li>
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
                <h3 class="card-title">Customer Information Update</h3>
              </div>
              <!-- /.card-header -->
            <?php
                $id=$_GET['id'];    
                $w['id']=$id;
                $data=$mysqli->common_select_single('customer','*',$w)['data'];
            ?>
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <?php include('message.php'); ?>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="customer_name">Customer Name</label>
                        <input type="text" value="<?= $data->customer_name ?>" name="customer_name" class="form-control" id="customer_name" placeholder="Enter customer Name">
                      </div>
                    </div>
                  </div>
            
                <?php include('message.php'); ?>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="email">Email</label>
                        <input type="text" value="<?= $data->email ?>" name="email" class="form-control" id="email" placeholder="Enter email">
                      </div>
                    </div>
                  </div>
           
                <?php include('message.php'); ?>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="contact">Contact</label>
                        <input type="text" value="<?= $data->contact ?>" name="contact" class="form-control" id="contact" placeholder="Enter contact">
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
                  $result=$mysqli->common_update('customer',$_POST,$upwhere);
                  if($result['error']){
                    $_SESSION['class']="danger";
                    $_SESSION['msg']=$result['msg'];
                    echo "<script> location.replace('$base_url/customer_update.php?id=$id')</script>";
                  }else{
                    $_SESSION['class']="success";
                    $_SESSION['msg']=$result['msg'];
                    echo "<script> location.replace('$base_url/customer_list.php')</script>";
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

