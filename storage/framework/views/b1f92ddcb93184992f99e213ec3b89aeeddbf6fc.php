<?php
$items = [
    [
        'image' => "images/project/3.jpg",
        'title' => "Bitcoin Investment",
        'subtitle' => "We help business improve",
        'url' => "javascript:void(0)",
    ],
    [
        'image' => "images/project/4.jpg",
        'title' => "Bitcoin Investment",
        'subtitle' => "We help business improve",
        'url' => "javascript:void(0)",
    ],
    [
        'image' => "images/project/5.jpg",
        'title' => "Bitcoin Investment",
        'subtitle' => "We help business improve",
        'url' => "javascript:void(0)",
    ],
    [
        'image' => "images/project/1.jpg",
        'title' => "Bitcoin Investment",
        'subtitle' => "We help business improve",
        'url' => "javascript:void(0)",
    ],
    [
        'image' => "images/project/2.jpg",
        'title' => "Bitcoin Investment",
        'subtitle' => "We help business improve",
        'url' => "javascript:void(0)",
    ]
];
?>
<!-- Section: Services -->
<section>
  <div class="container-fluid">
    <div class="section-title text-center">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h2 class="text-uppercase mt-0">Our <span class="text-theme-colored2">Services</span>
          </h2>
          <div class="diamond-line-centered-theme-colored2"></div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem voluptatem obcaecati! <br>ipsum dolor sit Rem autem voluptatem obcaecati </p>
        </div>
      </div>
    </div>
    <div class="row">
       <div class="col-md-12">
         <div class="owl-carousel-4col owl-carousel owl-loaded owl-drag" data-nav="true">
         <?php
          foreach($items as $i)
          {
         ?>
          <div class="item">
                <div class="project-block">
                    <div class="project-thumb">
                      <img alt="" src="<?php echo e($i['image']); ?>">
                      <div class="project-details text-center">
                        <h3 class="text-white"><?php echo e($i['title']); ?></h3>
                        <p class="text-white"><?php echo e($i['subtitle']); ?></p>
                        <a href="<?php echo e($i['url']); ?>" class="btn btn-theme-colored2 btn-sm mt-5">View Details</a>
                      </div>
                    </div>
                </div>
            </div>
         <?php
          }
         ?>
         </div>
       </div>
    </div>
  </div>
</section><?php /**PATH /Users/mac/repos/fidelity-instant/resources/views/home-services.blade.php ENDPATH**/ ?>