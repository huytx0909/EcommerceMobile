<?php
 $id = $_GET['ID'];
$sql_newsdetail = "SELECT * from news where id=".$_GET['ID'];
 if($newsdetail_query = mysqli_query($db,$sql_newsdetail)) {
  $newsdetail = mysqli_fetch_assoc($newsdetail_query);
 }
 $view_add = $newsdetail['view'] + 1;
 $view_sql = "UPDATE news SET view={$view_add} WHERE id={$id}";
 $view_query = mysqli_query($db,$view_sql);
 $sql2 ="SELECT * FROM news WHERE id={$id}";
 $query2 = mysqli_query($db, $sql2);
 $view = mysqli_fetch_assoc($query2);
 ?>



<div class="content">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
	<div class="clearfix"></div>
 <div class="space50">&nbsp;</div>
<div class="space50">&nbsp;</div>
 <h2 align="center" style="font-family: Palatino;"> <strong><?= $newsdetail['title']; ?></strong></h2>
 <?php
 $newDate = date("d-m-Y H:i:s", strtotime($newsdetail['created_at']));
 ?>
 <p>By <?php echo $newsdetail['author']; ?>  |  date: <?php echo $newDate; ?> | <?php echo $view['view']; ?> views </p>
 
 <img src="image/<?= $newsdetail['image']; ?>" alt="IphoneX" class="img-thumbnail" align="center"
    style="width: 8660px; height:300px;">
  
  <div class="newsdetail"> <p align="left" style="font-family: Palatino;"><?php echo $newsdetail['content']; ?></p> </div>
</div>
</div>

<?php
$id_news = $_GET['ID'];

$sql_othernews = "SELECT * FROM news WHERE id != $id_news ORDER BY view DESC LIMIT 0, 4";
if($othernews_query = mysqli_query($db,$sql_othernews)) {
	$othernews = mysqli_fetch_assoc($othernews_query);
} 

?>


<div class="container"> 
<h2 align="left" style="padding: 50px 0px; font-family: Palatino;"> Most Viewed News </h2>

 <div class="row"> 
 
 <?php do { ?> 

  <div class="col-md-3"> 
   <div>     <a href="index.php?page=newsdetail&ID=<?= $othernews['id'];?>">
<img align="center" src="image/<?=$othernews['image'];?>" alt="" class ="img-thumbnail"  style="width: 190px; height:100px;"> 
    <h5 style="text-decoration: none;"><?= $othernews['title']; ?></h5> </a>
 
       
</div>
      <div class="space50">&nbsp;</div>

</div>
 <?php } while($othernews = mysqli_fetch_assoc($othernews_query)); ?>
</div>


 <div class="space50">&nbsp;</div>



</div>


</div>
