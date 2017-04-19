<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wrapper.php');
$CSRF = CSRF::checkToken($_POST);
if ($CSRF != 1) {
	// Return 2 because ajax
	$_SESSION['CTRF_ERROR'] = 1;
	echo 2;
	die();
}
$new_state = tools::getValue("id_state");
$success = $context->student->changeState($new_state);
echo json_encode(($success ? 1 : 0));
?>