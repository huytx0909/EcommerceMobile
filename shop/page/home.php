<?php 
 //pagination

if(isset($_GET['paginate'])){
  $get_paginate = $_GET['paginate'];
} else {
  $get_paginate='';
}
if($get_paginate == '' || $get_paginate == 1){
  $paginate1 = 0;
} else {
  $paginate1 = ($get_paginate*4) - 4;
}



$sql = "SELECT * from products ORDER BY created_at DESC limit $paginate1, 4";
 if($newproduct = mysqli_query($db,$sql)) {
  $product = mysqli_fetch_assoc($newproduct);
 }

 $paginate_sql = "SELECT * from products ORDER BY created_at DESC";
 $paginate_newproduct = mysqli_query($db,$paginate_sql); 
 $count = mysqli_num_rows($paginate_newproduct); 

 ?>

<!-- header -->

 <div class="row products"> 
  <div class="col-md-12">
<h3 align="center" style=" padding:100px 50px;"><strong>New smartphones have come to town </strong></h3>
<h6 align="left" style="padding:0 20px"> have found <?= $count ?> products </h6>

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
      <div class="space50">&nbsp;</div>



<nav aria-label="Page navigation example">
  <ul class="pagination">
<?php

 $paginate = ceil($count / 4);
 for ($a=1; $a <= $paginate; $a++){
?>
    <li class="page-item"><a class="page-link" href="index.php?page=home&paginate=<?php echo $a ;?>"><?php echo $a;?></a></li>
<?php
}
?>    
  </ul>
</nav>

</div> 
</div> 
 </div>


