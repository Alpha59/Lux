<?php
include_once('/var/www/html/Lux/Core/Helper.php');

$REQUEST = new Request();
$RULES = new Rules(0, "ownership");
$OWNERSHIP = new Ownership($RULES);

$OWNERSHIP->grant($REQUEST);

?>
