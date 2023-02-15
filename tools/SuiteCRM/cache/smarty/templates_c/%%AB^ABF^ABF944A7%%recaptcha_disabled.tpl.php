<?php /* Smarty version 2.6.33, created on 2023-02-15 13:57:56
         compiled from /Applications/XAMPP/xamppfiles/htdocs/MIS-platform/tools/SuiteCRM/include/utils/recaptcha_disabled.tpl */ ?>
<?php echo '
<script>

  /**
   * Login Screen Validation
   */
  function validateAndSubmit() {
      generatepwd();
    }

  /**
   * Password reset screen validation
   */
  function validateCaptchaAndSubmit() {
      document.getElementById(\'username_password\').value = document.getElementById(\'new_password\').value;
      document.getElementById(\'ChangePasswordForm\').submit();
    }
</script>
'; ?>