<?php

require './../../../config.php';
// Required: anonymous function reference number as explained above.
$funcNum = $_GET['CKEditorFuncNum'] ;

// Check the $_FILES array and save the file. Assign the correct path to a variable ($url).
//$url = '/path/to/uploaded/file.ext';
require './image-upload.php';
// Usually you will only assign something here if the file could not be uploaded.


echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";