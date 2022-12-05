<?php
    include('include/settings.php');
    $where['id']=$_GET['id'];
    $data['status']=0;
    $result=$mysqli->common_update('supplier',$data,$where);
    if($result['error']){
        $_SESSION['class']="danger";
        $_SESSION['msg']=$result['error'];
    }else{
        $_SESSION['class']="success";
        $_SESSION['msg']="Data Deleted";
    }
    echo "<script> location.replace('$base_url/supplier_list.php')</script>";
?>