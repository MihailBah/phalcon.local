<?php

namespace App\myValidator;

use App\myValidator\myValidatorInterface;

class maxLength implements myValidatorInterface
{
	public $max = 70;

	public function __construct(...$param){
		if ($param){
			$this->max = $param[0];
		}
	}

	public function validate($type, $value, $form){
		if(strlen($value) > $this->max) {
			return "String $type cannot be longer than $this->max characters";
		}	
	}
}