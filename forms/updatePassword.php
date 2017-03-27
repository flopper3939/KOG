<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wrapper.php');
$CSRF = CSRF::checkToken($_POST);
if ($CSRF != 0) {
	// Previous page
	header('Location: '._HOST_.'/page/mysite');
}
?>