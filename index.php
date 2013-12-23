<?php

require('php/constants.php');

?>

<!doctype html>
<!--[if lt IE 7]>    <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>     <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>     <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Snapper</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
  </head>
  <body>
<!-- Cobbled together with the help of: http://www.php.net/manual/en/features.file-upload.post-method.php -->
<form enctype="multipart/form-data" action="/php/upload.php" method="POST">
  <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo constant('MAX_FILE_SIZE'); ?>" />
  <!-- Name of input element determines name in $_FILES array -->
  Send this file: <input name="userfile" type="file" />
  <input type="submit" value="Send File" />
</form>
</body>
</html>
