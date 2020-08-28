<?php
//error_reporting(0);
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
	$groupResult = " select * from cargo where id='".$_GET['id']."'";
	$groupRow = mysql_fetch_array(mysql_query($groupResult));

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
	$url='cargo.php?type=search';
	$searchitem=$_POST['searchid'];
	header ("Location: " . $url ."&awb=$searchitem");

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
									$addLink = "cargo.php";
									$formLink = "manage_cargo.php";
									
									if (isset($_GET['groupType']))
									{
									
									 $addLink .= "?groupType=" . $_GET['groupType'];
									 $formLink .= "?groupType=" . $_GET['groupType'];
									}
									
									if (isset($_GET['groupType']))
									{
										
									/*echo"<script>window.location='cargo.php?groupType=".$_POST['groupType']."';</script>";*/
									
									if($_GET['groupType']=='export')
									{
										echo '<a href="cargo.php?addtype=export" class="headLink" style="float:right;"> Add New Export </a>';
									}
									if($_GET['groupType']=='import'){ 
										echo'<a href="cargo.php?addtype=import" class="headLink" style="float:right;"> Add New import </a>';
									}
									}
									?> 
                                 <form action="" method="post" enctype="multipart/form-data">
                                	<table>
                                    <tr><td> Search AEB No::</td>
                                    <td>
                                	<input type="text" name="searchid" id="">
                                    <input type="submit" name="searchawb" id="searchawb" value="Go">
                                    </td>
                                    </tr>
                                    </table>
                                </form>
                                </div>
																&nbsp;Manage Cargo</td>
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
                                 
                                  
                                 
                                        <?php
										if (isset($_GET['id']))
																{
										
										 ?>
                                         &nbsp;
                                         <?php
									}
										 else if (isset($_GET['groupType'])){
											 ?>
                                              <tr>
                                    <td width="90"><strong>Type : </strong></td>
                                    <td width="742">
                                             <select name="groupType" onchange="changecargo(this);" class="list1">
                                        <option value="">Select Type</option>
                                        <option value="export" <?php if($_GET['groupType']=='export') echo 'selected'; ?>>Export</option>
                                        <option value="import" <?php if($_GET['groupType']=='import') echo 'selected'; ?>>Import</option>
                                        </select>
                                         </td>
                                         <td width="93"><span class="print" style="cursor:pointer"><a href="printlist.php?groupType=<?php echo $_GET['groupType']?>" target="_blank" style="color:#fff; font-weight:bold;"> Print</a></span></td>
                                  </tr>
                                        <?php }
										else {
											 ?>
                                          <tr>
                                     <td width="90"><strong>Type : </strong></td>
                                    <td width="742">
                                             <select name="groupType" onchange="changecargo(this);" class="list1">
                                        <option value="">Select Type</option>
                                        <option value="export">Export</option>
                                        <option value="import">Import</option>
                                        </select>
                                        </td>
                                        <td width="93"><span class="print" style="cursor:pointer"><a href="printlist.php" target="_blank" style="color:#fff; font-weight:bold;"> Print</a></span></td>
                                  </tr>
                                        <?php } ?> 
                                    
                                   
                                    
                                    
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
                                <input type="hidden" name="edittype" value="<?php echo $_GET['editType']; ?>">
                                <?php
																}
																?>
                                <table width="100%" border="0" cellspacing="0" cellpadding="2">
                                  <?php
																	if (isset($_GET['id']))
																	{
																	?>
                                   <tr>
                                    <td width="90"><strong>Type : </strong></td>
                                    <td>
                                        
                                         <select name="groupType"  class="list1">
                                        <option value="">Select Type</option>
                                         <option value="export" <?php if($_GET['editType']=='export') echo 'selected'; ?>>Export</option>
                                        <option value="import" <?php if($_GET['editType']=='import') echo 'selected'; ?>>Import</option>
                                        </select>
                                        </td>
                                    </tr>
                                  
                                  <?php
																	}
																	?>
                                  
                                  
	
	
	
									 <input type="hidden" name="addtype" 
                                     value="<?php if (isset($_GET['id'])){ echo $_GET['addtype'];}
									 			if (isset($_GET['addtype'])){ echo $_GET['addtype'];}
									  ?>">
                                  <tr>
                                    <td width="90"><strong>Sender Name : </strong></td>
                                    <td><input type="text" name="sname" value="<?php if (isset($_GET['id'])) 
									{echo $groupRow['sname']; }?>" class="text" ></td>
                                  	<td width="177" align="right"><strong>Receiver Name : </strong></td>
                                    <td width="255"><input type="text" name="rname" value="<?php if (isset($_GET['id'])) 
									echo $groupRow['rname']; ?>" class="text" ></td>
                                  
                                  </tr>
                                 
								
                                 
                                  
                                   
                                 
                                  <tr>
                                    <td><strong>AWB No : </strong></td>
                                    <td colspan="3"><input type="text" name="awbno" id="awbno" value="<?php if (isset($_GET['id'])) 
									echo $groupRow['awbno']; ?>" class="text" ></td>
                                  </tr>
                                 
                                  <tr>
                                    <td><strong>Ship date :</strong> </td>
                                    <td colspan="3"><input type="date" name="shipdate" id="shipdate"  
                                    value="<?php if (isset($_GET['id'])) echo $groupRow['shipdate']; ?>" ></td>
                                    
                                  </tr>
                                  
                                  
                                  <tr>
                                    <td></td>
                                    <td>
                                     <?php if (isset($_GET['id'])) { ?>
                                    <input type="submit" value="Save" name="editcargo" id="editcargo" class="button">
                                    <?php } else { ?>
                                    
                                     <input type="submit" value="Save" name="cargo" id="cargo" class="button">
                                    <?php } ?>
                                    
                                    </td>
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
         <?php if (!(isset($_GET['id']))) { ?>
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
        <?php } ?>
      </table></td>
  </tr>
  <tr>
    <td colspan="2"><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
