<?php

// expect:
// $validator = new MyValidator();
// $messages = $validator->validate($this-request->getPost());
// var_dump($messages);
// [ 'some_field' => 'some error',...
// ]
// 
//  1)Имя не больше 70 символов,
//  2)имейл валидный,
//  3)номер телефона не меньше 10 чисел,
//  4)национальность в рамках списка.
//

namespace App\myValidator;

use App\myValidator\myEmail;
use App\myValidator\maxLength;
use App\myValidator\minLength;
use App\myValidator\isNumeric;
use App\myValidator\myInclusionin;

class myValidator
{
	public $error;
	protected $emailValidator;
	protected $maxLengthValidator;
	protected $minLengthValidator;
	protected $isNumericValidator;
	protected $myInclusioninValidator;

	public function __construct(){
		$this->emailValidator = new myEmail();
		$this->maxLengthValidator = new maxLength();
		$this->minLengthValidator = new minLength();
		$this->isNumericValidator = new isNumeric();
		$this->myInclusioninValidator = new myInclusionin();
	}

	public function validate($post, $form){
		
		foreach ($post as $key => $value) {
			$this->error[] = $this->notEmpty($key, $value);
			switch ($key) {
			    case "email":
			        $this->error[] = $this->emailValidator->validate($key, $value);
			        break;
			    case "name":
			        $this->error[] = $this->maxLengthValidator->validate($key, $value);
			        break;
			    case "phone":
			        $this->error[] = $this->minLengthValidator->validate($key, $value);
			        $this->error[] = $this->isNumericValidator->validate($key, $value);
			        break;
			    case "nationality":
			    	$arr = $form->getElements()['nationality']->getOptions();
			    	$this->error[] = $this->myInclusioninValidator->validate($key, $value, $arr);
			    	break;
			}
		}
		return $this->error;
	}

	public function notEmpty($name, $value) {
		if(!strlen($value)) {
			return "String $name cannot be empty";
		}
	}
}
