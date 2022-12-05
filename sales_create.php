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
            <h1>Add New Sales</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php" class="text-success">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="sales_list.php" class="text-success">Sales</a></li>
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
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Sales Information Add</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <?php include('message.php'); ?>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="customer_id" class="form-label text-success">Customer ID:</label>
                            <select class="form-control" id="customer_id" name="customer_id">
                          <option value="">Select Customer</option>
                          <?php
                            $result=$mysqli->common_select("customer");
                            if(!$result['error']){
                              foreach($result['data'] as $i=>$cust){
                          ?>
                              <option value="<?= $cust->id ?>"><?= $cust->customer_name ?></option>
                          <?php } } ?>
                        </select>
                        </div>
                        <div class="col-md-6">
                        <label for="sale_date" class="form-label text-success">Sale Date:</label>
                        <input type="date" class="form-control" id="sale_date" placeholder="Enter Sale Date" name="sale_date">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-5">
                        <label class="form-label text-success" for="">Product</label>
                      </div>
                      <div class="col-2"><label class="form-label text-success" for="">Price</label></div>
                      <div class="col-2"><label class="form-label text-success" for="">Qty</label></div>
                      <div class="col-3"><label class="form-label text-success" for="">Total</label></div>
                      <div class="col-1"></div>
                    </div>
                    <div class="repeater">
                      <div data-repeater-list="items">
                        <div class="row" data-repeater-item >
                          <div class="col-5 p-0">
                            <select name="product_id" class="form-control product_id" onchange="product_add(this)">
                              <option value="">Select Product</option>
                              <?php
                                $sql="select product.*, (SELECT sum(`pin` - `pout`) FROM `stock` where product.id=stock.product_id) as stock from product where product.status=1 order by product.product_name ASC";
                                $result=$mysqli->common_query($sql)['data'];
                                foreach($result as $data){
                              ?>
                                <option data-stock="<?= $data->stock ?>" data-discount="<?= $data->discount ?>" data-price="<?= $data->price ?>" value="<?= $data->id ?>"><?= $data->product_name ?> ( <?= $data->stock ?>)</option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="col-2 p-0">
                            <input type="text" onkeyup="get_pricecount(this)" class="form-control price" name="price">
                          </div>
                          <div class="col-2 p-0">
                            <input type="text" class="form-control qty" name="qty" onkeyup="get_count(this)">
                          </div>
                          <div class="col-2 p-0">
                            <input readonly type="text" class="form-control sub" name="sub">
                          </div>
                          <div class="col-1">
                            <button class="btn btn-danger btn-sm" data-repeater-delete type="button"><i class="fa fa-trash"></i></button>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-1 offset-11">
                          <button class="btn btn-info btn-sm" data-repeater-create type="button"><i class="fa fa-plus"></i></button>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="form-group">
                      <div class="row">
                        <div class="col-6">
                          <label for="note" class="form-label text-success">Note:</label>
                          <textarea class="form-control" id="note" placeholder="Enter Note" rows="12" name="note"></textarea>
                        </div>
                        <div class="col-6">
                          <div>
                            <label for="sub_amount" class="form-label text-success">Sub Amount:</label>
                            <input type="text" class="form-control" id="sub_amount" placeholder="Enter Sub Amount" name="sub_amount">
                          </div>
                          <div>
                            <label for="discount" class="form-label text-success">Discount:</label>
                            <input type="text" class="form-control" id="discount" placeholder="Enter Discount" name="discount" onkeyup="total_amount_calc()">
                          </div>
                          <div>
                            <label for="tax" class="form-label text-success">Tax (%):</label>
                            <input type="text" class="form-control" id="tax" placeholder="Enter Tax" name="tax" onkeyup="total_amount_calc()">
                          </div>
                          <div>
                            <label for="total_amount" class="form-label text-success">Total Amount:</label>
                            <input type="text" class="form-control" id="total_amount" placeholder="Enter Total Amount" name="total_amount">
                          </div>
                          <div>
                            <label for="payment" class="form-label text-success">Pay Amount:</label>
                            <input type="text" class="form-control" id="payment" placeholder="Enter Pay Amount" name="payment">
                          </div>
                        </div>
                      </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-2 offset-2 text-center mt-4">
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
              <?php
               if($_POST){
                 $sup['customer_id']=$_POST['customer_id'];
                 $sup['sale_date']=$_POST['sale_date'];
                 $sup['sub_amount']=$_POST['sub_amount'];
                 $sup['discount']=$_POST['discount'];
                 $sup['tax']=$_POST['tax'];
                 $sup['total_amount']=$_POST['total_amount'];
                 $sup['payment']=$_POST['payment'];
                 $sup['note']=$_POST['note'];
                
                 $result=$mysqli->common_create('sales',$sup);
                 if($result['error']){
                   $_SESSION['class']="danger";
                   $_SESSION['msg']=$result['msg'];
                   echo "<script> location.replace('$base_url/sales_create.php')</script>";
                 }else{
                   $sales_id=$result['insert_id'];

                   /* add data to customer payment */
                   if($_POST['payment']){
                     $pay['sales_id']=$sales_id;
                     $pay['customer_id']=$_POST['customer_id'];
                     $pay['pay_amount']=$_POST['payment'];
                     $pay['pay_date']=$_POST['sale_date'];
                     $paym=$mysqli->common_create('customer_payment',$pay);
                   }
                   
                   $sales_det=array();
                   $stock_det=array();
                   foreach($_POST['items'] as $item){
                     /* save data to sales details */
                     $sales_det['sales_id']=$sales_id;
                     $sales_det['product_id']=$item['product_id'];
                     $sales_det['price']=$item['price'];
                     $sales_det['qty']=$item['qty'];

                     $purdcreate=$mysqli->common_create('sales_details',$sales_det);
                     /* save data to stock */
                     $stock_det['sale_id']=$sales_id;
                     $stock_det['product_id']=$item['product_id'];
                     $stock_det['pout']=$item['qty'];
                     $stock_det['price']=$item['price'];
                     $stock=$mysqli->common_create('stock',$stock_det);
                   }
                   $_SESSION['class']="success";
                   $_SESSION['msg']=$result['msg'];
                   echo "<script> location.replace('$base_url/sales_list.php')</script>";
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

<script src="assets/js/jquery.repeater.min.js"></script>
<script>
  function total_amount_calc(){
    var sub_amount=parseFloat($('#sub_amount').val());
    var discount=parseFloat($('#discount').val());
    var tax=parseFloat($('#tax').val());
    if(!sub_amount)sub_amount=0;
    if(!discount)discount=0;

    if(tax>0){
      tax= (sub_amount*(tax/100));
    }else{
      tax=0
    }
    var total=((sub_amount+tax) - discount);
    $('#total_amount').val(total);
  }
</script>
<script>
  function product_add(e){
    var price=$(e).children('option:selected').data('price');
    var discount=$(e).children('option:selected').data('discount');
    $(e).closest('.row').find('.price').val(price);
  }
  function get_count(e){
    var qty=parseFloat($(e).val());
    var stock=parseFloat($(e).closest('.row').find('.product_id').children('option:selected').data('stock'));
    if(qty>stock){
      $(e).val(stock);
      qty=stock;
      alert("You dont have enough stock so you cannot sale more than "+stock);
    }
    var price=parseFloat($(e).closest('.row').find('.price').val());
    var sub=qty*price;
    $(e).closest('.row').find('.sub').val(sub);
    sub_amount();
    total_amount_calc();
  }
  function get_pricecount(e){
    var price=parseFloat($(e).val());
    var qty=parseFloat($(e).closest('.row').find('.qty').val());
    var sub=qty*price;
    $(e).closest('.row').find('.sub').val(sub);
    sub_amount();
    total_amount_calc();
  }
  function sub_amount(){
    var sub_amount=0;
    $('.sub').each(function(){
      sub_amount+=parseFloat($(this).val());
    });
    $('#sub_amount').val(sub_amount);
    $('#total_amount').val(sub_amount);
    total_amount_calc();
  }
</script>

<script>
  $(document).ready(function () {
    $('.repeater').repeater()
  });
</script>
