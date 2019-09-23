<?php

namespace App\myValidator;

interface myValidatorInterface
{
	public function validate($type, $value, $form);
}