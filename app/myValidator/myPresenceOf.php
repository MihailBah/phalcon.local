<?php

namespace App\myValidator;

use App\myValidator\myValidatorInterface;

class myPresenceOf implements myValidatorInterface
{
	public function validate($type, $value, $form){
		if(!strlen($value)) {
			return "String $type cannot be empty";
		}	
	}
}