<?php
$adminMenu = array
(
		array('pagename' => 'Create new student', 'pagelink' => 'adminCreateStudent')
);
if ($context->admin == 2) {
	array_push($adminMenu, array('pagename' => 'Admin page 2', 'pagelink' => 'adminPage2'));
}

?>