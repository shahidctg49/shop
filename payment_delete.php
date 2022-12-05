<?php
    include('include/settings.php');
    $where['id']=$_GET['id'];
    $data['status']=0;
    $result=$mysqli->common_update('customer_payment',$data,$where);
    if($result['error']){
        $_SESSION['class']="danger";
        $_SESSION['msg']=$result['error'];
    }else{
        $_SESSION['class']="success";
        $_SESSION['msg']="Data Deleted";
    }
    echo "<script> location.replace('$base_url/payment_list.php')</script>";
?>