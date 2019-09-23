<?php

namespace App\myValidator;

use App\myValidator\myValidatorInterface;

class minLength implements myValidatorInterface
{
	public $min = 10;

	public function __construct(...$param){
		if($param){
			$this->min = $param[0];
		}
	}
	
	public function validate($type, $value, $form){
		if(strlen($value) < $this->min) {
			return "String $type cannot be shorter than $this->min characters";
		}	
	}
}