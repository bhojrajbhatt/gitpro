<div class="container">
		<div class="row">
<?php include("includes/breadcrumb.php"); ?>

<div style="margin-left:10px;" class="contentHdr">
<h2><?php echo $pageName; ?></h2></div>
<div class="content" style="margin-left:20px; width:95%;">
	<?php
	$pagename = "index.php?linkId=". $pageId ."&";
	
	$sql = "SELECT * FROM groups WHERE parentId = '$pageId' ORDER BY id DESC";
	
	$newsql = $sql;

	$limit = LISTING_LIMIT;
	
	include("includes/pagination.php");
	$return = Pagination($sql, "");
	
	$arr = explode(" -- ", $return);

	$start = $arr[0];
	$pagelist = $arr[1];
	$count = $arr[2];
	
	$newsql .= " LIMIT $start, 50";
	
	$result = mysql_query($newsql);
	
	while ($listRow = $conn->fetchArray($result))
	{
	?>
		<div class="listRow" style="margin-bottom:25px;">
		  <? if(file_exists(CMS_GROUPS_DIR . $listRow['image']) && !empty($listRow['image'])){?>
          <div style="float: left; padding:10px;"> <a href="<?= $listRow['urlname'] ?>"><img src="<?=CMS_GROUPS_DIR . $listRow['image'];?>" alt="<?php echo $listRow['title']; ?>" style="border:0" /></a></div>
          <? } ?>
          <div>
            <div>
              <div class="newsList">
              		<a style="font-size:15px; color:#FFC724; font-weight:bold;" href="<?php echo $listRow['urlname']; ?>">
						<?php echo $listRow['name']; ?>
                   	</a>
             	</div>
              <?php echo $listRow['shortcontents']; ?>
              <a href="<?=$listRow['urlname'];?>" style="float:right; color:#FFC724;"></a>
        	</div>
          </div>
        </div>
		<div style="clear:both;"></div>
	<? }
	if($count > $limit)
	//echo $pagelist;
	?>
</div>
</div>
</div>