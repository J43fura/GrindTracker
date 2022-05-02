<?php
session_start();
require_once('connection.php');
$image = imagecreatefromstring(base64_decode(str_replace("data:image/png;base64,", "", $_POST['imageData'])));
imagepng("C:/xampp/htdocs/Projects/GrindTracker/Images/yourimage.png");

?>