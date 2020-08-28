<!--search country-->
         
<script type="text/javascript">
		
	var xml;
	function ajaxCountry(txt)
	{
		//alert(txt);
		if(window.XMLHttpRequest)
		{
			xml=new XMLHttpRequest();
		}
		else
		{
			xml=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xml.onreadystatechange=function()
		{
			
			if(xml.readyState==4)
			{
				//alert(xml.responseText);
				document.getElementById("code").innerHTML=xml.responseText;
			}
		}
		
		var url="includes/ajaxCountry.php?txt="+txt;
		//alert(url);
		xml.open("GET", url, true);
		xml.send();
		
			
	}

</script>


<script type="text/javascript">
		
	var xml;
	function ajaxCode(txt)
	{
		//alert(txt);
		if(window.XMLHttpRequest)
		{
			xml=new XMLHttpRequest();
		}
		else
		{
			xml=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xml.onreadystatechange=function()
		{
			
			if(xml.readyState==4)
			{
				//alert(xml.responseText);
				document.getElementById("airport").innerHTML=xml.responseText;
			}
		}
		
		var url="includes/ajaxcode.php?txt="+txt;
		//alert(url);
		xml.open("GET", url, true);
		xml.send();
		
			
	}

</script>


        
        

<?php //include("includes/breadcrumb.php"); ?>
<style>
	.main_table{}
	.form_title{margin:0 0 8px 2px}
	.bold{ font-weight:bold; width:240px; padding-left:8px;}
	.red{ color:red}
	.field{ width:230px; text-align:center}
	.field input{ height:20px; width:220px; border:1px solid #c0d9ff}
	.row{ height:30px}
</style>

<script language="javascript">
	function validateform(fm){
		if(fm.fname.value == ""){
			alert("Please type your First Name.");
			fm.fname.focus();
			return false;
		}
		if(fm.lname.value == ""){
			alert("Please type your Last Name.");
			fm.lname.focus();
			return false;
		}	
		var goodEmail = fm.email.value.match(/\b(^(\S+@).+((\.com)|(\.net)|(\.edu)|(\.mil)|(\.gov)|(\.org)|(\..{2,3}))$)\b/gi);		
		if(fm.email.value == ""){
			alert("Please type your E-mail.");
			fm.email.focus();
			return false;
		}
		if (!goodEmail) {
			alert("The Email address you entered is invalid please try again!")
			fm.email.focus()
			return (false);
		}			
		if(fm.address1from.value == ""){
			alert("Please type Address 1.");
			fm.address1from.focus();
			return false;
		}
		if(fm.address2from.value == ""){
			alert("Please enter Address 2.");
			fm.address2from.focus();
			return false;
		}
		if(fm.cityfrom.value == ""){
			alert("Please enter City.");
			fm.cityfrom.focus();
			return false;
		}
		if(fm.statefrom.value == ""){
			alert("Please enter State.");
			fm.statefrom.focus();
			return false;
		}
		if(fm.pcodefrom.value == ""){
			alert("Please enter Postal Code.");
			fm.pcodefrom.focus();
			return false;
		}
		if(fm.cityfrom.value == ""){
			alert("Please enter City.");
			fm.cityfrom.focus();
			return false;
		}
		if(fm.countryfrom.value == ""){
			alert("Please enter Country.");
			fm.countryfrom.focus();
			return false;
		}
		if(fm.loading_facilityfrom.value == ""){
			alert("Please enter Loading Facility.");
			fm.loading_facilityfrom.focus();
			return false;
		}
		if(fm.nameto.value == ""){
			alert("Please enter Name.");
			fm.nameto.focus();
			return false;
		}
		if(fm.address1to.value == ""){
			alert("Please ente Address 1.");
			fm.address1to.focus();
			return false;
		}
		if(fm.cityto.value == ""){
			alert("Please enter City.");
			fm.cityto.focus();
			return false;
		}
		if(fm.stateto.value == ""){
			alert("Please enter State.");
			fm.stateto.focus();
			return false;
		}
		if(fm.pcodeto.value == ""){
			alert("Please enter Postal Code.");
			fm.pcodeto.focus();
			return false;
		}
		if(fm.countryto.value == ""){
			alert("Please enter Country.");
			fm.countryto.focus();
			return false;
		}
		if(fm.loading_facilityto.value == ""){
			alert("Please enter Loading Facility.");
			fm.loading_facilityto.focus();
			return false;
		}
		if(fm.no_of_shipments.value == ""){
			alert("Please enter No of Shipments.");
			fm.no_of_shipments.focus();
			return false;
		}
		if(fm.packaging_type.value == ""){
			alert("Please enter Packaging Type.");
			fm.packaging_type.focus();
			return false;
		}
		if(fm.quantity.value == ""){
			alert("Please enter Quantity.");
			fm.quantity.focus();
			return false;
		}
		if(fm.weight.value == ""){
			alert("Please enter Weight.");
			fm.weight.focus();
			return false;
		}
		if(fm.dimension.value == ""){
			alert("Please enter Dimension.");
			fm.dimension.focus();
			return false;
		}
		
		
		
		if(fm.security_code.value == ""){
			alert("Please enter security code.");
			fm.security_code.focus();
			return false;
		}
		else if(fm.security_code.value.length < 6)
		{
			alert("Please enter valid length security code.");
			fm.security_code.focus();
			return false;
		}
	}
</script>

<?php
if(isset($_POST['btnFeedback']))
{
	$errormsg = "";
	//echo "hello";
	if($_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code']))
	{
		//echo "hello";
		extract($_POST);
		
		if(!empty($security_code))
		{
			
			
			//echo "hi";
			//$feedbacks -> save($txtname, $txtaddress, $txtemail, $txtcountry, $txtcomment);
			$msg='<h3>Rate Inquiry Details:</h3>';
			$msg=$msg.'<table border="1" cellpadding="5" width="500"><tr><td>Interested Shipping Service</td><td>'.$interested_shipment.'</td></tr><tr><td>Name</td><td>'.$fname." ".$lname.'</td></tr>
			<tr><td>Email</td><td>'.$email.'</td></tr><tr><td>Phone</td><td>'.$phone.'</td></tr></table><br />';
			
			$msg=$msg.'<h3>Ship From Details:</h3>';
			$msg=$msg.'<table border="1" cellpadding="5" width="500"><tr><td>Shipping Method</td><td>'.$methodfrom.'</td></tr><tr><td>Street Address1</td><td>'.$address1from.'</td></tr>
			<tr><td>Street Address2</td><td>'.$address2from.'</td></tr><tr><td>City</td><td>'.$cityfrom.'</td></tr><tr><td>State, Province, Region</td><td>'.$statefrom.'</td></tr>
			<tr><td>Postal Code</td><td>'.$pcodefrom.'</td></tr><tr><td>Country</td><td>'.$countryfrom.'</td></tr><tr><td>Airport Of Destination</td><td>'.$airport.'</td></tr><tr><td>International Seaport of Destination</td><td>'.$seaport.'</td></tr>
			<tr><td>Loading Facility</td><td>'.$loading_facilityfrom.'</td></tr></table><br />';
			
			$msg=$msg.'<h3>Ships To Details:</h3>';
			$msg=$msg.'<table border="1" cellpadding="5" width="500"><tr><td>Name</td><td>'.$nameto.'</td></tr><tr><td>Street Address1</td><td>'.$address1to.'</td></tr>
			<tr><td>City</td><td>'.$cityto.'</td></tr><tr><td>State, Province, Region</td><td>'.$stateto.'</td></tr><tr><td>Postal Code</td><td>'.$pcodeto.'</td></tr>
			<tr><td>Country</td><td>'.$countryto.'</td></tr><tr><td>Loading Facility</td><td>'.$loading_facilityto.'</td></tr>
			<tr><td>Additional Services</td><td>'.$additional_services.'</td></tr></table><br />';
			
			$msg=$msg.'<h3>Freight Information Details:</h3>';
			$msg=$msg.'<table border="1" cellpadding="5" width="500"><tr><td>No Of Shipments</td><td>'.$no_of_shipments.'</td></tr><tr><td>Packaging Type</td><td>'.$packaging_type.'</td></tr>
			<tr><td>Quantity</td><td>'.$quantity.'</td></tr><tr><td>Weight</td><td>'.$weight.'</td></tr><tr><td>Dimension</td><td>'.$dimension.'</td></tr>
			<tr><td>Commodity/Type of product</td><td>'.$commodity.'</td></tr><tr><td>Additional Information</td><td>'.$additional_information.'</td></tr>
			<tr><td>Shipments Per Year</td><td>'.$shipments_per_year.'</td></tr><tr><td>Want More Information</td><td>'.$more_info.'</td></tr>
			</table><br />';
			
			//include('includes/sendemail.php');
			$headers  = "";
			$headers .= "MIME-Version: 1.0 \r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
			$headers .= "X-Priority: 1\r\n";
			//sendEmail("kh6ganesh@yahoo.com", "Inquiry", $msg, $name);
			//echo "hello";
			$arrTo = array("rising@mos.com.np");
			$subject = "Quotation Details :";
			
			if(mail($arrTo[0], $subject, $msg, $headers))
			{ //echo "hello";?>
            	<script> window.location.href = 'index.php?action=quotation&msgg=Quotation posted successfully.'; </script>
				<!--header("Location: http://www.risingstarcargo.com/quotation.html/?msgg=Quotation posted successfully");-->
			<? }
	
		}	
		else
			$errormsg = "Please enter all required fields";
			//echo "hi";
	}
	else
			$errormsg = "Please enter correct security code";
			
}


?>


<div class="content">
	<div class="contentHdr">
        <h2>Request a Quote</h2>
        
        <?php
		if(!empty($errormsg))
			$msgg = $errormsg;
		elseif(isset($_GET['msgg']))
			$msgg = $_GET['msgg']." We will contact you soon. Thank you.";
		else
			//$msgg="";
		?>
        <p style="color:red"><? echo $msgg;?></p>
   	</div>
    <form style="width:530px;" method="post" action="" name="form1" onSubmit="return validateform(this);">
    
        <h3 class="form_title">Rate Inquiry</h3>
        <table class="main_table" border="1">
        
            <tr class="row">
                <td class="bold">What Shipping Services are you interested in?</td>
                <td class="field">
                    <input style="width:auto" type="radio" name="interested_shipment" value="import" /> Import <input style="width:auto" type="radio" name="interested_shipment" value="export" /> Export
                </td>
            </tr>
            <tr class="row">
                <td class="bold">First Name <span class="red">*</span></td>
                <td class="field">
                    <input type="text" name="fname" />
                </td>
            </tr>
            <tr class="row">
                <td class="bold">Last Name <span class="red">*</span></td>
                <td class="field">
                    <input type="text" name="lname" />
                </td>
            </tr>
            <tr class="row">
                <td class="bold">Email <span class="red">*</span></td>
                <td class="field">
                    <input type="text" name="email" />
                </td>
            </tr>
            <tr class="row">
                <td class="bold">Phone</td>
                <td class="field">
                    <input type="text" name="phone" />
                </td>
            </tr>
            
        </table>
        
        <br />
        
        <h3 class="form_title">Ship From</h3>
        <table class="main_table" border="1">
        
            <tr class="row">
                <td class="bold">Shipping Method</td>
                <td class="field">
                    <select name="methodfrom" style="width:219px">
                        <option value="air">Air Cargo</option>
                        <option value="ocean">Sea Cargo</option>
                        <option value="ground">Air/Sea Cargo</option>
                        <option value="ground">Ground</option>
                        <option value="ground">Courier</option>
                    </select>
                </td>
            </tr>
            <tr class="row">
                <td class="bold">Street Address1 <span class="red">*</span></td>
                <td class="field">
                    <input type="text" name="address1from" />
                </td>
            </tr>
            <tr class="row">
                <td class="bold">Street Address2 <span class="red">*</span></td>
                <td class="field">
                    <input type="text" name="address2from" />
                </td>
            </tr>
            <tr class="row">
                <td class="bold">City <span class="red">*</span></td>
                <td class="field">
                    <input type="text" name="cityfrom" />
                </td>
            </tr>
            <tr class="row">
                <td class="bold">State, Province, Region <span class="red">*</span></td>
                <td class="field">
                    <input type="text" name="statefrom" />
                </td>
            </tr>
            <tr class="row">
                <td class="bold">Postal code <span class="red">*</span></td>
                <td class="field">
                    <input type="text" name="pcodefrom" />
                </td>
            </tr>
            <tr class="row">
                <td class="bold">Country <span class="red">*</span></td>
                <td class="field">
                    <select name="countryfrom" style="width:219px" onchange="ajaxCountry(this.value)">
                        <option value="">Select Country</option>
                        <? $country=mysql_query("select * from countries order by countryName");
						while($countryGet=mysql_fetch_array($country))
						{?>
                        	<option style="width:219px" value="<?=$countryGet['countryName'];?>"><?=$countryGet['countryName'];?></option>
                    	<? }?>
                    </select>
                </td>
            </tr>
            <tr class="row">
                <td class="bold">International Airport Of Destination</td>
                <td class="field" id="code">
                    <select name="" style="width:219px;">
                        <? $code="select * from tariff";
                        
                        $codeq=mysql_query($code);
                        while($codeGet=mysql_fetch_array($codeq))
                        {?>
                            <option value="<?=$codeGet['code'];?>"><?=$codeGet['code'];?></option>
                        <? }?>
                    </select>
                    
                    
                    <!--<input type="text" name="airport" style="height:20px; width:225px;" />-->
                </td>
            </tr>
            
            <tr class="row">
                <td class="bold">International Seaport of Destination <span class="red">*</span></td>
                <td class="field">
                    <input type="text" name="seaport" />
                </td>
            </tr>
            
            <tr class="row">
                <td class="bold">Loading Facility <span class="red">*</span></td>
                <td class="field">
                    <select name="loading_facilityfrom" style="width:219px">
                        <option value="">Select One</option>
                        <option value="forklift">Forklift Available</option>
                        <option value="dock">Dock Available</option>
                        <option value="residential">Residential</option>
                        <option value="noforklift">No Forklift</option>
                        <option value="nodock">No Dock</option>
                    </select>
                </td>
            </tr>
            
        </table>
        
        <br />
        
        <h3 class="form_title">Ships To</h3>
        <table class="main_table" border="1">
        
            <tr class="row">
                <td class="bold">Name</td>
                <td class="field">
                    <input type="text" name="nameto" />
                </td>
            </tr>
            <tr class="row">
                <td class="bold">Street Address1 <span class="red">*</span></td>
                <td class="field">
                    <input type="text" name="address1to" />
                </td>
            </tr>
            
            <tr class="row">
                <td class="bold">City <span class="red">*</span></td>
                <td class="field">
                    <input type="text" name="cityto" />
                </td>
            </tr>
            <tr class="row">
                <td class="bold">State, Province, Region <span class="red">*</span></td>
                <td class="field">
                    <input type="text" name="stateto" />
                </td>
            </tr>
            <tr class="row">
                <td class="bold">Postal code <span class="red">*</span></td>
                <td class="field">
                    <input type="text" name="pcodeto" />
                </td>
            </tr>
            <tr class="row">
                <td class="bold">Country <span class="red">*</span></td>
                <td class="field">
                    <select name="countryto" style="width:219px">
                        <option value="">Select Country</option>
                        
                        <? $country=mysql_query("select * from countries order by countryName");
						while($countryGet=mysql_fetch_array($country))
						{?>
                        	<option style="width:219px;" value="<?=$countryGet['countryName'];?>"><?=$countryGet['countryName'];?></option>
                    	<? }?>
                        
                    </select>
                </td>
            </tr>
            
            <tr class="row">
                <td class="bold">Loading Facility <span class="red">*</span></td>
                <td class="field">
                    <select name="loading_facilityto" style="width:219px">
                        <option value="">Select One</option>
                        <option value="forklift">Dock</option>
                        <option value="dock">Forklift</option>
                        <option value="residential">No Forklift or Dock</option>
                        <option value="noforklift">Residential</option>
                        
                    </select>
                </td>
            </tr>
            <tr class="row">
                <td class="bold">Additional Services</td>
                <td class="field">
                    <select name="additional_services" style="width:219px">
                        <option value="">Select One</option>
                        <option value="forklift">Liftgage</option>
                        <option value="dock">Inside Pickup</option>
                        <option value="residential">By Appointment</option>
                        
                    </select>
                </td>
            </tr>
            
        </table>
        
        <br />
        
        <h3 class="form_title">Freight Information</h3>
        <table class="main_table" border="1">
        
            <tr class="row">
                <td class="bold">No of Shipments <span class="red">*</span></td>
                <td class="field">
                    <select name="no_of_shipments" style="width:219px">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
    
                </td>
            </tr>
            <tr class="row">
                <td class="bold">Packaging Type <span class="red">*</span></td>
                <td class="field">
                    <select name="packaging_type" style="width:219px">
                        <option value="">Select One</option>
                        <option value="boxes">Boxes</option>
                        <option value="crates">Crates</option>
                        <option value="pallets">Pallets/Skids</option>
                        <option value="pieces">Pieces</option>
                    </select>
                </td>
            </tr>
            
            <tr class="row">
                <td class="bold">Quantity <span class="red">*</span></td>
                <td class="field">
                    <input type="text" name="quantity" />
                </td>
            </tr>
            <tr class="row">
                <td class="bold">Weight (kg/lb) <span class="red">*</span></td>
                <td class="field">
                    <input type="text" name="weight" />
                </td>
            </tr>
            <tr class="row">
                <td class="bold">Dimensions (Length x Width x Height) Inches <span class="red">*</span></td>
                <td class="field">
                    <input type="text" name="dimension" />
                </td>
            </tr>
            <tr class="row">
                <td class="bold">Commodity / Type of product being shipped</td>
                <td class="field">
                    <textarea name="commodity" rows="4" cols="25"></textarea>
                </td>
            </tr>
            
            <tr class="row">
                <td class="bold">Additional Information</td>
                <td class="field">
                    <textarea name="additional_information" rows="4" cols="25"></textarea>
                </td>
            </tr>
            <tr class="row">
                <td class="bold">How many shipments do you make a year</td>
                <td class="field">
                    <input style="width:auto" type="radio" name="shipments_per_year" value="less than 5" /> Less than five<br /> 
                    <input style="width:auto" type="radio" name="shipments_per_year" value="more than 5" /> More than five
                </td>
            </tr>
            <tr class="row">
                <td class="bold">Do you want more information of our services?</td>
                <td class="field">
                    <input style="width:auto" type="radio" name="more_info" value="yes" /> Yes <input style="width:auto" type="radio" name="more_info" value="no" /> No
                </td>
            </tr>
            
        </table>
        
        <br />
        
        <table border="1">
        	<tr class="row">
                <td class="bold" style="width:160px;">Security Code : <span class="red">*</span></th>
                <td class="field" style="width:220px;">
                    <img src="includes/captcha.php?width=110&height=40&characters=6" id="captchaimage" style="margin-bottom:5px; margin-top:5px;" />&nbsp; 
                    <a href="javascript: void(0);" 
                    onclick="document.getElementById('captchaimage').src = 'includes/captcha.php?width=110&height=40&characters=6&' + Math.random(); return false;" 
                    class="captchaReload red" style="position:relative; top:-22px;">[ Reload Image ]</a>
                </td>
                <td><input type="text" name="security_code" style="width:100px; margin-left:7px;" /></td>
          	</tr>
        </table>
        
        <p style="float:right;"><input type="submit" name="btnFeedback" value="submit" style=" cursor:pointer"></p>
        
    </form>

</div>

