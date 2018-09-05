<?php 


//select all products belonging to type_products
$product_sql = "SELECT products.id, products.name, products.unit_price, products.image, type_products.name AS brandname, type_products.id AS brandid FROM products JOIN type_products ON products.id_type = type_products.id WHERE products.id_type=".$_GET['IDtype'];
if($product_query = mysqli_query($db,$product_sql)){
 $productbrand = mysqli_fetch_assoc($product_query); 
}

$count2= mysqli_num_rows($product_query);

if($count2==0){
  echo "sorry, we have no items currently in stock";
} else {

?>

 <div class="row products"> 
  <div class="col-md-12">
<h2 align="center"> <?= $productbrand['brandname']; ?> Smartphone </h2>
<h6 align="left" style=" padding: 0px 20px;"> have found <?= $count2; ?> products </h6>
<div class="container"> 
 
 <div class="row"> 
 <?php do { ?> 
  <div class="col-md-3"> 
   <div> <img src="image/<?= $productbrand['image']; ?>" alt=""class ="img-thumbnail"  style="max-width: 250px; height:250px;"> 
    <h2><?= $productbrand['name']; ?></h2> 
    <h4>price:$<?= $productbrand['unit_price']; ?></h4>
 
    <a href="index.php?page=detail&ID=<?= $productbrand['id'];?>" class="btn btn-primary" title="Chi tiết">Detail »</a> 
     

   </div> 
         <div class="space50">&nbsp;</div>

  </div> 
  <?php } while($productbrand = mysqli_fetch_assoc($product_query)); } ?>

 </div>
      <div class="space50">&nbsp;</div>

</div> 

<?php
$idtype =$_GET['IDtype'];


$other_sql = "SELECT products.id, products.name, products.unit_price, products.image, type_products.name AS brandname, type_products.id AS brandid FROM products JOIN type_products ON products.id_type = type_products.id WHERE products.id_type !=$idtype";
   $other_query = mysqli_query($db,$other_sql);
   $count4 = mysqli_num_rows($other_query);
   $random_start = mt_rand(0, $count4 - 1);



$otherproduct_sql = "SELECT products.id, products.name, products.unit_price, products.image, type_products.name AS brandname, type_products.id AS brandid FROM products JOIN type_products ON products.id_type = type_products.id WHERE products.id_type !=$idtype LIMIT $random_start, 8";

if($otherproduct_query = mysqli_query($db,$otherproduct_sql)){
 $otherproductbrand = mysqli_fetch_assoc($otherproduct_query); 
}




$count3= mysqli_num_rows($product_query);

if($count3==0){
  echo "sorry, we have no items currently in stock";
} else {

?>

<h2 align="left" style="padding: 50px 0px;"> Other products </h2>

<div class="container"> 
 <div class="row"> 
 
 <?php do { ?> 

  <div class="col-md-3"> 
   <div> <img src="image/<?= $otherproductbrand['image']; ?>" alt="" class ="img-thumbnail"  style="max-width: 180px; height:180px;"> 
    <h2><?= $otherproductbrand['name']; ?></h2> 
    <h4>price:$<?= $otherproductbrand['unit_price']; ?></h4>
 
    <a href="index.php?page=detail&ID=<?= $otherproductbrand['id'];?>" class="btn btn-primary" title="detail">Detail »</a> 
       
</div>
      <div class="space50">&nbsp;</div>

</div>
 <?php } while($otherproductbrand = mysqli_fetch_assoc($otherproduct_query)); } ?>
</div>


 <div class="space50">&nbsp;</div>



</div>

</div>
</div>
