<?php
// Helpers and includes
include_once('/var/www/html/Lux/Core/Helper.php');

$db = new Db("SocialNetwork");
$OUTPUT = new Output();
$REQUEST = new Request();
$collection = $db->selectCollection("Groups");

$update = Helper::updatePermitted($REQUEST);
$update = Helper::subDocUpdate($update, "providers.custom");

$options = Helper::formatOptions($REQUEST);

if($REQUEST->avail("id")){
	$RULES = new Rules(5, "profile");
	$document = $collection->findAndModify($REQUEST->get("id"), $update, $options);
}else{
	$RULES = new Rules(1, "profile");
	$document = $collection->findAndModify($RULES->getId(), $update, $options);
}
$OUTPUT->success(0,$document, null);

?>
