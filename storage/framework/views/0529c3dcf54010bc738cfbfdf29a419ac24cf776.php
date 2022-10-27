<!doctype html>
<html dir="ltr" lang="en" style="" class="js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths no-mobile">
<head>
<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="description" content="FidelityInstant - Cryptocurrency Investment and Asset Management for Businesses">
<meta name="keywords" content="bitcoin, fidelity, fidelity bank, blockchain, coin currency, crypto currency, currency, Currency Exchange, digital currency, exchange, exchange currency,litecoin, online wallet,">
<meta name="author" content="FidelityInstant">

<!-- Page Title -->
<title><?php echo $__env->yieldContent('title'); ?> | FidelityInstant - Cryptocurrency Investment and Asset Management for Businesses</title>

<!-- Favicon and Touch Icons -->
<link href="images/favicon.png" rel="shortcut icon" type="image/png">
<link href="images/apple-touch-icon.png" rel="apple-touch-icon">
<link href="images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
<link href="images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
<link href="images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

<!-- Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<link href="css/css-plugin-collections.css" rel="stylesheet">
<!-- CSS | menuzord megamenu skins -->
<link href="css/menuzord-megamenu.css" rel="stylesheet">
<link id="menuzord-menu-skins" href="css/menuzord-skins/menuzord-boxed.css" rel="stylesheet">
<!-- CSS | Main style file -->
<link href="css/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

<!-- Revolution Slider 5.x CSS settings -->
<link href="js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css">
<link href="js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css">
<link href="js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css">

<!-- CSS | Theme Color -->
<link href="css/colors/theme-skin-color-set2.css" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="js/jquery-plugin-collection.js"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

<!-- SweetAlert -->
<link href="lib/sweet-alert/sweetalert2.css" rel="stylesheet" type="text/css">
<script src="lib/sweet-alert/sweetalert2.js"></script>

<!-- MMM -->
<script src="js/helpers.js"></script>
<script src="js/mmm.js"></script>

<?php echo $__env->yieldContent('styles'); ?>
<?php echo $__env->yieldContent('scripts'); ?>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style id="fit-vids-style">.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style>
</head>

<body class="">
<div id="wrapper" class="clearfix">
  <!-- preloader -->
  <div id="preloader" style="display: none;">
    <div id="spinner">
      <div class="preloader-dot-loading">
        <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
      </div>
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
  </div>
  <?php
   $signup = isset($xx) ? $xx : false;
  ?>
  <?php echo $__env->make('header',['user' => $user,'signup' => $signup], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  

   <!--------- Session notifications-------------->
   <?php
               $pop = ""; $val = "";
               
               if(isset($signals))
               {
                  foreach($signals['okays'] as $key => $value)
                  {
                    if(session()->has($key))
                    {
                  	$pop = $key; $val = session()->get($key);
                    }
                 }
              }
              
             ?> 

                 <?php if($pop != "" && $val != ""): ?>
                   <?php echo $__env->make('session-status',['pop' => $pop, 'val' => $val], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                 <?php endif; ?>
        	<!--------- Input errors -------------->
                    <?php if(count($errors) > 0): ?>
                          <?php echo $__env->make('input-errors', ['errors'=>$errors], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                     <?php endif; ?>

  <!-- Start main-content -->
  <div class="main-content">
    <?php echo $__env->yieldContent('content'); ?>
  </div>

  <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <a class="scrollToTop" href="#" style="display: none;"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="js/custom.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
      (Load Extensions only on Local File Systems ! 
       The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>



<!-- Modal: Bootstrap Parent Modal Starts -->
<div class="modal fade" id="BSParentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      </div>
    </div>
  </div>
</div>
<!-- Modal: Bootstrap Parent Modal Ends -->

<!-- Login Popup -->
<section id="login-popup" class="">
  <div class="container position-relative p-0 mt-90" style="max-width: 570px;">
    <h3 class="bg-theme-colored2 p-15 pt-10 mt-0 mb-0 text-white">Login Form</h3>
    <div class="section-content bg-white p-30">
      <div class="row">
        <div class="col-md-12">
          <!-- Login Form -->
          <form id="login-form" name="login-form" class="reservation-form mb-0 bg-silver-light p-30" method="post" action="<?php echo e(url('login')); ?>" novalidate="novalidate">
           <?php echo csrf_field(); ?>

           <h3 class="text-center mt-0 mb-30">login to your registered account!</h3>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group mb-30">
                  <input placeholder="Email" id="login-email" name="email" class="form-control" required="" aria-required="true" type="text">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group mb-30">
                  <input placeholder="Enter Name" id="login-password" name="password" required="" class="form-control" aria-required="true" type="password">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group mb-0 mt-0">
                  <input name="form_botcheck" class="form-control" value="" type="hidden">
                  <button id="login-btn" class="btn btn-colored btn-block btn-theme-colored2 text-white btn-lg btn-flat" data-loading-text="Please wait...">Submit Now</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <button title="Close (Esc)" type="button" class="mfp-close font-36">x</button>
  </div>
</section>
<!-- Login Popup End -->

<!-- Register Popup -->
<section id="register-popup" class="">
  <div class="container position-relative p-0 mt-90" style="max-width: 700px;">
    <h3 class="bg-theme-colored2 p-15 pt-10 mt-0 mb-0 text-white">Register Form</h3>
    <div class="section-content bg-white p-30">
      <div class="row">
        <div class="col-md-12">
          <!-- Register Form Starts -->
          <form id="reservation_form_popup" name="reservation_form" class="reservation-form mb-0 bg-silver-light p-30" method="post" action="<?php echo e(url('signup')); ?>" novalidate="novalidate">
          <?php echo csrf_field(); ?> 
           <h3 class="text-center mt-0 mb-30">Register here a new account!</h3>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group mb-30">
                  <input placeholder="First name" id="signup-fname" name="fname" required="" class="form-control" aria-required="true" type="text">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group mb-30">
                  <input placeholder="Last name" id="signup-lname" name="lname" required="" class="form-control" aria-required="true" type="text">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group mb-30">
                  <input placeholder="Email address" id="signup-email" name="email" class="form-control" required="" aria-required="true" type="text">
                </div>
              </div>
             
              <div class="col-sm-12">
                <div class="form-group mb-30">
                  <input placeholder="Enter Your Password" id="signup-password" name="password" required="" class="form-control" aria-required="true" type="password">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group mb-30">
                  <input placeholder="Confirm Password" id="signup-confirm-password" name="password_confirmation" required="" class="form-control" aria-required="true" type="password">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group mb-0 mt-0">
                  <input name="form_botcheck" class="form-control" value="" type="hidden">
                  <button type="submit" class="btn btn-colored btn-block btn-theme-colored2 text-white btn-lg btn-flat" data-loading-text="Please wait...">Submit Now</button>
                </div>
              </div>
              
            </div>
          </form>
        </div>
      </div>
    </div>
    <button title="Close (Esc)" type="button" class="mfp-close font-36">x</button>
  </div>
</section>
<!-- Register Popup End -->

<?php echo $__env->yieldContent('popups'); ?>

</body>
</html>

<?php /**PATH /Users/mac/repos/fidelity-instant/resources/views/layout.blade.php ENDPATH**/ ?>