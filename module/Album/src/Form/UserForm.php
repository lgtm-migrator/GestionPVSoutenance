<?php
namespace Album\Form;

use Laminas\Form\Form;

class UserForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('user');

         $this->add([
            'name' => 'login',
            'type' => 'text',
            'options' => [
                'label' => 'Identifiant',
            ],
        ]);
        $this->add([
            'name' => 'pass',
            'type' => 'text',
            'options' => [
                'label' => 'Mot de passe',
            ],
        ]);
        
         $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Connexion',
                'id'    => 'submitbutton',
            ],
        ]);
    }
}