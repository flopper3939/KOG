<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wrapper.php');
$CSRF = CSRF::checkToken($_POST);
if ($CSRF != 1) {
	// Return 2 because ajax
	$_SESSION['CTRF_ERROR'] = 1;
	echo 2;
	die();
}
$sql = 'SELECT id, time_from, time_to, day_of_week FROM '._SQL_PREFIX_.'state_transition_rules WHERE id_state_transition = (SELECT id FROM '._SQL_PREFIX_.'state_transition WHERE id_from_state = ? && id_to_state = ?)';
$params = array(tools::getValue("from_state_id"), tools::getValue("to_state_id"));
$result = Database::select($sql, $params);
echo json_encode($result);


?>