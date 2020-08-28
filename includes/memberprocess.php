<?php 
if(isset($_POST['btnmembers']))
{
	//echo "helllo"; die();
	//if($_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code']))
	//if(!empty($_SESSION['security_code']))
	//{
		$size = $_FILES['filename']['size'];
		$image = $_FILES['filename']['name'];
		$tmp_image = $_FILES['filename']['tmp_name'];
		$filename = time(). str_replace(" ", "_", strtolower($image));
		if($size > 0)
		{
			copy($tmp_image, CMS_TESTIMONIALS_DIR . $filename);
		}
		$size1 = $_FILES['proof']['size'];
		$image1 = $_FILES['proof']['name'];
		$tmp_image1 = $_FILES['proof']['tmp_name'];
		$filename1 = time(). str_replace(" ", "_", strtolower($image1));
		if($size1 > 0)
		{
			copy($tmp_image1, CMS_TESTIMONIALS_DIR . $filename1);
		}
		
		$id = $testimonials ->save("", $_POST['name'], $_POST['address'], $_POST['comments'], $filename, $filename1);
		?>
		<script>alert('Successfully Posted');
        window.location='../../njsss-members';
        
        </script>
        
		<?
		
		//header("Location: ../msg/Volunteer-Experience-posted-successfully");
		exit();
	//}
	//else
	//{
	//	$msg = "Please enter Security Code";
	//}
}
?>