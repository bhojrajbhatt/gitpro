<?php
function createMenu($parentId, $groupType, $pageId)
{
	global $groups;
	global $conn;

	if ($parentId == 0)
		$groupResult = $groups->getByParentIdAndType($parentId, $groupType);	
	else
		$groupResult = $groups->getByParentId($parentId);
	
	if ($conn->numRows($groupResult) > 0)
	{
		if($parentId==0){?>
 <ul class="nav navbar-nav">
		<? }
		else {?> <ul class="dropdown-menu"> <? }?>
	<?php }
	
	while($groupRow = $conn->fetchArray($groupResult))
	{?>	
        	<li <? if($pageId==$groupRow['id'] or ($groupRow['name']=="Home" and $pageId=='') or ($groupRow['name']=="Contact Us" and $pageId==67)){?> class="active"<? }?>>
			
    			<a target="_parent" href="<?=$groupRow['urlname'];?>"><?=$groupRow['name']?></a>
			<?
			if($groupRow['linkType'] == "Normal Group")
			{
				createMenu($groupRow['id'], $groupType, $pageId);
			}
			echo "</li>\n";
	}
	if ($conn->numRows($groupResult) > 0)
		echo '</ul>';
}
?>


<?php
function createFooter($parentId, $groupType)
{
	global $groups;
	global $conn;

	$groupResult = $groups->getByParentIdAndType($parentId, $groupType);	
	
	while($groupRow = $conn->fetchArray($groupResult))
	{	
		echo '<li class="required">';
		?>
    		<a target="_parent" href="<?=$groupRow['urlname'];?>"><?=strtoupper($groupRow['name']);?></a>
		<?
		if($groupRow['linkType'] == "Normal Group")
		{
			//createMenu($groupRow['id'], $groupType);
		}
		echo "</li>\n";
	}
}
?>




<?php
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
?>