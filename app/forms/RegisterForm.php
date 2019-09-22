<?php

namespace App\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Submit;

use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\InclusionIn;

class RegisterForm extends Form
{
    public function initialize()
    {

        $name = new Text(
            'name',
            [
                'class' => 'form-control',
                'placeholder' => 'Type your name',
            ]
        );

        $name->addValidator(
            new PresenceOf(['message' => 'The name is required',])
        );

        $phone = new Text(
            'phone',
            [
                'class' => 'form-control',
                'placeholder' => 'Type your phone',
            ]
        );

        $phone->addValidator(
            new PresenceOf(['message' => 'The phone is required',])
        );

        $email = new Text(
            'email',
            [
                'class' => 'form-control',
                'placeholder' => 'Email',
            ]
        );

        $email->addValidator(
            new PresenceOf(['message' => 'The email is required',])
        );

        $email->addValidator(
            new Email(['message' => 'The email is not valid',])
        );

        $nationality = new Select(
            'nationality',
            [
                'RU' => 'Russian',
                'UA' => 'Ukrainian',
                'BY' => 'Belorusian',
            ],
            [
                'useEmpty'   => true,
                'emptyText'  => 'Select one...',
                'emptyValue' => '',
            ]
        );

        $nationality->addValidator(
            new InclusionIn(
                [
                    "message" => "The nationality must be Russian, Ukrainian or Belorusian", 
                    "domain"  => ["RU", "BY", "UA"]
                ]
            )
        );

        $submit = new Submit(
            'submit',
            [
                'value' => 'Register',
                'class' => 'btn btn-primary',
            ]
        );

        $this->add($name);
        $this->add($phone);
        $this->add($email);
        $this->add($nationality);
        $this->add($submit);
    }
}
