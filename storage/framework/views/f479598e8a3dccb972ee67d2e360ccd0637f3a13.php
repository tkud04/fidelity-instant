<?php
$void = 'javascript:void(0)';
$title = 'Dashboard';

$items = [
  [
    'title' => "Portfolios",
    'description' => "View available portfolios",
    'url' => url('portfolios'),
    'buttonTitle' => "View portfolios"
  ],
  [
    'title' => "Transactions",
    'description' => "View inflow and outflow from your assets",
    'url' => url('transactions'),
    'buttonTitle' => "View transactions"
  ],
  [
    'title' => "Profile",
    'description' => "View profile information",
    'url' => url('profile'),
    'buttonTitle' => "View profile"
  ],

];
?>


<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('content'); ?>
 <?php echo $__env->make('banner-2',['title' => $title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 <div class="row multi-row-clearfix" style="padding-top: 20px; padding-left: 20px;">
 <?php
 foreach($items as $i)
 {
 ?>
  <div class="col-sm-6 col-md-4 col-lg-4 mb-30">
    <div class="product" style="border: 1px solid #eee;">
                      <div class="product-thumb"> <img alt="" src="https://placehold.it/255x194" class="img-responsive img-fullwidth">
                        <div class="overlay"></div>
                      </div>
                      <div class="product-details text-center">
                        <a href="#"><h5 class="product-title"><?php echo e($i['title']); ?></h5></a>
                        <div class="price"><?php echo e($i['description']); ?></div>
                        <div class="btn-add-to-cart-wrapper">
                          <a class="btn btn-default btn-xs btn-add-to-cart" href="<?php echo e($i['url']); ?>"><?php echo e($i['buttonTitle']); ?></a>
                        </div>
                      </div>
      </div>
  </div>
 <?php
 }
 ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/repos/fidelity-instant/resources/views/dashboard.blade.php ENDPATH**/ ?>