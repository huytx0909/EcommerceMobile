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
  $paginate1 = ($get_paginate*10) - 10;
}



$sql_news = "SELECT * from news ORDER BY created_at DESC limit $paginate1, 10";
 if($news_query = mysqli_query($db,$sql_news)) {
  $news = mysqli_fetch_assoc($news_query);
 }

 $paginate_sql = "SELECT * from news";
 $paginate_newproduct = mysqli_query($db,$paginate_sql); 
 $count = mysqli_num_rows($paginate_newproduct); 

 ?>

<!-- header -->

 <div class="row"> 
     
  <div class="col-md-12">
<h1 style="font-family: Palatino; color: #7f7f7f;" align="center"> Latest News </h1>
<div class="container"> 
<div class="space50">&nbsp;</div>
<div class="space50">&nbsp;</div>
<div class="space50">&nbsp;</div>
 <div class="row"> 
<?php do { ?>

  <div class="col-md-3">

   <a href="index.php?page=newsdetail&ID=<?=$news['id'];?>" class=thumbnail" display="block"> <img src="image/<?= $news['image']; ?>" alt="IphoneX" class="img-thumbnail"
    style="width: 450px; height:150px;"> </a>
        <div class="space50">&nbsp;</div>
      <div class="space50">&nbsp;</div>
      <div class="space50">&nbsp;</div>

  </div>
  <div class="col-md-8">  
    <a href="index.php?page=newsdetail&ID=<?=$news['id'];?>" class="thumbnail" style="text-decoration: none;"><h2 style="font-family: Palatino;"><strong><?= $news['title']; ?></strong></h2></a>
    <p style="font-family: Palatino;"><?= substr($news['content'],0,300); ?>...</p>

  <?php
 $newDate = date("d-m-Y", strtotime($news['created_at']));
   ?>
   <small style="color:#7f7f7f;"> <?= $newDate; ?> </small>
      <div class="space50">&nbsp;</div>
 
</div>
      

<?php } while($news = mysqli_fetch_assoc($news_query)); ?>
</div>

</div>
      <div class="space50">&nbsp;</div>


<nav aria-label="Page navigation example">
  <ul class="pagination">
<?php

 $paginate = ceil($count / 10);
 for ($a=1; $a <= $paginate; $a++){
?>
    <li class="page-item" align="center"><a class="page-link" href="index.php?page=news&paginate=<?php echo $a ;?>"><?php echo $a;?></a></li>
<?php
}
?>    
  </ul>
</nav>
</div>
</div>






              
