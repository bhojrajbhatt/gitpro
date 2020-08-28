<?php
error_reporting(0);
include("init.php");
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}

$showSaveForm = false;
$showListing = false;

if (isset($_GET['id']))
{
	$groupResult = $groups->getById($_GET['id']);
	$groupRow = $conn->fetchArray($groupResult);

	$selectedGroupType = $groupRow['type'];

	$showSaveForm = true;
	$showListing = true;
}
if (isset($_GET['addtype']))
{
	$selectedGroupType = $_GET['addtype'];
	$showSaveForm = true;
	$showListing = true;
}
if(isset($_POST['searchawb']))
{ 
	$url='location.php?type=search';
	$searchitem=$_POST['searchid'];
	header ("Location: " . $url ."&location=$searchitem");

}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?php echo ADMIN_TITLE; ?> :: <?php echo PAGE_TITLE; ?></title>
<link href="../css/admin.css" rel="stylesheet" type="text/css">
<script language="javascript" src="../js/cms.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
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
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                          <tr>
                            <td class="heading2">
                              <div style="float: right;">
                                <?php
									$addLink = "location.php";
									$formLink = "manage_location.php";
									
									if (isset($_GET['location']))
									{
									
									 $addLink .= "?location=" . $_GET['location'];
									 $formLink .= "?location=" . $_GET['location'];
									}
									if (isset($_POST['groupType']))
									{
										
									/*echo"<script>window.location='cargo.php?groupType=".$_POST['groupType']."';</script>";*/
									
									}
									?>
                                <a href="cargo.php?addtype=country" class="headLink"> Add New country </a>  ||
                                 <a href="cargo.php?addtype=city" class="headLink"> Add New city </a> 
                                 <form action="" method="post" enctype="multipart/form-data">
                                	<table>
                                    <tr><td> Search Location::</td>
                                    <td>
                                	<input type="text" name="searchid" id="">
                                    <input type="submit" name="searchawb" id="searchawb" value="Go">
                                    </td></tr>
                                    </table>
                                </form>
                                </div>
																&nbsp;Manage Location</td>
                          </tr>
                          <tr>
                         
                            <td><?php
															if (isset($_GET['msg']))
															{
															 //echo $msg;
															}
															
															if ((!(isset($_GET['addtype']))) && (!(isset($_GET['type']))))
									{
										?>
                              <form action="cargo.php" method="get">
                                <table border="0" width="100%" cellpadding="2" cellspacing="0">
                                 
                                  
                                  <tr>
                                    <td width="90"><strong>Type : </strong></td>
                                    <td><select name="groupType" onchange="changecargo(this);" class="list1">
                                        <option value="">Select Type</option>
                                        
                                        <option value="country" <?php if($_GET['location']=='country') echo 'selected'; ?>>Export</option>
                                        <option value="city" <?php if($_GET['location']=='city') echo 'selected'; ?>>Import</option>
                                        
                                    </select>
                                   
                                    
                                    </td>
                                  </tr>
                                </table>
                              </form>
                              <?php } ?>
                              </td>
                          </tr>
                          <?php
													if ($showSaveForm)
													{
													 ?>
                          <tr>
                            <td><form action="<?php echo $formLink; ?>" method="post" enctype="multipart/form-data">
                                <?php
																if (isset($_GET['id']))
																{
																?>
                                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                <input type="hidden" name="addtype" value="<?php echo $_GET['addtype']; ?>">
                                <?php
																}
																?>
                                <table width="100%" border="0" cellspacing="0" cellpadding="2">
                                  <?php
																	if (isset($_GET['id']))
																	{
																	?>
                                  <tr>
                                    <td><strong>Created On : </strong></td>
                                    <td width="422">
																		<?php
																		$arr = explode("-", $groupRow['onDate']);
																		echo date("M d, Y", mktime(0, 0, 0, $arr[1], $arr[2], $arr[0]));
																		?>																		</td>
                                  </tr>
                                  <?php
																	}
																	?>
                                  
                                  
	
	
	
									 <input type="hidden" name="addtype" value="<?php echo $_GET['addtype']; ?>">
                                  <tr>
                                    <td width="90"><strong>Name : </strong></td>
                                    <td colspan="3"><input type="text" name="sname" value="<?php echo $groupRow['sname']; ?>" class="text" ></td>
                                  	
                                  
                                  </tr>
								<tr>
                                    <td><strong>Code :</strong> </td>
                                    <td colspan="3"><input type="text" name="saddress" id="saddress"  class="text" ></td>
                                    
                                  </tr>
                                  <?php 
								  if ($_GET['addtype']=='city'){
								  ?>
                                  <tr>
                                    <td><strong>Country</strong> </td>
                                    <td colspan="3"><input type="text" name="scity" id="scity"  class="text" ></td>
                                    
                                  </tr>
                                  <?php } ?>
                                  <tr>
                                    <td><strong>Pnone No :</strong> </td>
                                    <td><input type="text" name="sphone" id="sphone"  class="text" ></td>
                                    <td align="right"><strong>Pnone No :</strong> </td>
                                    <td><input type="text" name="rphone" id="rphone"  class="text" ></td>
                                  </tr>
                                   <tr>
                                    <td><strong>Country :</strong> </td>
                                    <td><?php include('country.php');?></td>
                                    <td align="right"><strong>Country :</strong> </td>
                                    <td><?php include('country1.php'); ?></td>
                                  </tr>
                                 
                                  <tr>
                                    <td><strong>AWB No : </strong></td>
                                    <td colspan="3"><input type="text" name="awbno" id="awbno"  class="text" ></td>
                                  </tr>
                                  <tr>
                                    <td><strong>Transportation Type : </strong></td>
                                    <td colspan="3"><input type="text" name="trtype" id="trtype"  class="text" ></td>
                                  </tr>
                                  <tr>
                                    <td><strong>Transportation Medium : </strong></td>
                                    <td colspan="3"><input type="text" name="trmedium" id="trmedium"  class="text" ></td>
                                  </tr>
                                  <tr>
                                    <td><strong>Ship date :</strong> </td>
                                    <td colspan="3"><input type="date" name="shipdate" id="shipdate"  ></td>
                                    
                                  </tr>
                                   <tr>
                                    <td><strong>Shipper Ref :</strong> </td>
                                    <td><input type="text" name="shipperref" id="shipperref"  class="text" ></td>
                                    <td align="right"><strong>CNEE Ref :</strong> </td>
                                    <td><input type="text" name="cneeref" id="cneeref"  class="text" ></td>
                                  </tr>
                                  <tr>
                                    <td><strong>Gross WT :</strong> </td>
                                    <td><input type="text" name="grosswt" id="grosswt"  class="text" ></td>
                                    <td align="right"><strong>Volume WT :</strong> </td>
                                    <td><input type="text" name="volumewt" id="volumewt"  class="text" ></td>
                                  </tr>
                                  
                                  <tr>
                                    <td colspan="2"><strong>COntent And Quantity</strong> </td>
                                    <td align="right" colspan="2"><div align="right" style="cursor: pointer;" onclick="addcontent();">+ Add Item +</div></td>
                                    
                                    
                                  </tr>
                                  <tr>
                                    <td colspan="4">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" id="uploaditem" class="uploaditem">
                                    	<tr bgcolor="#CCCCCC">
                                        	<th width="5%" rowspan="2">&nbsp; </th>
                                        	<th width="48%" rowspan="2"> Item Name</th>
                                            <th colspan="3"> Dimension</th>
                                            <th width="10%" rowspan="2"> Quamtity</th>
                                        </tr>
                                    	<tr  bgcolor="#CCCCCC">
                                        	<th width="13%"> Width</th>
                                            <th width="14%"> Height</th>
                                            <th width="10%"> Breadth</th>
                                        </tr>
                                        
                                        <tr>
                                        	<td>&nbsp;</td>
                                        	<td><input type="text" name="itemname[]"  class="text"/></td>
                                        	<td><input type="text" name="itemwidth[]"  size="10" /></td>
                                            <td><input type="text" name="itemhight[]"  size="10"/></td>
                                            <td><input type="text" name="itembdh[]"  size="10"/></td>
                                            <td><input type="text" name="itemqty[]"  size="10"/></td>
                                        
                                        </tr>
                                    </table>
                                  </td>
                                  </tr>
                                  
                                  <tr>
                                    <td></td>
                                    <td><input type="submit" value="Save" name="cargo" id="cargo" class="button"></td>
                                  </tr>
                                </table>
                              </form></td>
                          </tr>
                          <?php
													}
													if ($showListing)
													{
													 ?>
                          <?php
													}
													?>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td height="5"></td>
        </tr>
        <tr>
          <td class="bgborder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td valign="top"><?php
											$pagename = "cargo.php";
											$withEdit = true;
											$withDelete = true;
											$withOpen = true;
											//selectedGroupType will be used inside groupListing.php
											$parentId = 0;
											if (isset($_GET['parentId']))
											$parentId = $_GET['parentId'];
											include("cargolisting.php");
											?>
                                            
                                            
                                            
                      </td>
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
