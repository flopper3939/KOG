<?php

class state extends objectModel 
{
	public $structure = array
	(
		'id' => 'id_state',
		'fields' => array
		(
			'id_state',
			'state_text',
			'state_color_hex',
			'state_color_text',
			'illegal'
		)
	);
	
	public $state_text;
	public $state_color_hex;
	public $state_color_text;
	public $illegal;
	public $id_state;

	public function getOptions($bypass = false) {
		$sql = 'SELECT id_to_state FROM '._SQL_PREFIX_.'state_transition WHERE id_from_state = ?';
		$params = array ($this->id_state);
		$result = Database::select($sql, $params);
		$states = array();
		foreach ($result as $key => $value) {
			array_push($states, new state($value['id_to_state']));
		}
		return $states;
	}

	public static function getAllState() {
		$sql = 'SELECT id_state FROM '._SQL_PREFIX_.'state';
		$params = array();
		$result = Database::select($sql, $params);
		$arrToReturn = array();
		foreach ($result as $value) {
			array_push($arrToReturn, new state($value['id_state']));
		}
		return $arrToReturn;
	}
}
?>