<?php

namespace App\myValidator;

class myEmail
{
	public function validate($key, $value){

		if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
	    	return "String Email $value is not valid email";
		}
	}
}
