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
	
$weight = $groups -> getLastWeight("Tariff", 0);

if($_GET['type'] == "edit")
{
	//echo "hello";
	$idedit=$_GET['id'];
	$result = mysql_query("select * from tariff where id='$idedit'");
	$editRow = $conn->fetchArray($result);	
	extract($editRow);
}
if($_POST['type'] == "Save")
{
	extract($_POST);
	//echo $more45;
	if($tid=="")
		$errMsg = "<li>Please Enter Id</li>";
	if($destination=="")
		$errMsg .= "<li>Please Enter Destination</li>";
	if($country=="")
		$errMsg .= "<li>Please Select Country</li>";
	if($code=="")
		$errMsg .= "<li>Please enter Code</li>"	;
	
	if($minimum=="")
		$errMsg .= "<li>Please enter Minimum</li>"	;
	if($less45=="")
		$errMsg .= "<li>Please enter Less Than 45</li>"	;
	if($more45=="")
		$errMsg .= "<li>Please enter more than 45</li>"	;
	if($hundred=="")
		$errMsg .= "<li>Please enter Hundred</li>"	;	
	if($two50=="")
		$errMsg .= "<li>Please enter Two Hundred Fifty</li>"	;	
	if($three100=="")
		$errMsg .= "<li>Please enter Three Hundred</li>"	;	
	if($five100=="")
		$errMsg .= "<li>Please enter Five Hundred</li>"	;	
	//print_r($_POST);
	if(empty($errMsg))
	{
		$pid = $groups -> saveTariff($id, $tid, $destination, $country, $code, $minimum, $less45, $more45, $hundred, $two50, $three100, $five100);
		
		header("Location: tariff.php?msg=Tariff details saved successfully");
		exit();
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
	$id=$_GET['id'];
	if(mysql_query("delete from tariff where id='$id'"))
	{
		//echo "hello";
		//header("Location : tariff.php?msg=Tariff deleted successfully.");?>
		<script> window.location='tariff.php?msg=Tariff Deleted Successfully'; </script>        
	<? }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo ADMIN_TITLE; ?></title>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {
	color: #FF0000
}
-->

.inp{ background-color: #FFFFFF;color: #000000;font-family: Verdana,Arial,Helvetica,sans-serif;font-size: 11px;height: 15px;padding-left: 2px;width: 180px;}
.star{ color:red;}

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
                      <td class="heading2">&nbsp; Manage Air Cargo Tariff
                        <div style="float: right;">
                          <?
							$addNewLink = "tariff.php";
						  ?>
                          <a href="<?= $addNewLink?>" class="headLink">Add New</a></div></td>
                    </tr>
                    <tr>
                      <td>
                      <form action="<?= $_REQUEST['uri']?>" method="post" enctype="multipart/form-data">
                      <table width="100%" border="0" cellpadding="2" cellspacing="0" class="tariff">
                          <?php if(true){ ?>
                          <tr align="left">
                            <td colspan="3" class="err_msg" style="color:red"><?php echo $errMsg; ?></td>
                          </tr>
                          <?php } ?>                          
                            <tr>
                              <td>&nbsp;</td>
                              <td><strong>Id : <span class="star">*</span></strong></td>
                              <td><input class="inp" type="text" name="tid" value="<?=$tid?>" /></td>
                            </tr>
                            
                            <tr>
                              <td>&nbsp;</td>
                              <td><strong>Destination : <span class="star">*</span></strong></td>
                              <td><input class="inp" type="text" name="destination" value="<?=$destination?>" /></td>
                            </tr>
                            
                            <tr>
                              	<td>&nbsp;</td>
                              	<td><strong> Country : <span class="star">*</span></strong></td>
                              	<td>
                              		<select name="country" class="list1">
                              			<option value="">--Select Country--</option>
                                  		<? $coun=mysql_query("select * from countries order by countryName ASC");
										while($counGet=$conn->fetchArray($coun))
										{?>
                                			<option value="<?=$counGet['countryName'];?>" <? if($country==$counGet['countryName']){?> selected="selected" <? }?>><?=$counGet['countryName'];?></option>
                                        <? }?>
                                    </select>
                            	</td>
                            </tr>                           
                            <tr>
                              <td>&nbsp;</td>
                              <td><strong> Code : <span class="star">*</span></strong></td>
                              <td><label for="title"></label>
                                <input class="inp" name="code" type="text" id="title" value="<?= $code; ?>" /></td>
                            </tr>                           
                            <tr>
                              <td>&nbsp;</td>
                              <td><strong> Minimum : <span class="star">*</span></strong></td>
                              <td>
                              	<div style="float:left"><label for="urlname"></label>
                                <input class="inp" name="minimum" type="text" id="urlname" value="<?= $minimum; ?>" /></div>
                                <div style="padding-left:10px; float:left; width:150px;" id="urlmsg">&nbsp;</div></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td><strong> < 45 : <span class="star">*</span></strong></td>
                              <td><input class="inp" name="less45" type="text" id="duration" value="<?= $less45?>" /></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td><strong> > 45 : <span class="star">*</span></strong></td>
                              <td><input class="inp" name="more45" type="text" id="altitude" value="<?= $more45?>" /></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td><strong>100 : <span class="star">*</span></strong></td>
                              <td><input class="inp" type="text" name="hundred" value="<?=$hundred?>" /></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td><strong>250 : <span class="star">*</span></strong></td>
                              <td><input class="inp" name="two50" type="text" id="groupSize" value="<?= $two50; ?>" /></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td><strong>300 : <span class="star">*</span></strong></td>
                              <td><input class="inp" name="three100" type="text" id="groupSize" value="<?= $three100; ?>" /></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td><strong>500 : <span class="star">*</span></strong></td>
                              <td><input class="inp" name="five100" type="text" id="groupSize" value="<?= $five100; ?>" /></td>
                            </tr>
                            
                            
                            <tr>
                              <td></td>
                              <td></td>
                              <td>
                              	<input name="type" type="submit" class="button" id="button" value="Save" />
                              	<?php if($_GET['type'] == "edit"){ ?>
                              	<input type="hidden" value="<?= $id?>" name="id" id="id" />
                                <?php }else{ ?>                                
                                <input name="reset" type="reset" class="button" id="button2" value="Clear" />
                                <?php } ?>
                                </td>
                            </tr>                        
                        </table>
                        </form></td>
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
                      <td class="heading2">&nbsp;Air Cargo Tariff List</td>
                    </tr>
                    <tr>
                      <td>
                      <table width="100%"  border="0" cellpadding="4" cellspacing="0">
                          <tr bgcolor="#F1F1F1" class="tahomabold11">
                            <td width="1">&nbsp;</td>
                            <td><strong>SN</strong></td>
                            <td>Destination</td>
                            <td>Country</td>
                            
                            <td>Minimum</td>
                            <td><45</td>
                            <td>>45</td>
                            <td>100</td>
                            <td>250</td>
                            <td>300</td>
                            <td>500</td>
                            <td><strong>Action</strong></td>
                          </tr>
                          <?php
							
							$sql = "SELECT * FROM tariff order by country ASC";
							//echo $sql;
							$counter=0;
							$result=mysql_query($sql);
							while($row = $conn -> fetchArray($result))
							{
													?>
                          <tr <?php if($counter%2 != 0) echo 'bgcolor="#F7F7F7"'; else echo 'bgcolor="#FFFFFF"'; ?>>
                            <td valign="top">&nbsp;</td>
                            <td valign="top"><?= ++$counter; ?></td>
                            <td valign="top"><?= $row['destination'] ?></td>
                            <td valign="top"><?=$row['country'];?></td>
                            <td valign="top"><?= $row['minimum'] ?></td>
                            <td valign="top"><?= $row['less45'] ?></td>
                            <td valign="top"><?= $row['more45'] ?></td>
                            <td valign="top"><?= $row['hundred'] ?></td>
                            <td valign="top"><?= $row['two50'] ?></td>
                            <td valign="top"><?= $row['three100'] ?></td>
                            <td valign="top"><?= $row['five100'] ?></td>
                            
                            <td valign="top"> [ <a href="tariff.php?type=edit&id=<?= $row['id']?>">Edit</a> | 
                            <a href="#" onClick="javascript: if(confirm('This will permanently remove this Tariff from database. Continue?'))
                            { document.location='tariff.php?type=del&id=<?php echo $row['id']; ?>'; }">Delete</a> ]</td>
                          </tr>
                          <?
													}
													?>
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