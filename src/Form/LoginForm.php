<?php
namespace GdproUser\Form;

use Zend\Form\Form;

class LoginForm extends Form
{
    public function __construct() {

        parent::__construct('login');
        $this->init();
    }

    public function init()
    {
        $this->add([
                'name' => 'email',
                'required' => true,
                'options' => [
                    'label' => 'Adresse email'
                ],
                'attributes' => [
                    'type' => 'email'
                ]
            ]);

        $this->add([
                'name' => 'password',
                'options' => [
                    'label' => 'Mot de passe'
                ],
                'attributes' => [
                    'type' => 'password'
                ]
            ]);

        $this->add([
                'name' => 'stayConnected',
                'type' => 'Zend\Form\Element\Checkbox',
                'options' => [
                    'label' => 'Rester connecté',
                    'use_hidden_element' => true,
                    'checked_value' => 1,
                    'unchecked_value' => 0
                ]
            ]);

        $this->add([
                'name' => 'submit',
                'attributes' => [
                    'class' => 'btn btn-primary',
                    'type' => 'submit',
                    'value' => 'soumettre'
                ],
                'value' => 'submit'
            ]);
    }
}