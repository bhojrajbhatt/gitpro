<div id="contentsPage">
<h1 style="margin-bottom:-10px;">Search Details</h1>

<?php
$keyword=$_POST['keyword'];
$keyword=explode(" ",$keyword);
$arrlen=count($kwords);
$tablenames=array('groups');
$arrtbllen=count($tablenames);
$nums=0;


if(!empty($keyword)){

foreach($keyword as $ex)
{
	foreach($tablenames as $tb)
	{
		$s = "select DISTINCT * from $tb where `name` LIKE '$ex%' OR shortcontents LIKE '$ex%' OR contents like '$ex%'";
		$sql=mysql_query($s);
		$numRows= mysql_num_rows($sql);
		$nums+=$numRows;
		while($row=mysql_fetch_array($sql))
		{		
		?>
		<div style="padding:5px 0; font-size:15px;" class="listTitle"><br/><br/> 
    <?php
    if ($row['linkType'] == "Link")
		{
			echo "<a href='" . $row['contents'] . "' >";
		}
		else if ($row['linkType'] == "File")
		{
			echo "<a href='" . CMS_FILES_DIR . $row['contents'] . "' >";
		} 
		else
		{
			echo "<a href='".$row['urlname'] . "'>";
		}
		
		echo $row['name'] . "</a>";
    ?>
    </div>
    <?php if($row['linkType'] != "Link" || $row['linkType'] != "File"){ ?>
    <div style="mar" id="news"> <?= substr(strip_tags($row['shortcontents']),0,300);?><? //echo strip_tags($row['shortcontents']); ?> </div>
    <?php } ?>
    
		<?php			
	 }		
	}
}
?>

<?php
if($nums<1)
{
	echo "<br/><br/><h2> No search result found!!</h2>";
}
?>


<?php

}
else {
	echo "<h2> Please Enter the keyword for Searching !!</h2>";
}
?>
</div>