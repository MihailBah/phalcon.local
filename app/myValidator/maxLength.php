<?php

namespace App\myValidator;

class maxLength
{
	public function validate($key, $value, $max=70){
		if(strlen($value) > $max) {
			return "String $key cannot be longer than $max characters";
		}	
	}
}