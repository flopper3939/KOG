<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wrapper.php');
$CSRF = CSRF::checkToken($_POST);
if ($CSRF != 1) {
	// Return 2 because ajax
	$_SESSION['CTRF_ERROR'] = 1;
	echo 2;
	die();
}
$state_id = tools::getValue("state_id");
$state = new state($state_id);
$state->options = $state->getOptions(true);
$JSON = json_encode($state);
echo $JSON;

