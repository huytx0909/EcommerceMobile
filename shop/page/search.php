<?php 

if(isset($_POST['search'])){
	$search=$_POST['searchtext'];
	if(empty($search)){
		header("Location:index.php");
	}

	$sql_search = "SELECT * FROM products WHERE `name` LIKE '%$search%' or `unit_price` LIKE '%$search%'";
   if(!empty($sql_search)){
   
   
    $query_search = mysqli_query($db,$sql_search);
     if($query_search= mysqli_query($db,$sql_search)){
     $count_search = mysqli_num_rows($query_search);	
     }
}

?>


<div class="row products"> 
  <div class="col-md-12">

<?php
   if($count_search == 0) {
     echo "not found";
   }  else { 

?>
      <div class="space50">&nbsp;</div>
      <div class="space50">&nbsp;</div>


<h6 align="left" style="padding:0 20px"> have found <?= $count_search ?> products </h6>
      <div class="space50">&nbsp;</div>
      <div class="space50">&nbsp;</div>

<div class="container"> 

 <div class="row"> 
<?php while($product_search = mysqli_fetch_assoc($query_search)) { ?>
 <div class="col-md-3"> 
   <div> <img src="image/<?= $product_search['image']; ?>" alt="IphoneX" class="img-thumbnail"
    style="max-width: 250px; height:250px;"> 
    <h2><?= $product_search['name']; ?></h2> 
    <h4>price:$<?= $product_search['unit_price']; ?></h4>
    <a href="index.php?page=detail&ID=<?= $product_search['id'];?>
" class="btn btn-primary" title="Detail">Detail »</a> 
  
   </div> 
  </div> 
<?php } ?>

</div>
      <div class="space50">&nbsp;</div>



<nav aria-label="Page navigation example">
  <ul class="pagination">   
  </ul>
</nav>

</div> 
<?php
}
}
?>

</div> 
 </div>

