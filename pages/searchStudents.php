<?php

$perPage = 50;
$pageNum = tools::getValue('pageNum');
$total = 0;
if ($pageNum == '')
	$pageNum = 1;
$start = $perPage * ($pageNum -1);


$sql = 'SELECT 
s.id_student, (SELECT COUNT(*) FROM '._SQL_PREFIX_.'student) AS cnt, first_name, last_name, t.team_name, education_name 
FROM '._SQL_PREFIX_.'student s 
LEFT JOIN '._SQL_PREFIX_.'education e ON s.id_education = e.id_education
LEFT JOIN '._SQL_PREFIX_.'team_student ts ON s.id_student = ts.id_student
LEFT JOIN '._SQL_PREFIX_.'team t ON t.id_team = ts.id_team
ORDER BY id_student LIMIT ?, ?';
$stmt = Database::getConnection()->prepare($sql);



$params = array($start, $perPage);
$result = Database::select($sql, $params);

if (!$result)
	die("No results!");
$total = $result[0]['cnt'];
$html = '';

$html .= '
<b>Showing: '.($perPage * ($pageNum -1) + 1).' - '.($perPage * $pageNum < $result[0]['cnt'] ? $perPage * $pageNum : $result[0]['cnt']).'</b>

<table class="table table-striped table-responsive">
	<tr>
		<th style="text-align: center;">Image</th>
		<th style="text-align: center;"">Name</th>
		<th style="text-align: center;">Education</th>
		<th style="text-align: center;">Team</th>
		<th style="text-align: center;">Go to profile</th>
	</tr>'."\r\n";
foreach ($result as $value) 
{
	$html .= 
'	<tr>
		<td style="vertical-align: middle;text-align: center;">
			<img style="width:100px;" src="'._IMG_PATH_.'students/'.$value['id_student'].'.jpg">
		</td>
		<td style="vertical-align: middle;text-align: center;">'.$value['first_name']. ' ' . $value['last_name'] . '</td>
		<td style="vertical-align: middle;text-align: center;">'.$value['education_name'].'</td>
		<td style="vertical-align: middle;text-align: center;"><b>'.($value['team_name'] ? $value['team_name'] : "No team defined").'</b></td>
		<td style="vertical-align: middle;text-align: center;">
			<a href="'._HOST_.'/page/profile/'.$value['id_student'].'" class="btn btn-primary">Go to profile</a>
		</td>
	</tr>'."\r\n";
}
$html .= '</table>';
$html .= '
	<div id="page-nav"></div>
	';
$html .= '
<script type="text/javascript">
$("#page-nav").pagination({
        items: '.$total.',
        itemsOnPage: '.$perPage.',
        cssStyle: "light-theme",
        currentPage: '.$pageNum.',
        onPageClick: function(pageNum) {
        	window.location.href = "'._HOST_.'/page/searchStudents/" + pageNum + "/";
        }
    });
</script>



';

echo $html;
?>