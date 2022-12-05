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
            <h1> New brand</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="brand_list.php">brand</a></li>
              <li class="breadcrumb-item active">Add New brand</li>
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
                <h3 class="card-title">brand Information Add</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <?php include('message.php'); ?>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="brand_name">Brand name</label>
                        <input type="text" name="brand_name" class="form-control" id="brand_name" placeholder="Enter Brand Name">
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
                  $result=$mysqli->common_create('brand',$_POST);
                  if($result['error']){
                    $_SESSION['class']="danger";
                    $_SESSION['msg']=$result['error'];
                    echo "<script> location.replace('$base_url/brand_create.php')</script>";
                  }else{
                    $_SESSION['class']="success";
                    $_SESSION['msg']=$result['msg'];
                    echo "<script> location.replace('$base_url/brand_list.php')</script>";
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

