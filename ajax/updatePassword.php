<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wrapper.php');
$CSRF = CSRF::checkToken($_POST);
if ($CSRF != 1) {
	// Return 2 because ajax
	$_SESSION['CTRF_ERROR'] = 1;
	echo 2;
	var_dump($_POST);
	die();
}
$password = tools::getValue('password');
$context->student->updatePassword($password);
echo 1;

?>