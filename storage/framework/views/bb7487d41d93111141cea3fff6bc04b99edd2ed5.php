<?php
$void = 'javascript:void(0)';
$title = 'Profile';
?>


<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('content'); ?>
 <?php echo $__env->make('banner-2',['title' => $title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 <div class="row" style="padding-top: 20px; padding-left: 20px;">
 <div class="col-md-6 col-md-push-3">
            <div class="border-1px p-25">
              <h4 class="text-theme-colored text-uppercase m-0">Edit Profile Information</h4>
              <div class="line-bottom mb-30"></div>
              <p>Your data is very important to secure. Don't worry, all your data is encrypted!</p>
              <form id="profile-form" class="mt-30" method="post" action="<?php echo e(url('profile')); ?>" novalidate="novalidate">
                <?php echo csrf_field(); ?>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group mb-10">
                      <span class="control-label">First Name</span>
                      <input name="fname" class="form-control" type="text" required="" placeholder="First Name" value="<?php echo e($user['fname']); ?>" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group mb-10">
                      <span class="control-label">Last Name</span>
                      <input name="lname" class="form-control" type="text" required="" placeholder="Last Name" value="<?php echo e($user['lname']); ?>" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <span class="control-label">Email address</span>
                      <input name="email" class="form-control required email" type="email" placeholder="Email address" value="<?php echo e($user['email']); ?>" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <span class="control-label">Verified</span>
                      <p class="form-control-plaintext"><?php echo e(strtoupper($user['verified'])); ?></p>
                    </div>
                  </div>
                 
                <div class="form-group mb-0 mt-20">
                  <input name="form_botcheck" class="form-control" type="hidden" value="">
                  <button type="submit" class="btn btn-dark btn-theme-colored" data-loading-text="Please wait...">Submit</button>
                </div>
              </form>
              <!-- Appointment Form Validation-->
              <script type="text/javascript">
                $("#appointment_form").validate({
                  submitHandler: function(form) {
                    var form_btn = $(form).find('button[type="submit"]');
                    var form_result_div = '#form-result';
                    $(form_result_div).remove();
                    form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                    var form_btn_old_msg = form_btn.html();
                    form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                    $(form).ajaxSubmit({
                      dataType:  'json',
                      success: function(data) {
                        if( data.status == 'true' ) {
                          $(form).find('.form-control').val('');
                        }
                        form_btn.prop('disabled', false).html(form_btn_old_msg);
                        $(form_result_div).html(data.message).fadeIn('slow');
                        setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                      }
                    });
                  }
                });
              </script>
            </div>
          </div>
 </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/repos/fidelity-instant/resources/views/profile.blade.php ENDPATH**/ ?>