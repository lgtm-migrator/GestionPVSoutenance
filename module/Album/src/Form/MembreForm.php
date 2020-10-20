<?php
namespace Album\Form;

use Laminas\Form\Form;

class MembreForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('membre');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'nomInvite',
            'type' => 'text',
            'options' => [
                'label' => 'Nom',
            ],
        ]);
        $this->add([
            'name' => 'prenomInvite',
            'type' => 'text',
            'options' => [
                'label' => 'Prenom',
            ],
        ]);
        $this->add([
            'name' => 'codeInvite',
            'type' => 'text',
            'options' => [
                'label' => 'Code',
            ],
        ]);
        $this->add([
            'name' => 'gradeInvite',
            'type' => 'text',
            'options' => [
                'label' => 'Grade',
            ],
        ]);
        $this->add([
            'name' => 'sexeInvite',
            'type' => 'text',
            'options' => [
                'label' => 'Sexe',
            ],
        ]);
         $this->add([
            'name' => 'adresseInvite',
            'type' => 'text',
            'options' => [
                'label' => 'Adresse',
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