<table width="100%" border="0" cellspacing="0" cellpadding="2">
  
  <tr class="heading2" height="30">
    <td width="8%" height="36" class="tahomabold11">S.No</td>
    <td width="26%" class="tahomabold11">Name</td>
    <td width="6%" class="tahomabold11">TYpe</td>
     <td width="16%" class="tahomabold11">AWB NO</td>
    <td width="11%" class="tahomabold11"> TR Type</td>
    <td width="20%" class="tahomabold11"> TR Medium</td>
    
    <td width="13%" class="tahomabold11">Action</td>
  </tr>
  <?php
	$counter = 0;
	
	
	if (isset($_GET['groupType']))
	{
	$type=$_GET['groupType'];
	$getrows=mysql_query("select * from cargo where type='$type' order by id desc");
	}
	elseif (isset($_GET['type'])){
		$awbno=$_GET['awb'];
		
	//print_r("select * from cargo where type='$type' order by id desc");
		$getrows=mysql_query("select * from cargo where awbno='$awbno' order by id desc");
	}
	else{
		
		
	//print_r("select * from cargo where type='$type' order by id desc");
		$getrows=mysql_query("select * from cargo  order by id desc");
	}
		

	while ($row = mysql_fetch_array($getrows))//error here Undefined variable: result
	{
		$counter++;
	?>
  <tr <?php if ($counter % 2 == 0) { echo "bgcolor='#F7F7F7'";} ?>>
    <td valign="top"><?php echo $counter; ?></td>
    <td valign="top"><?php echo $row['sname']; ?></td>
    <td valign="top"><?php echo $row['type']; ?></td>
    <td valign="top"><strong><?php echo $row['awbno']; ?></strong></td>
    <td valign="top"><?php echo $row['trtype']; ?></td>
      <td valign="top"><?php echo $row['trmedium']; ?></td>
    
    <td valign="top"><?php
		if ($withOpen)
		{
			
			?>
      <a href="cargodetail.php?id=<?php echo $row['id']; ?>">Open</a> /
      <?php
    	
		}
		if ($withEdit)
		{
			$link = $pagename ."?id=" . $row['id'];
			
			$link .= "&editType=" . $row['type'];
			?>
      <a href="<?php echo $link; ?>">Edit</a> /
      <?php
		}
		if ($withDelete)
		{
			
			?>
      <a href="#" onclick="delete_confirmation('manage_cargo.php?id=<?php echo $row['id']; ?>&groupType=<?php echo $row['type'];?>&delete');">Delete</a>
      <?php
			
		}
    ?>    </td>
  </tr>
  <?php
	}
	?>
</table>
