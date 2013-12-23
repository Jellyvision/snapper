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

$BASE_DIR = '../';
$DESTINATION_DIR = 'images';

//console_log($_FILES['userfile']);

$files = scandir($BASE_DIR . $DESTINATION_DIR);

$largest_int_found = 0;
foreach($files as $file) {
  $file_chunks = explode('.', $file);
  $int_name = (int)($file_chunks[0]);

  // If the int doesn't convert cleanly back into the original value, the file
  // name wasn't an int and should be skipped.
  if ((string)$int_name !== $file_chunks[0]) {
    continue;
  }

  if ($int_name > $largest_int_found) {
    $largest_int_found = $int_name;
  }
}

$path = $BASE_DIR . $DESTINATION_DIR . '/';
// TODO: Determine $file_suffix by examining the MIME type.
$file_suffix = end(explode('.', $_FILES['userfile']['name']));
$new_file_name = $path . (string)($largest_int_found + 1) . '.' . $file_suffix;

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $new_file_name)) {
  echo 'File uploaded as ' . $new_file_name;
} else {
  die('There was a problem with the uploaded file.');
}

?>
