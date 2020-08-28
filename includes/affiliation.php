<?php //include("includes/breadcrumb.php"); ?>

<div class="content">
		
        <div class="contentHdr">
        <h2>Affiliation</h2></div>
        <? $affiliate=$groups->getByParentId(AFFILIATION);
		while($affiliateGet=$conn->fetchArray($affiliate))
		{?>
			<div style="float:left; width:300px; height:100px; margin-right:10px; margin-bottom:5px;">
            	<div style="float:left; width:100px; margin-right:10px;">
                	<a href="<?=$affiliateGet['contents'];?>"><img width="100" height="100" src="<?=CMS_GROUPS_DIR.$affiliateGet['image'];?>" /></a>
              	</div>
                <div style="float:right; width:150px;"><a href="<?=$affiliateGet['contents'];?>"><?=$affiliateGet['name'];?></a></div>
          	</div>
		<? }?>
        <div style="clear:both"></div>

</div>

