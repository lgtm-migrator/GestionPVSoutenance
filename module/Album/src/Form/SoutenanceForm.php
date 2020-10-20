<?php
namespace Album\Form;

use Laminas\Form\Form;

class SoutenanceForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('soutenance');

        $this->add([
            'name' => 'matricule',
            'type' => 'text',
            'options' => [
                'label' => 'Matricule de l\'étudiant',
            ],
        ]);
        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'dateSoutenance',
            'type' => 'text',
            'options' => [
                'label' => 'Date de la soutenance',
            ],
        ]);
        $this->add([
            'name' => 'codeSoutenance',
            'type' => 'text',
            'options' => [
                'label' => 'Code de la soutenance',
            ],
        ]);
        $this->add([
            'name' => 'codeJury',
            'type' => 'text',
            'options' => [
                'label' => 'Code du jury',
            ],
        ]);
        $this->add([
            'name' => 'heureSoutenance',
            'type' => 'text',
            'options' => [
                'label' => 'Heure de la soutenance',
            ],
        ]);
        $this->add([
            'name' => 'themeSoutenance',
            'type' => 'text',
            'options' => [
                'label' => 'Thème de la soutenance',
            ],
        ]);
         $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Programmer la soutenance',
                'id'    => 'submitbutton',
            ],
        ]);
    }
}