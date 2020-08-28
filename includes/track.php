			<div class="content">
            	
						
						
						<div class="mid-grids">
							<div class="mid-grid-double">
                           <?php
						    $type= $_POST['type'];
						     $trackno= $_POST['trackcode'];
							
							 $gettrack="select SQL_CALC_FOUND_ROWS * from cargo where awbno='".$trackno."'   ";
							$gettrackres=mysql_query($gettrack);
							if( mysql_num_rows($gettrackres) > 0){
							$settrack=mysql_fetch_array($gettrackres);
						   ?>
								<h3>Tracking status <?php echo '- '.$settrack['type'] ?></h3>
								
                                <table width="100%" border="0" cellspacing="0" cellpadding="2">
                                
                                <tr>
                                	<td colspan="4" height="20px"></td>
                                  </tr>
                                <tr>
                                	<td colspan="4">
                                    	 <table width="100%" border="0" cellspacing="0" cellpadding="2" bgcolor="#E6E6E6">
                                          <tr>
                                	<td colspan="3" height="10px"></td>
                                  </tr>
                                         	<tr>
                                            <td width="5%" rowspan="3"></td>
                                            <td width="45%">  Awb No : 
                                    <a href="<?php echo $settrack['url']; ?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,top=100,left=100,width=960,height=550');return false;"   />
                                     <strong><?php echo $settrack['awbno']; ?></strong>
                                     </a></strong></td>
                                            <td width="50%"><span style=" font-size:12px; padding:0;"><strong> Ship Date: <?php echo $settrack['shipdate']; ?></strong></span></td>
                                            </tr>
                                            
                                            <tr>
                                           
                                            <td width="45%"> Sender Name : 
                                   
                                     <strong><?php echo $settrack['sname']; ?></strong>
                                     </strong></td>
                                            <td width="50%"><strong> Receiver Name: <?php echo $settrack['rname']; ?></strong></td>
                                            </tr>
                                         	<tr>
                                            <td><span style=" font-size:12px; padding:0;">
                                            <?php if(!($settrack['rnameby']=='')){ ?>
                                            <strong>Received by: <?php echo $settrack['rnameby']; ?></strong></span></td>
                                             <?php }?>
                                            </tr>
                                            
                                             <tr>
                                	<td colspan="3" height="10px"></td>
                                  </tr>
                                         </table>
                                    
                                    
                                    
                                    </td>
                                </tr>
                                <tr>
                                	<td colspan="4" height="10px"></td>
                                  </tr>
                                 
                                 <tr bgcolor="#003E6F" >
                                    	<td width="110" style="padding:10px;  border-bottom:#999 1px solid; color:#fff;"><strong>Status</strong></td>
                                        <td colspan="3" style="padding:10px;color:#fff; border-bottom:#999 1px solid;"> </td>                                    
                                    </tr>
                                  	<tr>
                                    	<td colspan="4">
                                        	<table width="100%" border="0" cellspacing="0" cellpadding="2">
                                         	<tr bgcolor="#CCCCCC">
                                            	<td width="8%" align="center" style="padding:10px"> SN </td>
                                                <td width="24%" style="padding:10px"> Date/ Time</td>
                                                <td width="42%" style="padding:10px">Description </td>
                                                <td width="26%" style="padding:10px"> Location </td>
                                            </tr>
                                          <?php 
										  $counterrr=0;
							   $getcargostat=mysql_query("select * from cargostat where awbno='".$settrack['awbno']."' ");
									while($groupRowstst=mysql_fetch_array($getcargostat)){
										$counterrr++;
							   ?>
                                         <tr>
                                            	<td align="center"> <?php echo $counterrr; ?> </td>
                                                <td> 
												<?php
												$arr = explode("/", $groupRowstst['date']);
												 $date=$arr[0].'-'.$arr[1].'-'.$arr[2];
												//$date=date("M d, Y", mktime(0, 0, 0, $arr[1], $arr[2], $arr[0]));
												//$date = $groupRowstst['date'];
												?>
												
												<?php echo $date.' on  '.$groupRowstst['time']; ?></td>
                                                <td style="font-size:12px;"> <?php echo $groupRowstst['status']; ?> </td>
                                                <td style="font-size:12px;">  <?php echo $groupRowstst['address']; ?> </td>
                                            </tr>
                                         
                                       <?php } ?>  
                                         </table>
                                        </td>
                                    </tr>
                                  
                                  
                                  
                                   
                                </table>
							<?php	}
							else{
							 ?>
                             <h3>Tracking status</h3>
                             <p align="center"> NO result found for your query.</p>
                             <?php } ?>
							</div>
							
							<div class="mid-grid" id="last-grid1">
								<?php include("tracking.php"); ?>
							</div>
							<div class="clear"> </div>
						</div>
						
                        
				</div>
			
		