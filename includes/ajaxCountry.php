<?php
$txt=$_GET['txt'];
//echo $txt; die();
mysql_connect("localhost", "root", "");
mysql_select_db("rcargo");
//$sql="select * from tbl_activity where title like '$txt%'";
//$result=mysql_query($sql);
?>


<select name="" style="width:105px;" onchange="ajaxCode(this.value)">
    <option value="">Select Code</option>
	<? $code="select * from tariff";
	if($txt!="")
		$code=$code." where country='$txt'";
	$code=$code." order by id";
	//echo $code;
    $codeq=mysql_query($code);
    while($codeGet=mysql_fetch_array($codeq))
    {?>
        <option value="<?=$codeGet['code'];?>"><?=$codeGet['code'];?></option>
    <? }?>
</select>
<span id="airport">
	<input type="text" name="airport" value="<? //$codeGet=mysql_fetch_array($codeq); echo $codeGet['code']; ?>" style="border: none; width:110px" />
</span>