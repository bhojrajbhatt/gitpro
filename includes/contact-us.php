<div class="container">
		<div class="row">
<div style=" padding-left:10px;">
        <div>
        		<?
						$pageResult = $groups->getById(CONTACT);
						$pageRow = $conn->fetchArray($pageResult);
						
						$pageParentId = $pageRow['parentId'];
						$pageDate = $pageRow['onDate'];
						$pageContents = $pageRow['contents'];
				?>
        	   	
                <div class="contentHdr">
                        <h2 style="font-size:22px;margin-top:2px; padding-top:10px;">Our Contact Information:</h2>
                </div>
                <div class="content" style="padding-left:0">
                        <?php
                        $pagename = "index.php?id=". $pageId ."&";
                        include("includes/pagination.php");
                        
                        echo Pagination($pageContents, "content");
                        ?>
                        
                        <div style="margin-top:50px;">
				<script language="javascript">
                function validateform(fm){
                    if(fm.txtname.value == ""){
                        alert("Please type your Name.");
                        fm.txtname.focus();
                        return false;
                    }	
                    var goodEmail = fm.txtemail.value.match(/\b(^(\S+@).+((\.com)|(\.net)|(\.edu)|(\.mil)|(\.gov)|(\.org)|(\..{2,3}))$)\b/gi);		
                    if(fm.txtemail.value == ""){
                        alert("Please type your E-mail.");
                        fm.txtemail.focus();
                        return false;
                    }
                    if (!goodEmail) {
                        alert("The Email address you entered is invalid please try again!")
                        fm.txtemail.focus()
                        return (false);
                    }			
                    if(fm.txtcomment.value == ""){
                        alert("Please type your Comment.");
                        fm.txtcomment.focus();
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
                if(!empty($feedbackmsg))
                    $msg = $feedbackmsg;
                elseif(isset($_REQUEST['msg']))
                    $msg = $_REQUEST['msg'];
                ?>
                
                     <h2 style="clear:both; float:none;">Enquiry Form</h2>
                    <div style="padding-top:10px;">
					<form name="frmFeedback" method="post" action="" onSubmit="return validateform(this);">
    <table width="100%" border="0" cellspacing="0" cellpadding="2" class="cmsFormTable">      
			<?php if(!empty($msg)){ ?>
			<tr>
        <td colspan="2"><span class="cmsFormSubmitMsg" style="color:red;"><?php echo $msg; ?></span></td>
      </tr>
			<?php } ?>
      <tr>
        <th width="27%" align="left" valign="top">Name : <span class="red">*</span></th>
        <td width="73%"><input type="text" class="cmsTxtField" name="txtname" value="<?php echo $txtname; ?>" /></td>
      </tr>
      <tr>
        <th align="left" valign="top">Address :</th>
        <td><input type="text" class="cmsTxtField" name="txtaddress" value="<?php echo $txtaddress; ?>" /></td>
      </tr>
      <tr>
        <th align="left" valign="top">E-mail : <span class="red">*</span></th>
        <td><input type="text" class="cmsTxtField" name="txtemail" value="<?php echo $txtemail; ?>" /></td>
      </tr>
      <tr>
        <th align="left" valign="top">Country :</th>
        <td><input type="text" class="cmsTxtField" name="txtcountry" value="<?php echo $txtcountry; ?>" /></td>
      </tr>
      <tr>
        <th valign="top" align="left">Comment : <span class="red">*</span></th>
        <td><textarea style="width:400px;" class="cmsTxtArea" name="txtcomment" cols="" rows="6"><?php echo $txtcomment; ?></textarea></td>
      </tr>
      <tr>
        <th align="left">Security Code : <span class="red">*</span></th>
        <td><img src="includes/captcha.php?width=110&height=40&characters=6" id="captchaimage" style="margin-bottom:10px;" />&nbsp; <a href="javascript: void(0);" onclick="document.getElementById('captchaimage').src = 'includes/captcha.php?width=110&height=40&characters=6&' + Math.random(); return false;" class="captchaReload red" style="position:relative; top:-22px;">[ Reload Image ]</a></td>
      </tr>
      <tr>
        <th>&nbsp;</th>
        <td><input id="security_code" name="security_code" type="text" maxlength="6" class="securitycode cmsTxtField" /></td>
      </tr>
      <tr>
        <th>&nbsp;</th>
        <td><input name="btnFeedback" type="submit" value="Submit" class="cmsFormBtn cmsBtn" /></td>
      </tr>
      <tr>
        <th>&nbsp;</th>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><span class="cmsFormNotes" style="color:red;">[ Fields marked with <span class="cmsAstriks">*</span> are compulsory fields ]</span></td>
        </tr>
    </table>
	</form>
    				</div>
  					<!-- feedback ends -->
  					
        
        </div>
        
                </div>	
					
        </div>
        
</div>
</div></div>