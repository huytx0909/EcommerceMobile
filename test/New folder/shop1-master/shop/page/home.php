<?php 
$sql = "SELECT * from products where new=1";
 if($newproduct = mysqli_query($db,$sql)) {
  $product = mysqli_fetch_assoc($newproduct);
 }

 $count = mysqli_num_rows($newproduct); 

 ?>

<!-- header -->

 <div class="row products"> 
  <div class="col-md-12">
<h3 align="center" style=" padding:100px 50px;">New smartphones have come to town</h3>
<h6 align="left"> have found <?= $count ?> products </h6>

<div class="container"> 

 <div class="row"> 
<?php do { ?>
 <div class="col-md-3"> 
   <div> <img src="image/<?= $product['image']; ?>" alt="IphoneX" class="img-thumbnail"
    style="max-width: 250px; height:250px;"> 
    <h2><?= $product['name']; ?></h2> 
    <h4>price:$<?= $product['unit_price']; ?></h4>
    <a href="index.php?page=detail&ID=<?= $product['id'];?>
" class="btn btn-primary" title="Detail">Detail »</a> 
  
   </div> 
  </div> 
<?php } while($product = mysqli_fetch_assoc($newproduct)); ?>

</div>
</div> 
</div> 
 </div>

