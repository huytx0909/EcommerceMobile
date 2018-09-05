

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-10 col-md-offset-1">
            <table class="table">
              <form action="index.php?page=updatecart" method="post">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                   
                       <?php
                      if(isset($_SESSION['cart']))
                      {
                       $total=0;
                       foreach($_SESSION['cart'] as $id=>$val)
                       {
                       	$rate=$val['quantity']*$val['price'];
                       	$total= $total + $rate;


                       ?>
                    <tr>
                      

                    	<td class="col-sm-8 col-md-6">
                       
                            <img class="img-thumbnail" src="image/<?= $val['image']; ?>" style="width: 72px; height: 72px;">
                           
                                <h4><a href="#"><?= $val['name']; ?></a></h4>
                                                 
                        </td>
                      


                        <td class="col-md-1 col-md-1 text-center"><input type="text" size ="1" name ="<?= $id; ?>" value = "<?= $val['quantity']; ?>"> 

                        	<?php
                        
                         if($rate == 0)
                        {
                        	echo "please input quantity";
                        }

                           ?></td>



                       
                        <td class="col-md-1 col-md-1 text-center"><strong>$<?= $val['price']; ?></strong></td>
                        <td class="col-md-1 col-md-1 text-center" name="total"><strong>$<?= number_format($rate); ?></strong></td>
                        <td class="col-md-1 col-md-1">
                        <a href = "index.php?page=updatecart&ID=<?= $id ?>" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove</a>
                        </td>
                  
                    </tr>
                   <?php
                    }

                   ?>
                   
                   
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>  <input type = "submit" value="calculate bills" class="btn btn-primary"> </td>
                        <td name="total_bill"><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>$<?= number_format($total,2); ?></strong></h3></td>
                    </tr>
                   
                       
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        


                        <a href="index.php?page=home" class="btn btn-default">
                             Continue Shopping
                        </a></td>
                        <td>
                       <a href="index.php?page=checkout&billtotal=<?= $total;?>"><input type="button" class="btn btn-success" name="checkout" value="check out"></a> </td>
                    </tr>
                    

                  <?php
                   }

                  ?>
                   

                </tbody>
            </form>

            </table>
        </div>
    </div>
</div>