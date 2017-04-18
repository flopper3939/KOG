<?php

class state extends objectModel 
{

	public $id_state;
	public $structure = array
	(
		'id' => 'id_state',
		'fields' => array
		(
			'id_state',
			'state_text',
			'state_color_hex',
		)
	);
	public function getOptions() {
		$sql = 'SELECT id_to_state FROM '._SQL_PREFIX_.'state_transition WHERE id_from_state = ?';
		$params = array ($this->id_state);
		$result = Database::select($sql, $params);
		$states = array();
		foreach ($result as $key => $value) {
			array_push($states, new state($value['id_to_state']));
		}
		return $states;
	}

	public $state_text;
	public $state_color_hex;
}
?>