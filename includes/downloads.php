 <section class="promo_box">
            <div class="container">
               
				   <? $career=$groups->getByParentId(547);
								while($careerGet=$conn->fetchArray($career)){
								?>
								 <div class="row">
                    <div class="col-sm-9 col-md-9 col-lg-9">
                        <div class="promo_content no-padd">
                            <h3><?=$careerGet['name'];?></h3>
                           
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <a class="btn btn-lg btn-default" href="<?= CMS_FILES_DIR . $careerGet['contents']; ?>">
                            <i class="fa fa-shopping-cart"></i>
                            Downloads
                        </a>
                    </div>
					 </div>
								<?php } ?>
               
            </div>
        </section>