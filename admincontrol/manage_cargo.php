<?php
include("init.php");
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}

if (isset($_POST['cargo']))
{
	
	
	$type=$_POST['addtype'];
	$url='cargo.php?groupType='.$type;
	
	 $addcargo="insert into cargo set
	type='$type',
	onDate='".date("Y-m-d")."',
	awbno='".mysql_real_escape_string($_POST['awbno'])."',
	trtype='".mysql_real_escape_string($_POST['trtype'])."',
	trmedium='".mysql_real_escape_string($_POST['trmedium'])."',
	shipdate='".mysql_real_escape_string($_POST['shipdate'])."',
	fcbt='".mysql_real_escape_string($_POST['fcbt'])."',
	tdbt='".mysql_real_escape_string($_POST['tdbt'])."',
	shipperref='".mysql_real_escape_string($_POST['shipperref'])."',
	cneeref='".mysql_real_escape_string($_POST['cneeref'])."',
	grosswt='".mysql_real_escape_string($_POST['grosswt'])."',
	volumewt='".mysql_real_escape_string($_POST['volumewt'])."',
	sname='".mysql_real_escape_string($_POST['sname'])."',
	saddress='".mysql_real_escape_string($_POST['saddress'])."',
	pol='".mysql_real_escape_string($_POST['pol'])."',
	pod='".mysql_real_escape_string($_POST['pod'])."',
	scity='".mysql_real_escape_string($_POST['scity'])."',
	sphone='".mysql_real_escape_string($_POST['sphone'])."',
	scountry='".mysql_real_escape_string($_POST['country'])."',
	rname='".mysql_real_escape_string($_POST['rname'])."',
	raddress='".mysql_real_escape_string($_POST['raddress'])."',
	rcity='".mysql_real_escape_string($_POST['rcity'])."',
	rphone='".mysql_real_escape_string($_POST['rphone'])."',
	rcountry='".mysql_real_escape_string($_POST['country1'])."',
	rstat='0',
	shipstat='1'
	
	
	";
	//die();
	$addquery=mysql_query($addcargo);
	if($addquery){
		$getcargo="select * from cargo order by id desc limit 0,1";
		$setcargo=mysql_fetch_array(mysql_query($getcargo));
		$cargoid=$setcargo['id'];
		$cargoawbno=$setcargo['awbno'];
		$itemno=count($_POST['itemname']);
		$itemsno=$itemno-1;
		
		echo '<br>';
		
		$name=$_POST['itemname'];
		$width=$_POST['itemwidth'];
		$heigth=$_POST['itemhight'];
		$bdth=$_POST['itembdh'];
		$qty=$_POST['itemqty'];
		
		for ($i = 0; $i < $itemno; $i++) {
		print$additem="insert into cargoitems set
			cargoid='$cargoid',
			cargoawbno='$cargoawbno',
			name='".$name[$i]."',
			width='".$width[$i]."',
			height='".$heigth[$i]."',
			breadth='".$bdth[$i]."',
			qty='".$qty[$i]."',
			stat='0'
		";
		echo '<br>';
		mysql_query($additem);
		}
		
		}
	 
?><script>window.location="<?php echo $url ?>&msg=Successfully updated!";</script><?	 
  //header ("Location: " . $url ."&msg=Successfully updated!");
	exit();
}
if (isset($_POST['editcargo']))
{
	 if(isset($_POST['edittype'])){
		  
	$type=$_POST['groupType'];
	$url='cargo.php?groupType='.$type;
	
	print$editcargo="update cargo set
	type='$type',
	onDate='".date("Y-m-d")."',
	awbno='".mysql_real_escape_string($_POST['awbno'])."',
	trtype='".mysql_real_escape_string($_POST['trtype'])."',
	trmedium='".mysql_real_escape_string($_POST['trmedium'])."',
	shipdate='".mysql_real_escape_string($_POST['shipdate'])."',
	shipperref='".mysql_real_escape_string($_POST['shipperref'])."',
	cneeref='".mysql_real_escape_string($_POST['cneeref'])."',
	grosswt='".mysql_real_escape_string($_POST['grosswt'])."',
	volumewt='".mysql_real_escape_string($_POST['volumewt'])."',
	sname='".mysql_real_escape_string($_POST['sname'])."',
	saddress='".mysql_real_escape_string($_POST['saddress'])."',
	pol='".mysql_real_escape_string($_POST['pol'])."',
	pod='".mysql_real_escape_string($_POST['pod'])."',
	scity='".mysql_real_escape_string($_POST['scity'])."',
	sphone='".mysql_real_escape_string($_POST['sphone'])."',
	scountry='".mysql_real_escape_string($_POST['country'])."',
	rname='".mysql_real_escape_string($_POST['rname'])."',
	raddress='".mysql_real_escape_string($_POST['raddress'])."',
	rcity='".mysql_real_escape_string($_POST['rcity'])."',
	rphone='".mysql_real_escape_string($_POST['rphone'])."',
	rcountry='".mysql_real_escape_string($_POST['country1'])."',
	fcbt='".mysql_real_escape_string($_POST['fcbt'])."',
	tdbt='".mysql_real_escape_string($_POST['tdbt'])."',
	rstat='0',
	shipstat='1'
	
	where id='".$_POST['id']."'
	";
	mysql_query($editcargo);
	 }
	
		
	
 
  	header ("Location: " . $url ."&msg=Successfully updated!");
		exit();
}


if (isset($_GET['delete']))
{
	$type=$_GET['groupType'];
	$url='cargo.php?groupType='.$type;
	$id=$_GET['id'];
	$delete=" delete from cargo where id=$id";
	mysql_query($delete);
		header ("Location: " . $url ."&msg=Successfully deleted!");
		exit();
}
////////////////
// ADD NEW //// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



?>
