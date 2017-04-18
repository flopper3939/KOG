<?php

class student extends objectModel 
{

	public $id_student;
	public $structure = array
	(
		'id' => 'id_student',
		'fields' => array
		(
			'id_student',
			'birth',
			'first_name',
			'last_name',
			'id_education',
			'active'
		)
	);

	 public function __construct ($_id = 0)
    {
        parent::__construct ($_id);
        // Do subclass initialization
    	$sql = 'SELECT email FROM '._SQL_PREFIX_.'logins WHERE id_student = ?';
    	$params = array($_id);
       	$this->email = Database::selectRow($sql, $params)['email'];
    }

	public $birth;
	public $first_name;
	public $last_name;
	public $education;
	public $active;
	public $email;

	public function getState() {
		$sql = 'SELECT new_state FROM '._SQL_PREFIX_.'log l1 WHERE l1.id_student = ? && l1.date_upd = (SELECT MAX(l1.date_upd) FROM '._SQL_PREFIX_.'log l2 WHERE l1.id_student = ?)';
		//dnd($sql);
		$params = array($this->id_student, $this->id_student);
		return new state(Database::selectRow($sql, $params)['new_state']);
	}

	public function updatePassword($password) {
		$password_hash = password_hash($password, PASSWORD_DEFAULT);
		$sql = "UPDATE "._SQL_PREFIX_."logins SET password=? WHERE id_student = ?";
		$params = array($password_hash, $this->id_student);
		Database::update($sql, $params);
	}
}
?>