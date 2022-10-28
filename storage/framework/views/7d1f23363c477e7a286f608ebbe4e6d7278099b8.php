<?php
$void = 'javascript:void(0)';
$title = 'Portfolios';
?>


<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('scripts'); ?>
<script src="js/chart.js"></script>
<script>
    $(document).ready(() => {
        console.log({btcLineChartData})
        let btcLineChartObj = document.querySelector('#btc-line-chart').getContext("2d")
       
        let btcLineChart = new Chart(btcLineChartObj).Line(btcLineChartData, {
        responsive: true
      })
    })
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <?php echo $__env->make('banner-2',['title' => $title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 <section>
      <div class="container pt-20 pb-20">
        <div class="esc-heading lr-line left-heading">
          <h4>Select a portfolio</h4>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="vertical-tab">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab16" data-toggle="tab">USD</a></li>
                <li><a href="#tab18" data-toggle="tab">Bitcoin</a></li>
                <li><a href="#tab19" data-toggle="tab">USDT</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-9">
            <div class="tab-content">
              <div class="tab-pane fade in active" id="tab16">
                <div class="row">
                  <div class="row" style="margin-left: 10px;">
                    <div class="col-md-6">
                      Asset Stats
                      <div style="width: 90%" class="text-center">
                        <canvas id="btc-line-chart" height="200" width="200"></canvas>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="thumbnail">
                      <div class="caption">
                       <h3>Thumbnail label</h3>
                       <p>..........</p>
                       <p><a href="#" class="btn btn-dark btn-flat" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                      </div>
                   </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab17">
                <div class="row">
                  <div class="col-md-12">
                    <img class="pull-left flip pr-20" width="300" src="http://placehold.it/155x90" alt="">
                    <p>One Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, iste, architecto ullam tenetur quia nemo ratione tempora consectetur quos minus ut quo nulla ipsa aliquid neque molestias et qui sunt. Odit, molestiae.consectetur adipisicing elit. Quaerat, iste, architecto ullam tenetur quia nemo ratione tempora consectetur quos minus ut quo nulla ipsa aliquid neque molestias et qui sunt. Odit, molestiae.tenetur quia nemo ratione tempora consectetur quos minus ut quo nulla ipsa aliquid neque molestias et qui sunt. Odit, molestiae. molestiae.consectetur adipisicing elit. Quaerat, iste, architecto ullam tenetur quia nemo ratione tempora consectetur quos minus ut quo nulla ipsa aliquid neque molestias et qui sunt. Odit, molestiae.tenetur quia nemo ratione tempora consectetur quos minus ut quo nulla ipsa aliquid neque molestias et qui sunt. Odit, molestiae.</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab18">
                <div class="row">
                  <div class="col-md-12">
                    <img class="pull-left flip pr-20" width="300" src="http://placehold.it/155x90" alt="">
                    <p>One Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, iste, architecto ullam tenetur quia nemo ratione tempora consectetur quos minus ut quo nulla ipsa aliquid neque molestias et qui sunt. Odit, molestiae.consectetur adipisicing elit. Quaerat, iste, architecto ullam tenetur quia nemo ratione tempora consectetur quos minus ut quo nulla ipsa aliquid neque molestias et qui sunt. Odit, molestiae.tenetur quia nemo ratione tempora consectetur quos minus ut quo nulla ipsa aliquid neque molestias et qui sunt. Odit, molestiae. molestiae.consectetur adipisicing elit. Quaerat, iste, architecto ullam tenetur quia nemo ratione tempora consectetur quos minus ut quo nulla ipsa aliquid neque molestias et qui sunt. Odit, molestiae.tenetur quia nemo ratione tempora consectetur quos minus ut quo nulla ipsa aliquid neque molestias et qui sunt. Odit, molestiae.</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab19">
                <div class="row">
                  <div class="col-md-12">
                    <img class="pull-left flip pr-20" width="300" src="http://placehold.it/155x90" alt="">
                    <p>One Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, iste, architecto ullam tenetur quia nemo ratione tempora consectetur quos minus ut quo nulla ipsa aliquid neque molestias et qui sunt. Odit, molestiae.consectetur adipisicing elit. Quaerat, iste, architecto ullam tenetur quia nemo ratione tempora consectetur quos minus ut quo nulla ipsa aliquid neque molestias et qui sunt. Odit, molestiae.tenetur quia nemo ratione tempora consectetur quos minus ut quo nulla ipsa aliquid neque molestias et qui sunt. Odit, molestiae. molestiae.consectetur adipisicing elit. Quaerat, iste, architecto ullam tenetur quia nemo ratione tempora consectetur quos minus ut quo nulla ipsa aliquid neque molestias et qui sunt. Odit, molestiae.tenetur quia nemo ratione tempora consectetur quos minus ut quo nulla ipsa aliquid neque molestias et qui sunt. Odit, molestiae.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>          
        </div>

      </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/repos/fidelity-instant/resources/views/portfolios.blade.php ENDPATH**/ ?>