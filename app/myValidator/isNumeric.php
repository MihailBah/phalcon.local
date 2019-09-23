<?php


namespace App\myValidator;

use App\myValidator\myValidatorInterface;

class isNumeric implements myValidatorInterface
{
	public function validate($type, $value, $form) {
		if (!ctype_digit($value)) {
			return "The string $type should contain only numbers";
		}
	}
}