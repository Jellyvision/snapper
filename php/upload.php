<?php

require('constants.php');

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

/**
 * @param {Array} $file An associative array.
 * @return {Bool}
 */
function is_valid_file ($file) {
  $mime_type = $file['type'];

  if ( $mime_type === 'image/png'
    || $mime_type === 'image/jpeg'
    || $mime_type === 'image/gif'
    ) {
    return true;
  }

  return false;
}

/**
 * @param {Array} $file An associative array.
 * @return {string}
 */
function get_file_type_suffix ($file) {
  $mime_type = $file['type'];

  if ($mime_type === 'image/png') {
    return 'png';
  } elseif ($mime_type === 'image/jpeg') {
    return 'jpg';
  } elseif ($mime_type === 'image/gif') {
    return 'gif';
  } else {
    throw new Exception('Valid file array not provided to get_file_type_suffix.');
  }
}

if (!is_valid_file($_FILES['userfile'])) {
  die('Not a valid image file!');
}

// Determine the int value of the last image uploaded
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

// Build new file name
$path = $BASE_DIR . $DESTINATION_DIR . '/';
$file_suffix = get_file_type_suffix($_FILES['userfile']);
$new_file_name = $path . (string)($largest_int_found + 1) . '.' . $file_suffix;

// Save the uploaded file
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $new_file_name)) {
  echo 'File uploaded as ' . $new_file_name;
} else {
  die('There was a problem with the uploaded file.');
}

?>
