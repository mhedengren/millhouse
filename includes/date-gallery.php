<?php
//Date to string conversion for index feature.
$date = $post["created_on"];
$month = date('M', strtotime($date));
$day = date('j', strtotime($date));
$year = date('o', strtotime($date));

?>