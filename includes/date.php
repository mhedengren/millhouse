<?php
$date = $post["created_on"];
$month = date('M', strtotime($date));
$longmonth = date('F', strtotime($date));
$day = date('j', strtotime($date));
$year = date('Y', strtotime($date));
?>