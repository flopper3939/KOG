<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/wrapper.php');
if (!$context->logged_in)
	die();
echo json_encode(CSRF::getAjaxToken());
?>