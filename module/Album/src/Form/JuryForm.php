<?php
namespace Album\Form;

use Laminas\Form\Form;

class JuryForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('jury');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'codeJury',
            'type' => 'text',
            'options' => [
                'label' => 'Code du Jury',
            ],
        ]);
        $this->add([
            'name' => 'codePresident',
            'type' => 'text',
            'options' => [
                'label' => 'Président',
            ],
        ]);
        $this->add([
            'name' => 'codeInvite',
            'type' => 'text',
            'options' => [
                'label' => 'Membre invité',
            ],
        ]);
        $this->add([
            'name' => 'codeMaitre',
            'type' => 'text',
            'options' => [
                'label' => 'Maitre de stage',
            ],
        ]);
        $this->add([
            'name' => 'codeDirecteur',
            'type' => 'text',
            'options' => [
                'label' => 'Directeur de stage',
            ],
        ]);
       
         $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Valider',
                'id'    => 'submitbutton',
            ],
        ]);
    }
}