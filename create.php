<?php session_start(); include_once('crud/crud.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h2 class="text-center">Add New Product</h2>
        <div class="row">
            <div class="col-6 offset-3">
                <?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name"> Category Name</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="0">Select Category</option>
                            <?php
                                $m=new crud;
                                $rs=$m->common_select("category");
                                if(!$rs['error']){
                                    foreach($rs['data'] as $d){
                            ?>
                                <option value="<?= $d->id ?>"> <?= $d->name ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name"> Product Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price"> Product Price</label>
                        <input type="text" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image"> Product Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                <?php   
                    if($_POST){
                        
                        $_POST['status']=1;
                        $_POST['created_at']=date('Y-m-d H:i:s');
                        
                        $imgname="";
                        if($_FILES['image']['name']){
                            $imgname= uniqid().$_FILES['image']['name'];
                            $imgup=move_uploaded_file($_FILES['image']['tmp_name'],'images/'.$imgname);
                        }
                        $_POST['product_image']=$imgname;
                        
                        $rs=$m->common_create("products",$_POST);
                        if(!$rs['error']){
                            $_SESSION['msg']= $rs['msg'];
                            echo "<script>location.replace('index.php')</script>";
                        }else{
                            $_SESSION['msg']= $rs['msg'];
                            echo "<script>location.replace('create.php')</script>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>