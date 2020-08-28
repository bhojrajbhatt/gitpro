<?php
$txt=$_GET['txt'];
//echo $txt; die();
mysql_connect("localhost", "root", "");
mysql_select_db("rcargo");
//$sql="select * from tbl_activity where title like '$txt%'";
//$result=mysql_query($sql);
?>

<input type="text" name="airport" value="<?=$txt;?>" style="border: none; width:110px" />