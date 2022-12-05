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
            <h1>User Update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="user_list.php">Users</a></li>
              <li class="breadcrumb-item active">User Update</li>
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
                <h3 class="card-title">User Information Update</h3>
              </div>
              <!-- /.card-header -->
            <?php
                $id=$_GET['id'];    
                $w['id']=$id;
                $user_data=$mysqli->common_select_single('auth','*',$w);
            ?>
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <?php include('message.php'); ?>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Name</label>
                            <input type="text" value="<?= $user_data['data']->name ?>" name="name" class="form-control" id="name" placeholder="Enter Full Name">
                        </div>
                        <div class="col-md-6">
                            <label for="contact">Contact Number</label>
                            <input type="text" value="<?= $user_data['data']->contact ?>" name="contact" class="form-control" id="contact" placeholder="Enter Phone Number">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">Email address</label>
                            <input type="email" value="<?= $user_data['data']->email ?>" name="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                        <div class="col-md-6">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="role">Role</label>
                            <select name="role_id" class="form-control" id="role">
                                <option value="">Select Role</option>
                                <?php
                                    $where['status']=1;
                                    $result=$mysqli->common_select("role","*",$where);
                                    if(!$result['error']){
                                        foreach($result['data'] as $role){
                                
                                ?>
                                        <option value="<?= $role->id ?>" <?= $user_data['data']->role_id==$role->id ?"selected":"" ?>><?= $role->role ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="image">User Image</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                            </div>
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
                  if($_FILES['image']['name']){
                    $path_parts = pathinfo($_FILES["image"]["name"]);
                    $image_name=time().rand(1000,9999).".".$path_parts['extension'];

                    $up=move_uploaded_file($_FILES['image']['tmp_name'],"images/user_pic/".$image_name);
                    if($up){
                      $_POST['image']=$image_name;
                    }
                  }

                  if($_POST['password']){
                    $_POST['password']=sha1($_POST['password']);
                  }else{
                    unset($_POST['password']); // if password is not provided
                  }

                    $_POST['updated_at']=date('Y-m-d H:i:s');
                    $_POST['updated_by']=$_SESSION['id'];
                
                    $upwhere['id']=$id;
                  $result=$mysqli->common_update('auth',$_POST,$upwhere);
                  if($result['error']){
                    $_SESSION['class']="danger";
                    $_SESSION['msg']=$result['error'];
                    echo "<script> location.replace('$base_url/user_update.php?id=$id')</script>";
                  }else{
                    $_SESSION['class']="success";
                    $_SESSION['msg']=$result['msg'];
                    echo "<script> location.replace('$base_url/user_list.php')</script>";
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

