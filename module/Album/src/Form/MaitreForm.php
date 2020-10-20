<?php
namespace Album\Form;

use Laminas\Form\Form;

class MaitreForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('maitre');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'nomMaitre',
            'type' => 'text',
            'options' => [
                'label' => 'Nom',
            ],
        ]);
        $this->add([
            'name' => 'prenomMaitre',
            'type' => 'text',
            'options' => [
                'label' => 'Prenom',
            ],
        ]);
        $this->add([
            'name' => 'codeMaitre',
            'type' => 'text',
            'options' => [
                'label' => 'Code',
            ],
        ]);
        $this->add([
            'name' => 'etablissementReference',
            'type' => 'text',
            'options' => [
                'label' => 'Etablissement de reference',
            ],
        ]);
        $this->add([
            'name' => 'sexeMaitre',
            'type' => 'text',
            'options' => [
                'label' => 'Sexe',
            ],
        ]);
         $this->add([
            'name' => 'adresseMaitre',
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