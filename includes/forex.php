<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>

<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%Y-%m-%d"
		});
	};
</script>

<style>
	.table td{ border-top:none; padding-top:5px; height:20px;}
</style>

<div class="content">
    <div class="contentHdr">
        <h2>Forex Update</h2>
    </div>


	<table width="680" height="31" border="0" class="table">
        <tbody><tr>
          <td align="center">
        	<form id="forex" name="forex" method="post" action="">
              	<center>
              		<table cellspacing="4" cellpadding="4" border="0" style="width:50%; float:left">
                		<tr>
                    		<th>Date:</th>
                    		<td>	
                      			<input type="text" size="20" id="inputField" name="date" placeholder="Pick a date" />
                    		</td>
                    		<td><input type="submit" value="Search" name="submit" class="button"></td>
                  		</tr>
                	</table>
           	   </center>
            </form>
        </td>
        </tr>
      </tbody>
  	</table>
          

	<table width="675" height="192" cellspacing="0" cellpadding="0" border="0" id="forex" class="table">
      	
        <caption><br>
              Forex Listing of Date 
              <strong>
              		<? if(!isset($_POST['submit']))
                    {
						$onDate=date("Y-m-d"); ?>
						<? $sqlis = mysql_query("select * from forex where onDate='$onDate' order by id ASC"); $j=1;
                        while(mysql_num_rows($sqlis)<1)
                        {
                            $dd=date("Y-m-d",strtotime("-$j days"));$sqlis = mysql_query("select * from forex where onDate='$dd' order by id ASC");$j++;
                        }
                        $j=$j-1; $dd=date("Y-m-d",strtotime("-$j days"));
                        if(date("Y-m-d")==$dd){ echo date("Y-m-d"); }
                        else{ echo $dd; }
					}
					else
					{
						echo $_POST['date'];	
					}?>
                    
              </strong>
              <br>
              <br>
              </caption>
      
      	<tbody>
        
            <tr>
              <th width="64" valign="middle" align="center" style="border-bottom:1px #ccc solid; border-top: 1px #ccc solid; border-left:1px #ccc solid;" rowspan="3"><span class="rounded-foot-right">
                Currency                        </span></th>
              <th width="69" valign="middle" align="center" style="border-bottom:1px #ccc solid; border-top: 1px #ccc solid; border-left:1px #ccc solid;" rowspan="3"><span class="rounded-foot-right">
                Unit                        </span></th>
              <th valign="middle" height="29" align="center" style="border-bottom:1px #ccc solid; border-top: 1px #ccc solid; border-left:1px #ccc solid;" colspan="3"><span class="rounded-foot-right">Buying Rate (NPR)</span></th>
              <th width="94" valign="middle" align="center" rowspan="3" style="border-left:1px #ccc solid; border-bottom: 1px #ccc solid;  border-top: 1px #ccc solid; "><span class="rounded-foot-right">Selling Rate (NPR) </span></th>
              <th width="105" valign="middle" align="center" rowspan="3" style="border-left:1px #ccc solid; border-bottom: 1px #ccc solid;  border-top: 1px #ccc solid; border-right:1px #ccc solid; "><span class="rounded-foot-right">
                Cross Rate (Buying)      </span></th>
            </tr>
            
            <tr>
              <th valign="middle" height="29" align="center" style="border-bottom:1px #ccc border-top: 1px #ccc solid; border-bottom:1px #ccc solid; border-left:1px #ccc solid;" colspan="2"><span class="rounded-foot-right ">Cash</span></th>
              <th width="83" valign="middle" align="center" rowspan="2" style="border-left:1px #ccc solid; border-bottom: 1px #ccc solid; border-left:1px #ccc solid;"><span class="rounded-foot-right">TC &amp; Others</span></th>
            </tr>
            
            <tr>
              <th width="123" valign="middle" height="29" align="center" style="border-bottom:1px #ccc solid; border-left:1px #ccc solid;"><span class="rounded-foot-right">Below  Deno 50*</span></th>
              <th width="136" valign="middle" align="center" style="border-bottom:1px #ccc solid; border-left:1px #ccc solid;"><span class="rounded-foot-right">Deno  50 &amp; Above</span></th>
            </tr>
            
            <? if(isset($_POST['submit']))
			{
				//echo "hi";
				$date=$_POST['date'];
				$sqlis=mysql_query("select * from forex where onDate='$date' order by id ASC");
				if(mysql_num_rows($sqlis)>0)
				{
					while($dataGet=mysql_fetch_array($sqlis))
					{?>
						
						<tr>
						  <td valign="top" height="26" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$dataGet['currency'];?></td>
						  
						  <td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$dataGet['unit'];?></td>
						  <td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$dataGet['below50'];?></td>
						  <td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$dataGet['above50'];?></td>
						  <td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$dataGet['tc'];?></td>
						  <td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$dataGet['sp'];?></td>
						  <td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$dataGet['cp'];?></td>
						</tr>
					
					<? $i++; }	
				}
				else
				{
					//$no="No Record Found for Supplied Date";?>
                    <tr>
					  <td style="width:500px; color:red; font-weight:bold; font-size:14px">No Record Found for Supplied Date</td>
                   	</tr>	
				<? }
			}
			else
			{
				$onDate=date("Y-m-d");
				$sqlis = mysql_query("select * from forex where onDate='$onDate' order by id ASC"); $j=1;
				while(mysql_num_rows($sqlis)<1)
				{
					//$y=date("Y"); $m=date("m");$d=date("d")-$j;
					$dd=date("Y-m-d",strtotime("-$j days"));
					$sqlis=mysql_query("select * from forex where onDate='$dd' order by id ASC");
					$j++;	
				}
				//$data=mysql_query($sqlis); 
				while($dataGet=mysql_fetch_array($sqlis))
				{?>
					
					<tr>
					  <td valign="top" height="26" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$dataGet['currency'];?></td>
					  
					  <td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$dataGet['unit'];?></td>
					  <td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$dataGet['below50'];?></td>
					  <td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$dataGet['above50'];?></td>
					  <td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$dataGet['tc'];?></td>
					  <td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$dataGet['sp'];?></td>
					  <td valign="top" bgcolor="#F1F1F1" align="center" style="border-bottom:1px #fff solid;"><?=$dataGet['cp'];?></td>
					</tr>
				
				<? $i++; }
			}?>
          
     	</tbody>
   	</table>
                                         
                      
	<blockquote>
  <p><strong style="language:en-US;margin-top:0pt;margin-bottom:0pt;margin-left:0in;text-indent:0in;">Note:</strong>
  </p>
  <ul>
    <li><span style="font-family:Calibri; font-size:9.0pt; font-weight:normal; ">The above  exchange rates are applicable for buy/sale upto USD 2,000 or equivalent. All  concerned are&nbsp; </span><span style="language:en-US;margin-top:0pt;margin-bottom:0pt;margin-left:0in;text-indent:0in;">requested to  obtain the exchange rates from the Treasury Department for buy/sale in  excess&nbsp; of USD 2,000 or </span><span style="language:en-US;margin-top:0pt;margin-bottom:0pt;margin-left:0in;text-indent:0in;"> equivalent.  Furthermore, all concerned&nbsp; are also  requested to note that the above exchange rates may change </span><span style="language:en-US;margin-top:0pt;margin-bottom:0pt;margin-left:0in;text-indent:0in;"> any time  during the business day without prior notice and changes shall be advised  accordingly.</span><span style="font-family:Calibri; font-size:9.0pt; font-weight:normal; ">
</span></li>
    <li><span style="language:en-US;margin-top:0pt;margin-bottom:0pt;margin-left:0in;text-indent:0in;">We will  provide only NPR against the purhase of cash foreign currencies other than than  USD, GBP, JPY, EUR. </span><span style="font-family:Calibri; font-size:9.0pt; font-weight:normal; ">
</span></li>
    <li><span style="language:en-US;margin-top:0pt;margin-bottom:0pt;margin-left:0in;text-indent:0in;">* This  rate is inclusive of service charge.</span><span style="font-family:Calibri; font-size:9.0pt; font-weight:normal; ">
</span></li>
  </ul>
</blockquote>


</div>