<?php


namespace App\myValidator;

class isNumeric
{
	public function validate($key, $value) {
		if (!ctype_digit($value)) {
			return "The string $key should contain only numbers";
		}
	}
}