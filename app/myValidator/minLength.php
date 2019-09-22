<?php

namespace App\myValidator;

class minLength
{
	public function validate($key, $value, $min=10){
		if(strlen($value) < $min) {
			return "String $key cannot be shorter than $min characters";
		}	
	}
}