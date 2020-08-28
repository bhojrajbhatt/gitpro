<?php
$id=$_GET['id'];
$awbno=$_POST['awbno'];
include("init.php");
$url='cargodetail.php?id='.$id;
if(isset($_POST['smessubmit']))
	{
		$addproof="insert into cargostat set
					awbno='$awbno',
					status='".mysql_real_escape_string($_POST['smess'])."',
					date ='".mysql_real_escape_string($_POST['edate'])."',
					address='".mysql_real_escape_string($_POST['location'])."',
					time='".mysql_real_escape_string($_POST['etime'])."'
					";
					$proof=mysql_query($addproof);
		header ("Location: " . $url ."&msg=Successfully updated!");
		exit();
	}
if(isset($_POST['turlsubmit']))
	{
		$addproof="update cargo set
					url='".mysql_real_escape_string($_POST['turl'])."' 
				
					where id='".$_GET['id']."'";
					$proof=mysql_query($addproof);
		header ("Location: " . $url ."&msg=Successfully updated!");
		exit();
	}
if(isset($_POST['rproofsubmit']))
	{
		$getfileName=explode('.',$_FILES['rproof']['name']);
		$count=count($getfileName);
		$ext=$count-1;
		$setfileName=$_GET['id']."-PR-".time().".".$getfileName[$ext];
		
		$getfileName=explode('.',$_FILES['rproof1']['name']);
		$count=count($getfileName);
		$ext=$count-1;
		$setfileName1=$_GET['id']."-ID-".time().".".$getfileName[$ext];
		
		print$getimage="select SQL_CALC_FOUND_ROWS * from cargo where id='".$_GET['id']."'    ";
		$getimageres=mysql_query($getimage);
		$setimage=mysql_fetch_array($getimageres);
		
		if(!($setimage['rproof']== '')){
		echo $image=$setimage['rproof'];
		if(file_exists('../images/cargo/'.$image))
		{
			unlink('../images/cargo/'.$image);
			echo 'removed';
		}
		}
		if(!($setimage['rproof1']== '')){
		echo $image1=$setimage['rproof1'];
		if(file_exists('../images/cargo/'.$image1))
		{
			unlink('../images/cargo/'.$image1);
			echo 'removed id';
		}
		}
		
		echo '<br>';
		
		if(move_uploaded_file($_FILES['rproof']['tmp_name'],'../images/cargo/'.$setfileName))
			{
				$proof=$setfileName;
			}
			else{ $proof='';}
			if(move_uploaded_file($_FILES['rproof1']['tmp_name'],'../images/cargo/'.$setfileName1))
				{
					$proof1=$setfileName1;
					
					}
			else{ $proof1='';}
					print$addproof="update cargo set
					rnameby='".mysql_real_escape_string($_POST['rnameby'])."', 
					rproof1='".$proof1."',
					rproof='".$proof."',
					rstat='1'
					where id='".$_GET['id']."'";
					$proof=mysql_query($addproof);
				
				if($proof){
		 header ("Location: " . $url ."&msg=Successfully updated!");
		exit();
				}
			}
		




?>