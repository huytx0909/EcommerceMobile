

<div id=content class="space-top-none">
			<div class="space50">&nbsp;</div>


		<div class="row">
	  
<?php
           
             if(isset($_SESSION['cart']))
                      {
           


        if(isset($_POST['placeorder'])) {
  
    if(isset($_POST['fullname'])){
    $Fullname = $_POST['fullname']; }
    
    if(isset($_POST['email'])) {
    $Email = $_POST['email']; }
    
     if(isset($_POST['address'])) {
    $Address = $_POST['address']; }
   
     if(isset($_POST['phone'])) {
    $Phone = $_POST['phone']; }
    
    if(isset($_POST['note'])) {
    $Note = $_POST['note']; }
    


     $checkout_sql = "INSERT INTO customer(id,name,email,address,phone_number,note) VALUES ('','$Fullname', '$Email', '$Address', '$Phone', '$Note')";
   	if (mysqli_query($db, $checkout_sql)) {
       $customer_id = mysqli_insert_id($db);

    ?>
   <script type="text/javascript"> alert("customer infor saved successfully"); </script>

 <?php
} else {
    echo "Lỗi: " . $checkout_sql . "<br>" . mysqli_error($db);
}


     //bill
     $totalbill=0;
     foreach($_SESSION['cart'] as $id => $val){
     	$totalbill = $totalbill + ($_SESSION['cart'][$id]['quantity'])*($_SESSION['cart'][$id]['price']);
     }
    
    $date_order = date("Y-m-d H:i:s");
   
   if($_POST['placeorder']="paid1") {
    $payment ="paid when received purchases"; 
     } else if($_POST['placeorder']="paid2") {
   
    $payment ="paid by credit card"; 

     }

     $bill_sql="INSERT INTO bills (id, id_customer, date_order, total, payment) VALUES('','$customer_id','$date_order','$totalbill','$payment')";

	 mysqli_query($db, $bill_sql);
       $bill_id = mysqli_insert_id($db);
   
                    
        //billdetail
                foreach($_SESSION['cart'] as $id=>$val)
                       {

                      
                         $dateorder = date("Y-m-d H:i:s");
                       	$billdetail_sql ="INSERT INTO bill_detail (id, id_bill, id_product, quantity, unit_price, guarantee_started) VALUES('','$bill_id','".$val['idproduct']."','".$val['quantity']."','".$val['price']."','$dateorder')";
                       	mysqli_query($db, $billdetail_sql);
                         $billdetail_id = mysqli_insert_id($db);

                       	}
                       
                       }
                   }
               

                        ?>
	   <div class="col-md-5" align="center">

<form name="form1" action="index.php?page=checkout" method="post" class="beta-form-checkout">
				
					
    <h2>Customer information for Shipping</h2>
     
        <div class="form-group">
            <label>fullname</label>
            <input type="text" class="form-control" name="fullname" placeholder="" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name ="email" placeholder="" required>
        </div>
       
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone" placeholder="" required>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address" placeholder="" required>
        </div>
       <div class="form-group">
    <label for="exampleFormControlTextarea1">Note</label>
    <textarea class="form-control" name="note" rows="3"></textarea>
  </div>
  <input type = "submit" value="placed order" class="btn btn-primary" name="placeorder">
</form>        

  </div>

  


 <div class="col-md-1"></div>

 
             <div class="col-md-6" align="center">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading"><h3><strong>
                            Review Order</strong></h3> <div class="pull-right"><small><a class="afix-1" href="index.php?page=cart">Edit Cart</a></small></div>
                        </div>
                        			<div class="space50">&nbsp;</div>

                        <div class="panel-body">
                          
<?php
                     if(isset($_SESSION['cart']))
                     {
                       $total=0;
                       foreach($_SESSION['cart'] as $id=>$val)
                       {
                       	$rate=$val['quantity']*$val['price'];
                       	$total= $total + $rate;

                        

              ?>

                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img src="image/<?= $val['image']; ?>" alt="" 	style="max-width: 30px; height:30px;"/>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12"><?= $val['name']; ?></div>
                                    <div class="col-xs-12" name ="<?= $id; ?>"><small>Quantity:<span> <?= $val['quantity']; ?></span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6><span>$</span><?= $val['price']; ?></h6>
                                </div>
                            </div>
                         <?php } ?>
                           
                           
                            </div>
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"><span>$</span><span><?= number_format($total,2); ?></span></div>
                                </div>
                            </div>

                              <div class="form-group"><hr /></div>
                            <div class="form-group" name>
                                <div class="col-xs-12">
                                    <h3><strong>Payment</strong></h3>
                                    <div class="pull-right">
                   <div class="form-check" align="left">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="paid1"  value="option1" checked>
            paid when received purchases.
          </label>
        </div>
        <div class="form-check" align="left">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="paid2" value="option2">
            paid by credit card
          </label>
        </div>
                  <p> you wil receive your purchase within 5 days </p>
                 
        </div>
        </div>
        </div>
        </div>
        </div>
        <?php
            }
       
        ?>
      
        </div>       
        </div>


      