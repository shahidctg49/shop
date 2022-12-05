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
            <h1>Add New Stock</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="user_list.php">Stock</a></li>
              <li class="breadcrumb-item active">Add New Stock</li>
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
                <h3 class="card-title">Stock Information Add</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <?php include('message.php'); ?>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">product Id</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter id">
                        </div>
                        <div class="col-md-6">
                            <label for="contact">pin</label>
                            <input type="text" name="contact" class="form-control" id="contact" placeholder="Enter pin">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">price</label>
                            <input type="text" name="price" class="form-control" id="price" placeholder="Enter price">
                        </div>
                        <div class="col-md-6">
                            <label for="password">pin</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter pin">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="discount">discount</label>
                            <input type="text" name="discount" class="form-control" id="discount" placeholder="Enter discount">
                        </div>
                        <div class="col-md-6">
                            <label for="password">Pout</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter pout">
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
                  if($_FILES['image']['name']){
                    $path_parts = pathinfo($_FILES["image"]["name"]);
                    $image_name=time().rand(1000,9999).".".$path_parts['extension'];

                    $up=move_uploaded_file($_FILES['image']['tmp_name'],"images/user_pic/".$image_name);
                    if($up){
                      $_POST['image']=$image_name;
                    }
                  }

                    $_POST['password']=sha1($_POST['password']);
                    $_POST['status']=1;
                    $_POST['created_at']=date('Y-m-d H:i:s');
                    $_POST['created_by']=$_SESSION['id'];

                  $result=$mysqli->common_create('stock',$_POST);
                  if($result['error']){
                    $_SESSION['class']="danger";
                    $_SESSION['msg']=$result['error'];
                    echo "<script> location.replace('$base_url/stock_create.php')</script>";
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

