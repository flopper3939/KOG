<?php

abstract class objectModel 
{
	public $structure;
	public $inDB;
	public $date_upd;
	public $date_add;




	public function __construct($_id = 0) {
		if 	(Database::select('SELECT COUNT(*) AS cnt FROM '._SQL_PREFIX_.get_class($this).' WHERE '.$this->structure['id'].' = ? LIMIT 0, 1', array($_id))[0]['cnt'] != 0) {
			$sql = 'SELECT ';
			foreach ($this->structure['fields'] as $key => $field) {
				$sql .= $field . ', ';
			}
			$sql .= 'date_upd, date_add FROM '._SQL_PREFIX_.get_class($this).' WHERE '.$this->structure['id'].' = ? LIMIT 0, 1';
			$result = Database::select($sql, array($_id));
			foreach ($result[0] as $key => $row) {
				$this->$key = $row;
			}
			$this->inDB = true;
		}
		else {
			$this->id = $_id;
			$this->inDB = false;
		}
	}
	function save() {
		// Must be assigned to a variable before called in $this
		$tmp = $this->structure['id'];
		if ($this->$tmp == 0) {
			$sql = 'INSERT INTO '._SQL_PREFIX_.get_class($this).' (';

			foreach ($this->structure['fields'] as $key => $field) {
				if ($field != $tmp)
					$sql .= $field . ', ';
			}
			$sql .= ') VALUES (';
			for($i = 0;$i < count($this->structure['fields']) - 1; $i++) {
				$sql .= '?, ';
			}
			$sql .= ')';

			$params = array();
			foreach ($this->structure['fields'] as $key => $field) {
				if ($field != $tmp)
					array_push($params, $this->$field);
			}
			$this->$tmp = Database::insert($sql, $params);
			$this->inDB = true;
		}
		else {
			$sql = 'UPDATE '._SQL_PREFIX_.get_class($this).' SET ';

			foreach ($this->structure['fields'] as $key => $field) {
				if ($field != $tmp) 
					$sql .= $field . '=?, ';
			}
			$sql = str_lreplace(',', '', $sql);
			$sql .= ' WHERE '.$tmp.'=?';

			$params = array();
			foreach ($this->structure['fields'] as $key => $field) {
				if ($field != $tmp)
					array_push($params, $this->$field);
			}
			array_push($params, $this->$tmp);
			Database::update($sql, $params);
		}
	}
	public function setInactive() {
		Database::update('UPDATE '._SQL_PREFIX_.get_class($this).' SET active=0 WHERE '.$this->structure['id'].'=?', array($this->id));
	}
	public function setActive() {
		Database::update('UPDATE '._SQL_PREFIX_.get_class($this).' SET active=1 WHERE '.$this->structure['id'].'=?', array($this->id));
	}
	public function __toString() {
		// Need to use get_object_vars since it will loop back into the same function if not.
		return (string)var_dump(get_object_vars($this));
	}

}
?>