<?php
namespace GdproUser\Form;

use Zend\Form\Form;

class LoginForm extends Form
{
    public function __construct()
    {
        parent::__construct('login');

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
    }
}