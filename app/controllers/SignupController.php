<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;

use App\Forms\RegisterForm;

use App\myValidator\myValidator;

use App\myValidator\myEmail;
use App\myValidator\maxLength;
use App\myValidator\minLength;
use App\myValidator\isNumeric;
use App\myValidator\myInclusionin;
use App\myValidator\myPresenceOf;

class SignupController extends Controller
{
	public function indexAction()
	{
		$this->view->form = new RegisterForm();	
	}

	public function registerAction()
	{
		$request = new Request();
		$form = new RegisterForm();
		
		if (!$this->request->isPost()){
			return $this->response->redirect('signup');
		}

		// if (!$form->isValid($_POST)) {
		// 	$messages = $form->getMessages();
		// 	foreach ($messages as $message) {
		// 		$this->flashSession->error($message);
		// 	}
		// }

		// var_dump($this->request->getPost());exit;

		$validator = new myValidator();

		$emailValidator = new myEmail();
		$maxLengthValidator = new maxLength();
		$minLengthValidator = new minLength();
		$isNumericValidator = new isNumeric();
		$myInclusioninValidator = new myInclusionin();
		$myPresenceof = new myPresenceof();

		$validator->subscribe($emailValidator, 'email');
		$validator->subscribe($maxLengthValidator, 'name');
		$validator->subscribe($minLengthValidator, 'phone');
		$validator->subscribe($isNumericValidator, 'phone');
		$validator->subscribe($myInclusioninValidator, 'nationality');
		$validator->subscribe($myPresenceof, 'nationality');
		$validator->subscribe($myPresenceof, 'phone');
		$validator->subscribe($myPresenceof, 'name');
		$validator->subscribe($myPresenceof, 'email');


		$messages = $validator->validate($this->request->getPost(), $form);
		
		foreach ($messages as $message) {
			if ($message){
				$this->flashSession->error($message);
			}
		}
        return $this->response->redirect('signup');		
	}
}