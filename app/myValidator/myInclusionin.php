<?php

namespace App\myValidator;

class myInclusionin
{
	public function validate($key, $value, $arr) {
		if(!array_key_exists($value, $arr)) {
			return "The string $key contains an invalid value";
		}
	}
}