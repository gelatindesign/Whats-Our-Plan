<?php

class Model {

	static $schema = null,
	       $relations = null;

	const ONE_TO_ONE   = 1,
	      ONE_TO_MANY  = 2,
	      MANY_TO_MANY = 3;

	function __get($name) {

		if (self::$relations) {

			$class = get_class();

			$relation = lcfirst($name);

			// If the relation is directly found
			if (isset(self::$relations[$relation])) {

				// Get the relationship
				$relationship = self::$relations[$relation];

				// One-to-One relationship
				if ($relationship == self::ONE_TO_ONE) {

					// Find the relation by the foreign key in this table
					$this->$name = $relation::findById($this->{$name.'_id'});

				} else {
					$this->$name = null;
				}

			} else {

				foreach (self::$relations as $relation => $values) {
					if (is_array($values)) {
						list($property, $relationship) = $values;
					} else {
						$relationship = $values;
						$property = $relation.'s'; // pluralise
					}

					// If this is the property being looked for
					if ($name == $property) {

						// One-to-Many relationship
						if ($relationship == self::ONE_TO_MANY) {
							$this->$name = $relation::find()->where($class::$table.'_id', $this->id);

						// Many-to-Many
						} elseif ($relationship == self::MANY_TO_MANY) {
							$this->$name = $relation::find()->leftJoin($class::$table.'_to_'.$relation::$table.' as c_to_r',
																	   'c_to_r.'.$class::$table.'_id = '.$this->id)
															->leftJoin($relation::$table.' as r', 'c_to_r.'.$relation::$table.'_id = r.id')
															->select('r.*');
						}
					}
				}

				// Look for ->plural
				$plural = (isset(self::$plural)) ? self::$plural : $class.'s';

				if (isset(self::$relations[$relation])
			}

			return $this->$name;
		}

	}

}