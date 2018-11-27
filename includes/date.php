<?php
//Date to string conversion for index feature.
$date = $feature["created_on"];
$month = date('M', strtotime($date));
$day = date('j', strtotime($date));
?>