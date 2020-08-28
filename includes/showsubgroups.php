<div class="container">
		<div class="row">
<?php //include("includes/breadcrumb.php"); ?>

<div class="content">
		<?php
        $pagename = "index.php?id=". $pageId ."&";
        include("includes/pagination.php");
		
		?>
        
        <div class="contentHdr">
        <h2><?php echo $pageName; ?></h2></div>
        <?php $image=$groups->getById($pageId);
        $imageGet=$conn->fetchArray($image);
        if($imageGet['image']!="")
        {?>
                <img height="172" width="210" style="padding-right:8px;margin-top:4px;float:left;" src="<?=CMS_GROUPS_DIR.$imageGet['image'];?>" />
        <?php }
        echo Pagination($pageContents, "content");
        ?>

</div>
</div></div>

