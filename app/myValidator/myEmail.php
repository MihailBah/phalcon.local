<?php

namespace App\myValidator;

use App\myValidator\myValidatorInterface;

class myEmail implements myValidatorInterface
{
	public function validate($type, $value, $form){

		if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
	    	return "String $type - $value is not valid email";
		}
	}
}
