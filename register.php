<?php include_once('include/settings.php'); ?>
<?php if(isset($_SESSION['id'])) header('location:index.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SHOP | Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>SHOP</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>
      <?php if(isset($_SESSION['msg'])){ ?>
          <b class="text-danger"><?= $_SESSION['msg']; ?></b>
      <?php  unset($_SESSION['msg']); }?>
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="contact" class="form-control" placeholder="Contact Number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="cpassword" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <?php
        
        if($_POST){
          
          if($_POST['password']!=$_POST['cpassword']){
            $_SESSION['msg']="Password and confirm password are not same";
          }else{
            unset($_POST['cpassword']); // remove retype password from post array
            $_POST['password']=(sha1($_POST['password']));
            $_POST['status']=1;
            $_POST['created_at']=date('Y-m-d H:i:s');
            $_POST['created_by']=1;
            $_POST['role_id']=1;
            
            $result=$mysqli->common_create('auth',$_POST);
            
            if(!$result['error']){
              $_SESSION['name']=$_POST['name'];
              $_SESSION['email']=$_POST['email'];
              $_SESSION['contact']=$_POST['contact'];
              $_SESSION['id']=$result['insert_id'];
              header('location:index.php');
            }else{
              $_SESSION['msg']="Please try again";
            }
          }
        }
        // if($_POST){
        //   $_POST['password']=md5(sha1($_POST['cpassword']));
        //   $result=$mysqli->common_create('auth',$_POST);
        //   //{
        //     //$_SESSION['msg']="Password and confirm password are not same";
        //   //{
        //     //unset($_POST['cpassword']); // remove retype password from post array
        //     // $_POST['password']=sha1($_POST['password']);
        //     // $_POST['status']=1;
        //     // $_POST['created_at']=date('Y-m-d H:i:s');
        //     // $_POST['created_by']=1;
        //     // $_POST['role_id']=1;
            
        //     // $result=$mysqli->common_create('auth',$_POST);
            
        //     if(!$result['error']){
        //       $_SESSION['name']=$_POST['name'];
        //       $_SESSION['email']=$_POST['email'];
        //       $_SESSION['contact']=$_POST['contact'];
        //       $_SESSION['id']=$result['insert_id'];
        //       header('location:index.php');
        //     }else{
        //       $_SESSION['msg']="Please try again";
        //     }
        //   //}
        // }

      ?>
      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
