<style> .tariff td{ border-top:none; padding:4px;} </style>
<div class="content">

		<div class="contentHdr">
			<h2>Air Cargo Tariff (176th Edition - Effective from 1 October 2011</h2>
		</div>
        
        <table width="909" height="247" summary="Cargo Tariff" id="rounded-corner" class="tariff">
    		
            <thead>
          
        		<tr>
                
                  <td height="5" bgcolor="#FFFFFF" align="left" colspan="4">
                    <div id="searchwrapper">
                      <form method="post" action="">
                        <input type="text" value="" id="keyword" name="country"  placeholder="search country" style="border:2px solid #00C; border-radius:8px; padding:2px 4px">
                        <input type="submit" name="search" value="Search" style="border-radius:8px; background:#AE8224; padding:2px 10px; border:none; cursor:pointer">
                        </form>
                      </div>
                  </td>
                  
                  <td height="5" bgcolor="#FFFFFF" align="right" colspan="7">
                      <form method="get" action="tariff.php">
                        Display Pages
                        <select onchange="submit();" name="setLimit">
                                        <option value="2">
                            2                </option>
                                        <option value="3">
                            3                </option>
                                        <option value="4">
                            4                </option>
                                        <option value="5">
                            5                </option>
                                        <option value="6">
                            6                </option>
                                        </select>
                      </form>
                  </td>
                  
          		</tr>
                <tr><td>&nbsp; </td></tr>
                
      
      			<tr>
                    <th width="96" height="7" bgcolor="#FFFFFF" align="left"><strong>Id</strong></th>
                    <th width="132" bgcolor="#FFFFFF" align="left"><strong>Destination</strong></th>
                    <th width="101" bgcolor="#FFFFFF" align="left"><strong>Country</strong></th>
                    <th width="111" bgcolor="#FFFFFF" align="left"><strong>Code</strong></th>
                    <th width="96" bgcolor="#FFFFFF" align="left"><strong>Minimum</strong></th>
                    <th width="73" bgcolor="#FFFFFF" align="left"><strong>&lt;45</strong></th>
                    <th width="73" bgcolor="#FFFFFF" align="left"><strong>&gt;45</strong></th>
                    <th width="50" bgcolor="#FFFFFF" align="left"><strong>100</strong></th>
                    <th width="50" bgcolor="#FFFFFF" align="left"><strong>250</strong></th>
                    <th width="49" bgcolor="#FFFFFF" align="left"><strong>300</strong></th>
                    <th width="59" bgcolor="#FFFFFF" align="left"><strong>500</strong></th>
             	</tr>
      
      		</thead>
          	
      
      		<tbody>
            	<?php
				if(isset($_GET['setLimit']) and isset($_GET['page']))
				{
					echo "hi";
					$setLimit=$_GET['setLimit']; $page=$_GET['page'];
				}
				else if($_GET['setLimit'])
				{
					$setLimit=$_GET['setLimit']; $page=1;	
				}
				else
				{
					$setLimit=5; $page=1;
				}
				$no = mysql_query("SELECT * FROM tariff");
				$n=mysql_num_rows($no);
				$noofpages=ceil($n/$setLimit); //echo $n; echo " 1";
				
				$start=$page*$setLimit-$setLimit;
				
				if(!isset($_POST['search']))
				{
					$sql = "SELECT * FROM tariff order by country ASC limit $start,$setLimit"; echo $sql;
				}
				else
				{
					$country=$_POST['country'];
					$sql="select * from tariff where country like '%$country%' order by country ASC limit $start,$setLimit";
				}
				//echo $sql;
				$counter=0;
				$result=mysql_query($sql);
				if(mysql_num_rows($result)<1){?> <tr><th style="width:250px; color:red; font-size:14px; padding-top:10px;">No Result Found</th></tr><? }
				while($row = $conn -> fetchArray($result))
				{?>
                    <tr>
                      <td align="left"><?=$row['tid'];?></td>
                      <td align="left"><?=$row['destination'];?></td>
                      <td align="left"><?=$row['country'];?></td>
                      <td align="left"><?=$row['code'];?></td>
                      <td align="left"><?=$row['minimum'];?></td>
                      <td align="left"><?=$row['less45'];?></td>
                      <td align="left"><?=$row['more45'];?></td>
                      <td align="left"><?=$row['hundred'];?></td>
                      <td align="left"><?=$row['two50'];?></td>
                      <td align="left"><?=$row['three100'];?></td>
                      <td align="left"><?=$row['five100'];?></td>
                    </tr>
				<? }?>              
          	</tbody>
            
            <tfoot>
            
                <tr>
                
                  <td align="left" class="rounded-foot-left" colspan="11">
                  	<?
					for($j=1;$j<=$noofpages;$j++)
					{?>
						| <a href="?action=tariff&setLimit=5&page=<?=$j;?>"><?=$j;?></a> ||
					<? }?>
                    <a href="?action=tariff&setLimit=5&page=<?=$page+1;?>">Next</a> |
                  	            		
                     <em><br>
                    <br></em>
                    <h5><strong>Note:</strong></h5>
                    <ul>
                      <li>              Please note that attached rates is in NPR/Kg only.</li>
                      <li>Rates are fixed as per the IATA and are applicable to all the Airlines except Lufthansa Air Cargo.</li>
                      <li>The rates are subject to change without prior notice.<br>
                        </li>
                      <li>The construction exchange rate against Nepalese rupees will be 72.85600.<br>
                        </li>
                      <li>Airline charge is US$ 20.00 per shipment as a DBC fee on freight collect basis. ( The rate may differ with other Airlines)<br>
                        </li>
                      <li>Fuel and security Surcharge will be extra and it differ from Airlines to Airlines.<br>
                        <br>
                        </li>
                      <li>The Airlines follow the IATA rules with regards to the gross and volumetric weight and charge on the basis whichever is higher. BxWxH(cm3 divided by 6000=Volumetric weight (kgs).</li>
                    </ul>
               	  </td>
              	
                </tr>
                  
            </tfoot>

		</table>
       
</div>