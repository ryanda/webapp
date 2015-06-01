<?php

class Larapus extends \Eloquent {

	// Add your validation rules here
	public static $rules = [];

	//get rules for updating my replacing :id with $model->id
	public function updateRules() {
		$rules = static::$rules;
		foreach ($rules as $field => $rule) {
			//replace :id with $model->id
			$rules[$field] = str_replace(':id', $this->getKey(), $rule);
		}
		return $rules;
	} 
}