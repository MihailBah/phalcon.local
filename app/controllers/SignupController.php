<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;

use App\Forms\RegisterForm;

use App\myValidator\myValidator;

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

		$validator = new MyValidator();
		$messages = $validator->validate($this->request->getPost(), $form);
		
		foreach ($messages as $message) {
			if ($message){
				$this->flashSession->error($message);
			}
		}

        return $this->response->redirect('signup');		
	}
}