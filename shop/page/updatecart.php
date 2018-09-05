<?php 

if(isset($_GET['idproduct']) && isset($_SESSION['username']))
{
  $_SESSION['cart'][]=array("name"=>$_GET['name'],"price"=>$_GET['price'],"image"=>$_GET['image'],"idproduct"=>$_GET['idproduct'],"quantity"=>1);

}
  else if(isset($_GET['ID']))
  {
	unset($_SESSION['cart'][$_GET['ID']]);
  }
 
   if(isset($_POST))
  {
  	foreach($_POST as $id=>$val)
  	{
  		$_SESSION['cart'][$id]['quantity']=$val;
  	}
  }



header("location:index.php?page=cart");

?>
