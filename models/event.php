<?php

class Event extends Model {

	static $schema = array(
		'id' => 'int',
		'title' => 'varchar'
	);

	static $relations = array(
		'Comment' => self::ONE_TO_MANY
	);

	function __toString() {
		return $this->title;
	}

}