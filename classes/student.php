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
	private $state;

	public function getState() {
		if ($this->state) {
			return $this->state;
		}
		$sql = 'SELECT new_state FROM '._SQL_PREFIX_.'log WHERE id_student = ? ORDER BY date_add DESC';
		//dnd($sql);
		$params = array($this->id_student, $this->id_student);
		$this->state = new state(Database::selectRow($sql, $params)['new_state']);
		return $this->state;
	}
	public function changeState($state_id) {
		if (!isset($state_id) || empty($state_id) || !is_numeric($state_id))
			return false;
		$current_state = $this->getState();
		$options = $current_state->getOptions();
		foreach ($options as $value) {
			if ($value->id_state == $state_id) {
				// Valid transition. Change state and return
				$sql = 'INSERT INTO '._SQL_PREFIX_.'log (id_student, new_state) VALUES (?, ?)';
				$params = array($this->id_student, $state_id);
				Database::insert($sql, $params);
				return true;
			}
		}
		return false;

	}
	public function updatePassword($password) {
		$password_hash = password_hash($password, PASSWORD_DEFAULT);
		$sql = "UPDATE "._SQL_PREFIX_."logins SET password=? WHERE id_student = ?";
		$params = array($password_hash, $this->id_student);
		Database::update($sql, $params);
	}
}
?>