<?php
namespace Album\Form;

use Laminas\Form\Form;

class DirecteurForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('directeur');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'nomDirecteur',
            'type' => 'text',
            'options' => [
                'label' => 'Nom',
            ],
        ]);
        $this->add([
            'name' => 'prenomDirecteur',
            'type' => 'text',
            'options' => [
                'label' => 'Prenom',
            ],
        ]);
        $this->add([
            'name' => 'codeDirecteur',
            'type' => 'text',
            'options' => [
                'label' => 'Code',
            ],
        ]);
        $this->add([
            'name' => 'gradeDirecteur',
            'type' => 'text',
            'options' => [
                'label' => 'Grade',
            ],
        ]);
        $this->add([
            'name' => 'sexeDirecteur',
            'type' => 'text',
            'options' => [
                'label' => 'Sexe',
            ],
        ]);
         $this->add([
            'name' => 'adresseDirecteur',
            'type' => 'text',
            'options' => [
                'label' => 'Adresse',
            ],
        ]);
        $this->add([
            'name' => 'domaineDirecteur',
            'type' => 'text',
            'options' => [
                'label' => 'Domaine',
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