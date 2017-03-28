<?php

class education extends objectModel 
{

	public $structure = array(
		'id' => 'id_education',
		'fields' => array(
				'id_education',
				'education_name',
				'education_time_year',
				'education_time_month'
			)
		);
	public $id_education;
	public $education_name;
	public $education_time_year;
	public $education_time_month;
}
?>