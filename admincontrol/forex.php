<?php
include("init.php");
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}

if(isset($_POST['id']))
	$id = $_POST['id'];
elseif(isset($_GET['id']))
	$id = $_GET['id'];
else
	$id = 0;

if(isset($_POST['regionId']))
	$regionId = $_POST['regionId'];
elseif(isset($_GET['regionId']))
	$regionId = $_GET['regionId'];
else
	$regionId = 0;

if(isset($_POST['categoryId']))
	$categoryId = $_POST['categoryId'];
elseif(isset($_GET['categoryId']))
	$categoryId = $_GET['categoryId'];
else
	$categoryId = 0;
	
$weight = $groups -> getLastWeight("Package", 0);

if($_GET['type'] == "edit")
{
	$result = $groups->getById($_GET['id']);
	$editRow = $conn->fetchArray($result);	
	extract($editRow);
}

if($_POST['type'] == "Update")
{
	extract($_POST);
	
	if(empty($regionId))
		//$errMsg = "<li>Please select Region</li>";
	
	
	if(empty($errMsg))
	{	
		$onDate=date("Y-m-d");
		$dat=mysql_query("select * from forex where onDate='$onDate'");
		if(mysql_num_rows($dat)<1)
		{
			$i=1; //echo $currency2." ".$unit2." ".$below502." ".$above502." ".$tc2." ".$sp2." ".$cp2;
			$curcount=$groups->getByParentId(459);
			$count=mysql_num_rows($curcount);
			while($i<=$count)
			{
				
				$currency="currency".$i; $unit="unit".$i; $below50="below50".$i; $above50="above50".$i; $tc="tc".$i; $sp="sp".$i; $cp="cp".$i;
				$currency=$$currency; $unit=$$unit; $below50=$$below50; $above50=$$above50; $tc=$$tc; $sp=$$sp; $cp=$$cp;
				 //echo $currency; 
				 $onDate=date("Y-m-d");
				$sql="INSERT INTO forex(id,currency, unit, below50, above50, tc, sp, cp, onDate) VALUES('', '$currency', '$unit', '$below50', '$above50', '$tc', '$sp', '$cp', '$onDate')";
				mysql_query($sql);
				
				$i++;
			}
		
		}
		else
		{
			
			$i=1; //echo $currency2." ".$unit2." ".$below502." ".$above502." ".$tc2." ".$sp2." ".$cp2;
			$curcount=$groups->getByParentId(459);
			$count=mysql_num_rows($curcount);
			$dat=mysql_query("select * from forex where onDate='$onDate' order by id ASC");
			while($i<=$count and $datId=mysql_fetch_array($dat))
			{
				
				$currency="currency".$i; $unit="unit".$i; $below50="below50".$i; $above50="above50".$i; $tc="tc".$i; $sp="sp".$i; $cp="cp".$i;
				$currency=$$currency; $unit=$$unit; $below50=$$below50; $above50=$$above50; $tc=$$tc; $sp=$$sp; $cp=$$cp;
				 //echo $currency; 
				 //$onDate=date("Y-m-d");
				 $id=$datId['id'];
				$sql="UPDATE forex SET currency='$currency', unit='$unit', below50='$below50', above50='$above50', tc='$tc', sp='$sp', cp='$cp' where id='$id'";
				mysql_query($sql);
				
				$i++;
			}
			
		}
		
		//header("Location: forex1.php?regionId=".$regionId."&categoryId=".$categoryId."&msg=Forex details saved successfully");
		header("Location: forex.php?msg=Forex details updated successfully");
		//exit();
		
	}		
}

if($_GET['type'] == "toogle")
{
	if($package->toggleStatus($_GET['id']) > 0)
		header("location: package.php?region=".$_GET['region']."&category=".$_GET['category']."&msg=Package status toogled successfully.");
}

if($_GET['type'] == "toogleFeatured")
{
	$id = $_GET['id'];
	$changeTo = $_GET['changeTo'];
	
	$sql = "UPDATE groups SET featured='$changeTo' WHERE id='$id'";
	$conn->exec($sql);
	header("location: package.php?regionId=".$_GET['regionId']."&categoryId=".$_GET['categoryId']."&msg=Package feature status toogled successfully.");
	
}
	
if($_GET['type'] == "removeImage")
{
	if($groups->deleteImage($_GET['id']))
		header("location: package.php?regionId=".$_GET['regionId']."&categoryId=".$_GET['categoryId']."&type=edit&id=".$_GET['id']."&msg=Package image deleted successfull.");
}

if($_GET['type']=="del")
{
		$groups -> delete($_GET['id']);
		header("Location : package.php?regionId=".$_GET['regionId']."&categoryId=".$_GET['categoryId']."&msg=Package deleted successfully.");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo ADMIN_TITLE; ?></title>
<link href="../css/admin.css" rel="stylesheet" type="text/css">

<style>
	#forex tr td input{ width:60px;}
	#forex tr th span{ font-size:13px}
	#forex tr td{ font-size:13px; font-weight:bold}
</style>

<style type="text/css">
<!--
.style1 {
	color: #FF0000;
}
-->
</style>
<script type="text/javascript" src="../js/cms.js"></script>
<script type="text/javascript" src="../js/jquery.min.js"></script>
</head>
<body>
<table width="<?php echo ADMIN_PAGE_WIDTH; ?>" border="0" align="center" cellpadding="0"
	cellspacing="5" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td width="<?php echo ADMIN_LEFT_WIDTH; ?>" valign="top"><?php include("leftnav.php"); ?></td>
    <td width="<?php echo ADMIN_BODY_WIDTH; ?>" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#fff"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="heading2">&nbsp; Manage Forex Rate
                        <?php /*?><div style="float: right;">
                          <?
														$addNewLink = "package.php";
													if(isset($_GET['category']) && !empty($_GET['category']))
														$addNewLink .= "?category=".$_GET['category'];
													?>
                          <a href="<?= $addNewLink?>" class="headLink">Add New</a></div><?php */?></td>
                    </tr>
                    <tr>
                      <td>
                      <form action="<?= $_REQUEST['uri']?>" method="post" enctype="multipart/form-data">
                      
                      <table width="100%" border="0" cellpadding="2" cellspacing="0" id="forex">
                      
                      	<?php if(!empty($errMsg))
						{ ?>
                        	<tr align="left">
                            	<td colspan="3" class="err_msg"><?php echo $errMsg; ?></td>
                          	</tr>
                     	<?php } ?>                          
    
                        <tr>
                            <th width="64" valign="middle" align="center" style="border-bottom:1px #ccc solid;border-top:1px #ccc solid;border-left:1px #ccc solid;" rowspan="3">
                                <span class="rounded-foot-right">Currency</span>
                            </th>
                            <th width="69" valign="middle" align="center" style="border-bottom:1px #ccc solid;border-top:1px #ccc solid;border-left:1px #ccc solid;" rowspan="3">
                                <span class="rounded-foot-right">Unit</span>
                            </th>
                            <th valign="middle" height="29" align="center" style="border-bottom:1px #ccc solid;border-top:1px #ccc solid;border-left:1px #ccc solid;" colspan="3">
                                <span class="rounded-foot-right">Buying Rate (NPR)</span>
                            </th>
                            <th width="94" valign="middle" align="center" rowspan="3" style="border-left:1px #ccc solid;border-bottom:1px #ccc solid;border-top: 1px #ccc solid;">
                                <span class="rounded-foot-right">Selling Rate (NPR) </span>
                            </th>
                            <th width="105" valign="middle" align="center" rowspan="3" style="border-left:1px #ccc solid;border-bottom:1px #ccc solid;border-top:1px #ccc solid;                            border-right:1px #ccc solid;">
                                <span class="rounded-foot-right">Cross Rate (Buying)</span>
                            </th>
                        </tr>
            
                        <tr>
                            <th valign="middle" height="29" align="center" style="border-bottom:1px #ccc border-top: 1px #ccc solid;border-bottom:1px #ccc solid;
                            border-left:1px #ccc solid;" colspan="2"><span class="rounded-foot-right ">Cash</span>
                            </th>
                            <th width="83" valign="middle" align="center" rowspan="2" style="border-left:1px #ccc solid;border-bottom:1px #ccc solid;border-left:1px #ccc solid;">
                                <span class="rounded-foot-right">TC &amp; Others</span>
                            </th>
                        </tr>
            
                        <tr>
                            <th width="123" valign="middle" height="29" align="center" style="border-bottom:1px #ccc solid; border-left:1px #ccc solid;">
                                <span class="rounded-foot-right">Below  Deno 50*</span>
                            </th>
                            <th width="136" valign="middle" align="center" style="border-bottom:1px #ccc solid; border-left:1px #ccc solid;">
                                <span class="rounded-foot-right">Deno  50 &amp; Above</span>
                            </th>
                        </tr>
                        
						<? $cur=$groups->getByParentId(459); $i=1; $onDate=date("Y-m-d"); $j=1;
						$sqlis = mysql_query("select * from forex where onDate='$onDate' order by id ASC");
						while(mysql_num_rows($sqlis)<1)
						{
							//$y=date("Y"); $m=date("m");$d=date("d")-$j;
							$dd=date("Y-m-d",strtotime("-$j days"));
							$sqlis=mysql_query("select * from forex where onDate='$dd' order by id ASC");	
							$j++;
						}
                        while($curGet=$conn->fetchArray($cur))
                        {?>
                        	<? $sqlisGet=mysql_fetch_array($sqlis); ?>
                            <tr>
                              	<td valign="top" height="26" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$curGet['name'];?></td>
                              	<input type="hidden" name="currency<?=$i;?>" value="<?=$curGet['name'];?>" />
                              	<td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;">
                           			<input type="text" name="unit<?=$i;?>" value="<?=$sqlisGet['unit'];?>" />
                           	  	</td>
                              	<td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;">
                              		<input type="text" name="below50<?=$i;?>" value="<?=$sqlisGet['below50'];?>" />
                              	</td>
                              	<td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;">
                                	<input type="text" name="above50<?=$i;?>" value="<?=$sqlisGet['above50'];?>" />
                              	</td>
                              	<td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;">
                               		<input type="text" name="tc<?=$i;?>" value="<?=$sqlisGet['tc'];?>" />
                             	</td>
                              	<td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;">
                               		<input type="text" name="sp<?=$i;?>" value="<?=$sqlisGet['sp'];?>" />
                              	</td>
                              	<td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;">
                                	<input type="text" name="cp<?=$i;?>" value="<?=$sqlisGet['cp'];?>" />
                             	</td>
                            </tr>
                        
                        <? $i++; }?>
                        
                        <tr>
                           	<td></td>
                           	
                         	<td>
                              	<input name="type" type="submit" class="button" id="button" value="Update" style="height: 23px;margin: 8px 0 4px -30px;width: 65px;" />
                              	                         
                              	<!--<input name="reset" type="reset" class="button" id="button2" value="Clear" />-->
                                
                           	</td>
                     	</tr>                        
        
					</table>
                    
             		  </form>
                      </td>
         			</tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr height="5"><td></td></tr>
        <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td class="heading2">
                        &nbsp;Current Forex Rate ( 
                      	<? $sqlis = mysql_query("select * from forex where onDate='$onDate' order by id ASC"); $j=1; $y=date("Y"); $m=date("m");$d=date("d");
                        while(mysql_num_rows($sqlis)<1)
						{
							
							//$y=date("Y"); $m=date("m");$d=date("d")-$j;
							//$datec=$y."-".$m."-".$d;;
							$dd=date("Y-m-d",strtotime("-$j days"));
							$sqlis = mysql_query("select * from forex where onDate='$dd' order by id ASC");
							$j++;
							//echo $y."-".$m."-".$d;	
						}
						$j=$j-1;
						$dd=date("Y-m-d",strtotime("-$j days"));
						//$datec=$y."-".$m."-".$d;
						if(date("Y-m-d")==$dd)
						{
							echo date("Y-m-d"); 
						}
						else
						{
							echo $dd;
						}?>
                         )
                      </td>
                    </tr>
                    <tr>
                      <td>
                      
                      
                      <table width="100%" border="0" cellpadding="2" cellspacing="0" id="forex">
                      
                      	                       
    
                        <tr>
                            <th width="64" valign="middle" align="center" style="border-bottom:1px #ccc solid;border-top:1px #ccc solid;border-left:1px #ccc solid;" rowspan="3">
                                <span class="rounded-foot-right">Currency</span>
                            </th>
                            <th width="69" valign="middle" align="center" style="border-bottom:1px #ccc solid;border-top:1px #ccc solid;border-left:1px #ccc solid;" rowspan="3">
                                <span class="rounded-foot-right">Unit</span>
                            </th>
                            <th valign="middle" height="29" align="center" style="border-bottom:1px #ccc solid;border-top:1px #ccc solid;border-left:1px #ccc solid;" colspan="3">
                                <span class="rounded-foot-right">Buying Rate (NPR)</span>
                            </th>
                            <th width="94" valign="middle" align="center" rowspan="3" style="border-left:1px #ccc solid;border-bottom:1px #ccc solid;border-top: 1px #ccc solid;">
                                <span class="rounded-foot-right">Selling Rate (NPR) </span>
                            </th>
                            <th width="105" valign="middle" align="center" rowspan="3" style="border-left:1px #ccc solid;border-bottom:1px #ccc solid;border-top:1px #ccc solid;                            border-right:1px #ccc solid;">
                                <span class="rounded-foot-right">Cross Rate (Buying)</span>
                            </th>
                        </tr>
            
                        <tr>
                            <th valign="middle" height="29" align="center" style="border-bottom:1px #ccc border-top: 1px #ccc solid;border-bottom:1px #ccc solid;
                            border-left:1px #ccc solid;" colspan="2"><span class="rounded-foot-right ">Cash</span>
                            </th>
                            <th width="83" valign="middle" align="center" rowspan="2" style="border-left:1px #ccc solid;border-bottom:1px #ccc solid;border-left:1px #ccc solid;">
                                <span class="rounded-foot-right">TC &amp; Others</span>
                            </th>
                        </tr>
            
                        <tr>
                            <th width="123" valign="middle" height="29" align="center" style="border-bottom:1px #ccc solid; border-left:1px #ccc solid;">
                                <span class="rounded-foot-right">Below  Deno 50*</span>
                            </th>
                            <th width="136" valign="middle" align="center" style="border-bottom:1px #ccc solid; border-left:1px #ccc solid;">
                                <span class="rounded-foot-right">Deno  50 &amp; Above</span>
                            </th>
                        </tr>
  						
						<? $onDate=date("Y-m-d"); ?>
                        <? $sqlis = mysql_query("select * from forex where onDate='$onDate' order by id ASC"); $j=1;
                        while(mysql_num_rows($sqlis)<1)
						{
							//$y=date("Y"); $m=date("m");$d=date("d")-$j;
							$dd=date("Y-m-d",strtotime("-$j days"));
							$sqlis=mysql_query("select * from forex where onDate='$dd' order by id ASC");
							$j++;	
						}
						//$data=mysql_query($sqlis); 
                        while($dataGet=mysql_fetch_array($sqlis))
                        {?>
                        
                            <tr>
                              <td valign="top" height="26" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$dataGet['currency'];?></td>
                              
                              <td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$dataGet['unit'];?></td>
                              <td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$dataGet['below50'];?></td>
                              <td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$dataGet['above50'];?></td>
                              <td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$dataGet['tc'];?></td>
                              <td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$dataGet['sp'];?></td>
                              <td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$dataGet['cp'];?></td>
                            </tr>
                        
                        <? $i++; }?>
                        
                                                
        
					</table>
                      
                      
                      <?php include("paging_show.php"); ?></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td colspan="2"><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>




