<?php
namespace Album\Form;

use Laminas\Form\Form;

class PresidentForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('president');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'nomPresident',
            'type' => 'text',
            'options' => [
                'label' => 'Nom',
            ],
        ]);
        $this->add([
            'name' => 'prenomPresident',
            'type' => 'text',
            'options' => [
                'label' => 'Prenom',
            ],
        ]);
        $this->add([
            'name' => 'codePresident',
            'type' => 'text',
            'options' => [
                'label' => 'Code',
            ],
        ]);
        $this->add([
            'name' => 'gradePresident',
            'type' => 'text',
            'options' => [
                'label' => 'Grade',
            ],
        ]);
        $this->add([
            'name' => 'sexePresident',
            'type' => 'text',
            'options' => [
                'label' => 'Sexe',
            ],
        ]);
         $this->add([
            'name' => 'adressePresident',
            'type' => 'text',
            'options' => [
                'label' => 'Adresse',
            ],
        ]);
        $this->add([
            'name' => 'domainePresident',
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