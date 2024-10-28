<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
  <div style="margin:50px auto;width:70%;padding:20px 0">
    <div style="border-bottom:1px solid #eee">
      <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600"><?php echo e(config('settingConfig.config_store_name')); ?></a>
    </div>
    <p style="font-size:1.1em">Hi,</p>
    <p>Use the following OTP to complete your forgot password procedures. OTP is valid for 5 minutes</p>
    <h2 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;"><?php echo e($otp); ?></h2>
    <p style="font-size:0.9em;">Regards,<br /><?php echo e(config('settingConfig.config_store_name')); ?></p>
    <hr style="border:none;border-top:1px solid #eee" />
    <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
      <p><?php echo e(config('settingConfig.config_store_name')); ?> Inc</p>
      <p><?php echo e(config('settingConfig.config_address')); ?></p>
    </div>
  </div>
</div>
<?php /**PATH /home/u298273519/domains/vidhyarthigeethavali.com/public_html/uesi/resources/views/admin/emails/forgotPassword.blade.php ENDPATH**/ ?>