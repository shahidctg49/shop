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
            <h1>Add New product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="product_list.php">Products</a></li>
              <li class="breadcrumb-item active">Add New Products</li>
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
                <h3 class="card-title">product Information Add</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <?php include('message.php'); ?>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="product_name">Product Name</label>
                        <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter product Name">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <div class="row">
                          <div class="col-md-6">
                              <label for="price">Category</label>
                              <select name="category_id" class="form-control" id="category_id">
                                <option value="">Select Category</option>
                                <?php
                                  $result=$mysqli->common_select("category");
                                  if(!$result['error']){
                                    foreach($result['data'] as $i=>$category){
                                ?>
                                    <option value="<?= $category->id ?>"><?= $category->cat_name ?></option>
                                <?php } } ?>
                              </select>
                          </div>
                          <div class="col-md-6">
                              <label for="brand_id">Brand</label>
                              <select name="brand_id" class="form-control" id="brand_id">
                                <option value="">Select Brand</option>
                                <?php
                                  $result=$mysqli->common_select("brand");
                                  if(!$result['error']){
                                    foreach($result['data'] as $i=>$brand){
                                ?>
                                    <option value="<?= $brand->id ?>"><?= $brand->brand_name ?></option>
                                <?php } } ?>
                              </select>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="row">
                          <div class="col-md-6">
                              <label for="price">Price</label>
                              <input type="text" name="price" class="form-control" id="price" placeholder="Enter price">
                          </div>
                          <div class="col-md-6">
                              <label for="discount">discount</label>
                              <input type="text" name="discount" class="form-control" id="discount" placeholder="Enter discount">
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="description">description</label>
                        <textarea name="description" class="form-control" id="description"></textarea>
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
                   $_POST['status']=1;

                 $result=$mysqli->common_create('product',$_POST);
                 if($result['error']){
                   $_SESSION['class']="danger";
                   $_SESSION['msg']=$result['msg'];
                   echo "<script> location.replace('$base_url/product_create.php')</script>";
                 }else{
                   $_SESSION['class']="success";
                   $_SESSION['msg']=$result['msg'];
                   echo "<script> location.replace('$base_url/product_list.php')</script>";
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

