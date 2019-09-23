<?php

namespace App\myValidator;

class myValidator
{
	protected $subscribers;
	protected $errors;
	
	public function subscribe(myValidatorInterface $handler, $type) {
		if (empty($this->subscribers[$type])) {
			$this->subscribers[$type] = [];
		}
		$this->subscribers[$type][] = $handler;
	}

	public function validate($validateData, $form) {
		foreach ($validateData as $type => $value) {
			foreach ($this->subscribers[$type] as $subscriber) {
				$this->errors[] = $subscriber->validate($type, $value, $form);
			}
		}
		return $this->errors;
	}
}