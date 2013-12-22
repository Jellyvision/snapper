<?php

// References:
//
//   http://www.php.net/manual/en/features.file-upload.post-method.php

// http://www.nolte-schamm.za.net/2011/05/php-var_dump-into-error-console_log/
function console_log ($obj) {
  ob_start();
  var_dump($obj);
  $contents = ob_get_contents();
  ob_end_clean();
  error_log($contents);
}

// CONSTANTS
//

$DESTINATION_DIR = '../images';

console_log($_FILES['userfile']);

$new_file_name = $DESTINATION_DIR . '/' . $_FILES['userfile']['name'];

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $new_file_name)) {
  echo 'File uploaded as ' . $new_file_name;
} else {
  die('There was a problem with the uploaded file.');
}

?>
