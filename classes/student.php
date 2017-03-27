<?php

class student extends objectModel 
{
	public $id_student;
	public $structure = array(
		'id' => 'id_student',
		'fields' => array(
				'id_student',
				'birth',
				'first_name',
				'last_name',
				'education',
				'active'
			)
		);

	public $birth;
	public $first_name;
	public $last_name;
	public $education;
	public $active;
	public function updatePassword($password) {
		$password_hash = password_hash($password, PASSWORD_DEFAULT);
		$sql = "UPDATE "._SQL_PREFIX_."logins SET password=? WHERE id_student = ?";
		$params = array($password_hash, $this->id_student);
		Database::update($sql, $params);
	}
}
?>