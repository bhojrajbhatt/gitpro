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
                               
                                
                                	<form action="" method="post" enctype="multipart/form-data">
                                	<table>
                                    <tr><td> Search AEB No:</td>
                                    <td>
                                	<input type="text" name="searchid" id="">
                                    <input type="submit" name="searchawb" id="searchawb" value="Go">
                                    </td></tr>
                                    </table>
                                
                                </form>
                               <?php 
							   $getcargo=mysql_query("select * from cargo where id='".$_GET['id']."' ");
									$groupRows=mysql_fetch_array($getcargo);
							   ?>
                                </div>
																&nbsp;Manage Cargo</td>
                          </tr>
                          
                          <?php
													if ($showSaveForm)
													{
													 ?>
                          <tr>
                            <td>
                                <?php
																if (isset($_GET['id']))
																{
																?>
                                
                                <?php
																}
																?>
                                <table width="100%" border="0" cellspacing="0" cellpadding="2">
                                 <tr>
                                    <td><strong>AWB No : </strong></td>
                                    <td > <strong style=" font-size:16px"> <?php echo $groupRows['awbno']; ?></strong> </td>
                                    <td>&nbsp;</td>
                                    
                                  </tr>
																	
                                 
                                  
                                  
                                  
	
	
	
									 
                                  <tr>
                                    <td width="214"><strong>Sender Name : </strong></td>
                                    <td><?php echo $groupRows['sname']; ?></td>
                                  	<td width="148" align="right"><strong>Receiver Name : </strong></td>
                                    <td width="385"><?php echo $groupRows['rname']; ?></td>
                                  
                                  </tr>
                                 
                                  <tr>
                                    <td><strong>Ship date :</strong> </td>
                                    <td colspan="3"> <?php echo $groupRows['shipdate']; ?> </td>
                                    
                                  </tr>
                                  
                                  
                                   
                                  
                                   <form action="addproof.php?id=<?php echo $groupRows['id']; ?>" method="post" enctype="multipart/form-data">
                                   <input type="hidden" value="<?php echo $groupRows['awbno']; ?>" name="awbno">
                                  <tr bgcolor="#CCCCCC" height="40px">
                                  	<td colspan="4" align="center"> <strong>Tracking Url</strong></td>
                                  </tr>
                                  <tr>
                                    
                                     <td colspan="4">
                                     
                                     <input type="text" name="turl" id="turl" size="100" style="padding:5px 10px"
                                     value="<?php if($groupRows['url']!= '')echo $groupRows['url']; ?>" >
                                     <input type="submit" name="turlsubmit" id="turlsubmit" size="20" ></td>
                                  </tr>
                                  
                                   <tr bgcolor="#CCCCCC" height="40px">
                                  	<td colspan="4" align="center"> <strong>Status Message</strong></td>
                                  </tr>
                                  <tr>
                                    
                                     <td colspan="4">
                                     Date:<input type="date" name="edate" style="padding:5px 10px"> 
                                     Time: <input type="time" name="etime" style="padding:5px 10px"> 
                                     Location  <input type="text" name="location" size="50" style="padding:5px 10px"><br>
                                     Description message: 
                                     <input type="text" name="smess" id="smess" size="89" style="padding:5px 10px"s>
                                     <input type="submit" name="smessubmit" id="smessubmit" size="20" ></td>
                                  </tr>
                                  <tr>
                                  	<td colspan="4">
                                    	 <table width="100%" border="0" cellspacing="0" cellpadding="2">
                                         	<tr bgcolor="#CCCCCC" height="40px">
                                            	<td> SN </td>
                                                <td> Date/ Time</td>
                                                <td>Description </td>
                                                <td> Location </td>
                                            </tr>
                                          <?php 
										  $counterrr=0;
							   $getcargostat=mysql_query("select * from cargostat where awbno='".$groupRows['awbno']."' ");
									while($groupRowstst=mysql_fetch_array($getcargostat)){
										$counterrr++;
							   ?>
                                         <tr>
                                            	<td> <?php echo $counterrr; ?> </td>
                                                <td> <?php echo $groupRowstst['date'].'  '.$groupRowstst['time']; ?></td>
                                                <td> <?php echo $groupRowstst['status']; ?> </td>
                                                <td>  <?php echo $groupRowstst['address']; ?> </td>
                                                <td> <a href="deletestatus.php?tid=<?php echo $_GET['id'];?>&iidd=<?php echo $groupRowstst['id']; ?>" >Delete</a> </td>
                                            </tr>
                                         
                                       <?php } ?>  
                                         </table>
                                    </td>
                                  </tr>
                                  
                                 
                                  <tr>
                                  	<td> <strong>Received by</strong></td>
                                    
                                    <td colspan="2"><input type="text" name="rnameby" id="rnameby"  class="text" value="<?php echo $groupRows['rnameby']; ?>" ></td>
                                    <td><?php echo $groupRows['rnameby']; ?></td>
                                    </tr>
                                   
                                   <tr>
                                    <td>&nbsp; </td>
                                     <td colspan="3">
                                     <input type="submit" name="rproofsubmit" id="rproofsubmit" size="20" ></td>
                                  </tr>
                                  </form>
                                </table>
                              </td>
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
       </td>
  </tr>
  <tr>
    <td colspan="2"><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
