

<div id=content class="space-top-none">
      <div class="space50">&nbsp;</div>


    <div class="row">
    

     <div class="col-md-5" align="center">

                <p><strong><h3>YOU HAVE ORDERED SUCCESSFULLY!</h3></strong></p>
                <p><strong>your purchases will arrive within 5 days</strong></p>
                <p>if you have any problems, please <a href="index.php?page=contact">contact</a> us.</p>
             
  </div>

  


 <div class="col-md-1"></div>

 
             <div class="col-md-6" align="center">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading"><h3><strong>
                            Review Order</strong></h3> <div class="pull-right"><small><a class="afix-1" href="index.php?page=home">continue to shopping</a></small></div>
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
                                    <img src="image/<?= $val['image']; ?>" alt=""   style="max-width: 30px; height:30px;"/>
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

                        
        </div>
        </div>
        <?php
            }
       
        ?>
      
        </div>       
        </div>
           



