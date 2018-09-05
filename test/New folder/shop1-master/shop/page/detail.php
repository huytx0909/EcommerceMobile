<?php 

$productdetail_sql = "SELECT *,products.id AS id_product,products.name AS proname, products.description AS des,type_products.name AS brandname FROM products JOIN type_products ON products.id_type = type_products.id WHERE products.id=".$_GET['ID'];
$productguaranteed_sql = "SELECT *,guaranteed.description AS guarantee FROM products JOIN guaranteed ON products.id_guaranteed = guaranteed.id WHERE products.id=".$_GET['ID'];

if($productguaranteed_query = mysqli_query($db,$productguaranteed_sql)){
 $productguaranteed = mysqli_fetch_assoc($productguaranteed_query); 
}


if($productdetail_query = mysqli_query($db,$productdetail_sql)){
 $productdetail = mysqli_fetch_assoc($productdetail_query); 
}
?>

<div class="inner-header">
		<div class="container">
			
			<div class="pull-right">
				<div class="beta-breadcrumb font-large" align="right">
					<a href="index.php">Home</a> / <span>Product</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

		<div id="content">
			<div class="row">
				<div class="col-md-12">
			
					<div class="row">
						<div class="col-md-3" align="center">
							<img src="image/<?= $productdetail['image']; ?>" alt="" 	style="max-width: 250px; height:250px;">
						</div>
						<div class="col-md-4" >
							<form method="post" action="index.php?page=updatecart&name=<?= $productdetail['proname'];?>&price=<?= $productdetail['unit_price'];?>&image=<?=$productdetail['image'];?>">

							<div class="single-item-body" align="center">
								<p class="single-item-title"><h2> <?= $productdetail['proname']; ?> </h2></p></div>
								 <dl class="dl-horizontal"> 

                                  <dt>Price:</dt> 
                                  <dd> $<?= $productdetail['unit_price']; ?></dd> 
                                  <dt>Condition:</dt> 
                                  <dd><?= $productdetail['condition']; ?></dd> 
                                  <dt>Brand: </dt> 
                                  <dd><?= $productdetail['brandname']; ?></dd> 
                                   <dt>Guaranteed: </dt> 
                                  <dd> <?= $productguaranteed['guarantee']; ?> </dd>
                                  
                                      <dt>Descrption: <?= $productdetail['des']; ?></dt> 
                                  <dd></dd> 
                                  </dl>
                                 
                                 <div class ="col-md-4">
                                 </div>

                                 <a href="index.php?page=updatecart&name=<?= $productdetail['proname'];?>&price=<?= $productdetail['unit_price'];?>&image=<?=$productdetail['image'];?>&idproduct=<?= $productdetail['id_product'];?>" class="btn btn-danger" title="cart">add to cart</a> 
                              
                                  	</form>
                                  	</div>                               
					
							</div>

							<div class="space20">&nbsp;</div>

						
							
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					
							</div>
						</div>
				
