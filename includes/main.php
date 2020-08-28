 <section class="" style=" background-color: #eee;    color: #fff;  border-bottom: 1px solid #596f05; border-top:1px solid #eee;">
 <div class="container" style=" width:95%; height:30px;padding-top:2px; " >
							<div class="row ">
							<span style="font-weight: bold; float: left; font-size: 20px; color: #a70707; width: 20%;">News/Notice::</span>
							<marquee  onmouseover="stop()" onmouseout="start()" style="float:left; width: 80%;">
							
							<? $news=$groups->getByParentIdWithLimitAsc(649, 6);
								while($newsGet=$conn->fetchArray($news))
								{
								?>
                                
							 <a href=" <?=$newsGet['urlname'];?>" style="color: #a70707; padding-right:20px;  font-size:16px;">  >> <?=$newsGet['name'];?>
						 <?php } ?>
								</marquee>
                                <div style="clear:both;"></div>
							</div>
					</div>
					</section>

		<section class="fetaure_bottom" style=" background:#eee;    margin-bottom: 20px;">
		<div class="container">
		<div class="row">
		<div class="col-sm-7 col-md-7 col-lg-7">
			<div class="dividerHeading">
			<? $message=$groups->getById(71);
								$messageGet=$conn->fetchArray($message);
								?>
							<h4><span><?=$messageGet['name'];?></span></h4>
						</div>
<div class="about_author">
								
								<div class="welcome_brief"> <p><strong> </strong>
							 <?=substr($messageGet['contents'],0, 400);?>... </p></div>
							<a href=" <?=$messageGet['urlname'];?>"><button class="btn btn-primary" style="  background-color: #fff;  color: #164980; float:right;  font-weight: 400 !important">Read More</button></a>
							</div>
							</div>
<div class="col-sm-5 col-md-5 col-lg-5">
			<div class="dividerHeading">
			<? $message=$groups->getById(264);
								$messageGet=$conn->fetchArray($message);
								?>
							<h4><span><?=$messageGet['name'];?></span></h4>
						</div>
<div class="about_author">
								<div class="author_desc">
									<img src="<?=CMS_GROUPS_DIR.$messageGet['image'];?>" alt="about author" style="   max-width: 131px;max-height: 131px;">
									<ul class="author_social">
										<li><a class="fb" href="#." data-placement="top" data-toggle="tooltip" title="Facbook"><i class="fa fa-facebook"></i></a></li>
										<li><a class="twtr" href="#." data-placement="top" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
										<li><a class="skype" href="#." data-placement="top" data-toggle="tooltip" title="Skype"><i class="fa fa-skype"></i></a></li>
									</ul>
								</div>
								<div class="author_bio">
									<h3 class="author_name"><a href="<?=$messageGet['urlname'];?>"><?=$messageGet['shortcontents'];?></a></h3>
									
									<p class="author_det">
										<?=substr($messageGet['contents'],0, 600)."...";?>
										</p>
								</div>
							</div>
							</div>
							
					</div>
							
							
					</div>
					</section>
 
		<section class="fetaure_bottom" style="    margin-bottom: 20px;">
		<div class="container">
		<div class="row">
		<div class="col-sm-8 col-md-8 col-lg-8">
			<div class="dividerHeading">
			<? $message=$groups->getById(659);
								$messageGet=$conn->fetchArray($message);
								?>
							<h4><span><?=$messageGet['name'];?></span></h4>
						</div>
<div class="about_author">
								
							
									<h3 class="author_name"><a href="<?=$messageGet['urlname'];?>"><?=$messageGet['shortcontents'];?></a></h3>
									
									<p class="author_det">
										<?=substr($messageGet['contents'],0, 600)."...";?>
										</p>
							
							</div>
							</div>
							  <div class="col-lg-4 col-md-4 col-sm-4">
						<div class="dividerHeading">
							<h4><span>Testimonials</span></h4>
						</div>
						<div id="testimonial-carousel" class="testimonial carousel slide">
							<div class="carousel-inner">
								
								
								<? 
							$a=1;
							$testimo=$groups->getByParentIdWithLimit(398, 5);
								while($testimoGet=$conn->fetchArray($testimo))
								{
								?>
								<div class="<?php if($a==1){echo "active ";} ?>item">
									<div class="testimonial-item">
									
										<div class="icon"><i class="fa fa-quote-right"></i></div>
										<blockquote>
											<p><?=substr($testimoGet['contents'],0, 180)."...";?> </p>
										</blockquote>
										<div class="icon-tr"></div>
										<div class="testimonial-review">
											<img src="<?=CMS_GROUPS_DIR.$testimoGet['image'];?>" alt="testimoni">
											<h1><?=$testimoGet['name'];?>,<small><?=$testimoGet['shortcontents'];?></small></h1>
										</div>
									</div>
								</div>
								<? $a++; } ?>

								
							</div>
							<div class="testimonial-buttons"><a href="#testimonial-carousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>&#32;
							<a href="#testimonial-carousel" data-slide="next"><i class="fa fa-chevron-right"></i></a></div>
						</div>
					</div><!-- TESTIMONIALS END -->
							
					</div>
							
							
					</div>
					</section>
		
				
				<section class="fetaure_bottom">
			<div class="container">
				<div class="row sub_content">
                		<!-- TESTIMONIALS -->
					<div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="dividerHeading">
							
							<h4 style="background: #0a63c4;height: 50px;border-right: 22px solid #033869;width: 100%; border-bottom: none;"><span style="background:none; color:#fff; top:20px;">Facebook</span></h4>
						</div>
					<? $facebook=$groups->getById(490);
								$facebookGet=$conn->fetchArray($facebook)
								?>
                                <?=$facebookGet['shortcontents'];?>
					
<!-- TESTIMONIALS END -->
				</div>
					<div class="col-lg-8 col-md-8 col-sm-8">
					
						<div class="row">
							<div class="col-lg-6  rec_blog">
							<div class="dividerHeading">
							
							<h4 style="background: #0a63c4;height: 50px;border-right: 22px solid #033869;width: 100%; border-bottom: none;"><span style="background:none; color:#fff; top:20px;">Events</span></h4>
						</div>
								<div class="blogPic">
									<div class="news-thumb">
										<div class="swipe" id="slider" style="visibility: visible;">
											<ul class="swipe-wrap" style="">
												<? 
							
							$alumini=$groups->getByParentId(549);
								while($aluminiGet=$conn->fetchArray($alumini))
								{
								?>
												<li>
												      <img alt="" style="width:100%;" src="<?=CMS_GROUPS_DIR.$aluminiGet['image'];?>"> 
															<div class="blogDetail" style="width:100%;">
																<div class="blogTitle">
																	<a href="<?=$aluminiGet['urlname'];?>">
																		<h2><?=$aluminiGet['name'];?></h2>
																	</a>
																	
																
																	<span>
																		<i class="fa fa-user"></i>
																		<?=$aluminiGet['shortcontents'];?>
																	</span>
																</div>
																<div class="blogContent">
																	<p><?=substr($aluminiGet['contents'], 0, 200);?> </p>
																</div>
																
															</div>
												
												</li>
								<?php } ?>
												
											</ul>
											<div class="swipe-navi">
												<div onclick="mySwipe.prev()" class="swipe-left"><i class="fa fa-chevron-left"></i></div> 
												<div onclick="mySwipe.next()" class="swipe-right"><i class="fa fa-chevron-right"></i></div>
											</div>
										</div>
									</div>
							
								</div>
							
							</div>
							
							<div class="col-lg-6  rec_blog">
							<div class="dividerHeading">
							<? $whychose=$groups->getById(491);
								$whychoseGet=$conn->fetchArray($whychose);
								?>
							<h4 style="background: #0a63c4;height: 50px;border-right: 22px solid #033869;width: 100%; border-bottom: none;"><span style="background:none; color:#fff; top:20px;"><a href="<?=$whychoseGet['urlname'];?>"style="color:#fff;"><?=$whychoseGet['name'];?></a></span></h4>
						</div>
								<div class="blogPic">
									
									<div class="blog-hover">
										<a href="<?=$whychoseGet['urlname'];?>">
											<span class="icon">
												<i class="fa fa-link"></i>
											</span>
										</a>
									</div>
								</div>
								<div class="blogDetail" style="width:100%;">
									<div class="blogTitle">
									
											<?=$whychoseGet['shortcontents'];?>
										</a>
										
									</div>
									
									
								</div>
							</div>
						</div>
					</div>
					
			
			</div>
		</section>