<section class="" style=" padding:10px;">
        
							<div class="container" style="width:98%;">

							<div class="row ">


							<div class="col-md-12 col-sm-12 col-xs-12 fadeInLeft wow animated animated" style="visibility: visible; animation-name: fadeInLeft;">
		   
            <div id="homeCarousel" class="carousel slide carousel-home" data-ride="carousel">

          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#homeCarousel" data-slide-to="1"></li>
            <li data-target="#homeCarousel" data-slide-to="2"></li>
          </ol>

          <div class="carousel-inner" role="listbox">

		  <?php
		  $i=1;
	$slide=$groups->getByParentId(480);
	while($slideGet=$conn->fetchArray($slide))
	{?>
		  
            <div class="item <?php if($i==1){echo "active";}?>">

              <img src="<?=CMS_GROUPS_DIR.$slideGet['image'];?>" alt="">

              <div class="container">

                <div class="carousel-caption">

                  <h2 class="carousel-title bounceInDown animated slow"><?=$slideGet['shortcontents'];?></h2>
                  
                 
                </div> <!-- /.carousel-caption -->

              </div>

            </div> <!-- /.item -->

	<?php $i++;} ?>
           




           

          </div>

          <a class="left carousel-control" href="#homeCarousel" role="button" data-slide="prev" style="    background: #164980;
    height: 80px;
    width: 40px;
    top: 50%;
    margin-top: -40px;
    -moz-transition: width, 0.3s;
    -o-transition: width, 0.3s;
    -webkit-transition: width, 0.3s;
    transition: width, 0.3s;" >
            <span class="fa fa-angle-left" aria-hidden="true" style=" font-size: 2.5em; padding-top: 12px; display: inline-block;
   
   
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    transform: translate(0, 0);"></span>
            <span class="sr-only">Previous</span>
          </a>

          <a class="right carousel-control" href="#homeCarousel" role="button" data-slide="next" style="background: #164980;
    height: 80px;
    width: 40px;
    top: 50%;
    margin-top: -40px;
    -moz-transition: width, 0.3s;
    -o-transition: width, 0.3s;
    -webkit-transition: width, 0.3s;
    transition: width, 0.3s;">
            <span class="fa fa-angle-right" aria-hidden="true" style="    font-size: 2.5em; padding-top: 12px;     display: inline-block;
    
   
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    transform: translate(0, 0);"></span>
            <span class="sr-only">Next</span>
          </a>

    </div><!-- /.carousel -->
    </div>
   
    </div>
    </div>
    </section>
