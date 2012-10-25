<?php

class Comment extends Model {

	static $schema = array(
		'id' => 'int',
		'comment' => 'text'
	);

	function __toString() {
		if (trim($this->name) != '') {
			return $this->name.' ('.$this->email.')';
		} else {
			return $this->email;
		}
	}

}