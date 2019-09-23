<?php

namespace App\myValidator;

use App\myValidator\myValidatorInterface;

class myInclusionin implements myValidatorInterface
{
	public function validate($type, $value, $form) {
		$arr = $form->getElements()[$type]->getOptions();
		if(!array_key_exists($value, $arr)) {
			return "The string $type contains an invalid value";
		}
	}
}