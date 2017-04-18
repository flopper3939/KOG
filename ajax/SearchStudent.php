<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/wrapper.php');

$perPage = $config['lists']['per_page'];
$pageNum = tools::getValue('pageNum');
$total = 0;
if ($pageNum == '')
	$pageNum = 1;
$start = $perPage * ($pageNum -1);



$query = Tools::getValue("query");
$query = "%".$query."%";
$sql = 'SELECT 
s.id_student, (SELECT COUNT(*) FROM '._SQL_PREFIX_.'student) AS cnt, first_name, last_name, t.team_name, education_name 
FROM '._SQL_PREFIX_.'student s 
LEFT JOIN '._SQL_PREFIX_.'education e ON s.id_education = e.id_education
LEFT JOIN '._SQL_PREFIX_.'team_student ts ON s.id_student = ts.id_student
LEFT JOIN '._SQL_PREFIX_.'team t ON t.id_team = ts.id_team
WHERE CONCAT(s.first_name, " ", s.last_name) LIKE ?
ORDER BY id_student LIMIT ?, ?';




$stmt = Database::getConnection()->prepare($sql);

$params = array($query, $start, $perPage);
$result = Database::select($sql, $params);

echo json_encode($result);
die();

?>