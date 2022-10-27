<?php
$void = 'javascript:void(0)'
?>
<!-- Header -->
  <header id="header" class="header modern-header modern-header-theme-colored">
    <div class="header-top bg-theme-colored sm-text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="widget text-white">
              <i class="fa fa-clock-o text-theme-colored2"></i> Opening Hours:  Mon - Tues : 6.00 am - 10.00 pm, Sunday Closed
            </div>
          </div>
          <div class="col-md-4">
            <div class="widget pull-right flip sm-pull-none">
              <ul class="nav navbar-nav list-bordered language-switcher">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="images/flags/en.png" alt="En"> ENG <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#"><img src="images/flags/fr.png" alt="Fr"> France</a></li>
                    <li><a href="#"><img src="images/flags/de.png" alt="Ge"> Germany</a></li>
                    <li><a href="#"><img src="images/flags/it.png" alt="It"> Italy</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="widget">
              <ul class="list-inline  text-right flip sm-text-center">
                <?php if($user == null): ?>
                <li class="m-0 pl-10"> <a href="#login-popup" id='login-popup-launcher' class="text-white ypp"><i class="fa fa-user mr-5 text-theme-colored2"></i> Login /</a> </li>
                <?php if($signup): ?>
                <li class="m-0 pl-0 pr-10"> 
                  <a href="#register-popup" id='register-popup-launcher' class="text-white ypp"><i class="fa fa-edit mr-5 text-theme-colored2"></i>Register</a> 
                </li>
                <?php endif; ?>
                <?php else: ?>
                <li class="m-0 pl-10"> <a href="<?php echo e(url('dashboard')); ?>" class="text-white"><i class="fa fa-dashboard mr-5 text-theme-colored2"></i> Dashboard</a> </li>
                <li class="m-0 pl-0 pr-10"> 
                  <a href="<?php echo e(url('bye')); ?>" class="text-white"><i class="fa fa-sign-out mr-5 text-theme-colored2"></i>Sign out</a> 
                </li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-middle p-0 bg-lightest xs-text-center pb-30">
      <div class="container pt-20 pb-20">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3">
            <a class="menuzord-brand pull-left flip sm-pull-center mb-15" style="color: #ffae11;" href="<?php echo e(url('/')); ?>">Fidelity Instant</a>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-9">
            <div class="header-widget-contact-info-box sm-text-center">
              <div class="media element contact-info">
                <div class="media-left">
                  <a href="#">
                    <i class="fa fa-envelope text-theme-colored2 font-icon sm-display-block"></i>
                  </a>
                </div>
                <div class="media-body">
                  <a href="#" class="title">Mail Us Today</a>
                  <h5 class="media-heading subtitle">info@fidelityinstant.com</h5>
                </div>
              </div>
              <div class="media element contact-info">
                <div class="media-left">
                  <a href="#">
                    <i class="fa fa-phone-square text-theme-colored2 font-icon sm-display-block"></i>
                  </a>
                </div>
                <div class="media-body">
                  <a href="#" class="title">Call us for more details</a>
                  <h5 class="media-heading subtitle">+(012) 345 6789</h5>
                </div>
              </div>
             
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed" style="z-index: 999; position: absolute; top: 0px;">
        <div class="container">
          <nav id="menuzord" class="menuzord yellow menuzord-responsive"><a href="javascript:void(0)" class="showhide" style="display: inline;"><em></em><em></em></a>
            <ul class="menuzord-menu menuzord-indented scrollable" style="max-height: 400px; display: none;">
              <li class="home"><a href="#"><i class="fa fa-home font-28"></i></a></li>
              <li class="active"><a href="<?php echo e(url('/')); ?>">Home</a></li>
              <li><a href="#">About Us</a> </li>
              <li><a href="#">Blog</a></li>
              <li><a href="javascript:void(0)">Latest</a>
                <div class="megamenu megamenu-bg-img" style="right: 0px; display: none;">
                  <div class="megamenu-row">
                    <div class="col3">
                      <h4 class="megamenu-col-title">Latest News:</h4>
                      <div class="widget">
                        <div class="latest-posts">
                          <article class="post media-post clearfix pb-0 mb-10">
                            <a href="<?php echo e($void); ?>" class="post-thumb"><img alt="" src="http://placehold.it/80x55"></a>
                            <div class="post-right">
                              <h5 class="post-title mt-0 mb-5"><a href="<?php echo e($void); ?>">Post Title Here</a></h5>
                              <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                            </div>
                          </article>
                          <article class="post media-post clearfix pb-0 mb-10">
                            <a href="<?php echo e($void); ?>" class="post-thumb"><img alt="" src="http://placehold.it/80x55"></a>
                            <div class="post-right">
                              <h5 class="post-title mt-0 mb-5"><a href="<?php echo e($void); ?>">Industrial Coatings</a></h5>
                              <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                            </div>
                          </article>
                          <article class="post media-post clearfix pb-0 mb-10">
                            <a href="<?php echo e($void); ?>" class="post-thumb"><img alt="" src="http://placehold.it/80x55"></a>
                            <div class="post-right">
                              <h5 class="post-title mt-0 mb-5"><a href="<?php echo e($void); ?>">Storefront Installations</a></h5>
                              <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                            </div>
                          </article>
                          <article class="post media-post clearfix pb-0 mb-10">
                            <a href="<?php echo e($void); ?>" class="post-thumb"><img alt="" src="http://placehold.it/80x55"></a>
                            <div class="post-right">
                              <h5 class="post-title mt-0 mb-5"><a href="<?php echo e($void); ?>">Industrial Coatings</a></h5>
                              <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                            </div>
                          </article>
                        </div>
                      </div>
                    </div>
                    <div class="col3">
                      <h4 class="megamenu-col-title"><strong>Featured News:</strong></h4>
                      <article class="post clearfix">
                        <div class="entry-header">
                          <div class="post-thumb"> <img class="img-responsive" src="images/blog/1.jpg" alt=""> </div>
                        </div>
                        <div class="entry-content">
                          <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna et sed aliqua</p>
                          <a class="btn btn-dark btn-theme-colored" href="#">read more..</a> </div>
                      </article>
                    </div>
                    <div class="col3">
                      <h4 class="megamenu-col-title">Promotional Offer:</h4>
                      <img src="images/megamenu/megamenu-sale-off.jpg" alt="">
                    </div>
                    <div class="col3">
                      <h4 class="megamenu-col-title">Quick Links:</h4>
                      <ul class="list-dashed list-icon">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Disclaimer</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Copyright Notice</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </li>
               <li class="active pull-right"><a href="tel:+(012) 345 6789" class="font-20 line-height-1"><i class="pe-7s-call mr-10 font-28"></i> +(012) 345 6789</a></li>
            <li class="scrollable-fix"></li></ul>
            <ul class="pull-right sm-pull-nonelist-inline nav-side-icon-list">
              <li>
                <a href="#fullscreen-search-form" id="fullscreen-search-btn"><i class="search-icon text-theme-colored2 fa fa-search"></i></a>
                <div id="fullscreen-search-form">
                  <button type="button" class="close">×</button>
                  <form>
                    <input type="search" value="" placeholder="Search keywords(s)">
                    <button type="submit"><i class="search-icon fa fa-search"></i></button>
                  </form>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header><?php /**PATH /Users/mac/repos/fidelity-instant/resources/views/header.blade.php ENDPATH**/ ?>