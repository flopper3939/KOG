<?php

$perPage = 50;
$page = tools::getValue('pageNum');
$total = 0;
if ($page == '')
	$page = 1;

$SQL = 'SELECT id_student, (SELECT COUNT(*) FROM '._SQL_PREFIX_.'student) AS cnt, first_name, last_name, education FROM '._SQL_PREFIX_.'student LIMIT ?, ?';
$params = array($perPage * ($page -1), $perPage);
$result = Database::select($SQL, $params);

$html = '';
$html .= 
'<table class="table table-striped">
	<tr>
		<th>Image</th>
		<th>Name</th>
		<th>Education</th>
		<th>Go to profile</th>
	<tr>
	';
	foreach ($result as $value) {
		$html .= '<tr>';
		$html .= '<td><img style="width:100px;" src="'._IMG_PATH_.'students/'.$value['id_student'].'.jpg"></td>';
		$html .= '<td>'.$value['first_name']. ' ' . $value['last_name'] . '</td>';
		$html .= '<td>'.$value['education'].'</td>';
		$html .= '<td><a href="'._HOST_.'/page/profile/'.$value['id_student'].'" class="btn btn-primary">Go to profile</a></td>';
		$html .= '</tr>';
		$total = $value['cnt'];
	}
	$html .= '</table>';
	echo $html;


echo '<div id="page-nav"></div>';
echo '
<script>
$("#page-nav").pagination({
        items: '.$total.',
        itemsOnPage: '.$perPage.',
        cssStyle: "light-theme",
        currentPage: '.$page.',
        onPageClick: function(pageNum) {
        	window.location.href = "'._HOST_.'/page/searchStudents/" + pageNum + "/";
        }
    });
</script>



';


?>