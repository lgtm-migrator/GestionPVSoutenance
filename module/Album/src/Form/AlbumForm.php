<?php
namespace Album\Form;

use Laminas\Form\Form;

class AlbumForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('album');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'nomEtudiant',
            'type' => 'text',
            'options' => [
                'label' => 'Nom',
            ],
        ]);
        $this->add([
            'name' => 'prenomEtudiant',
            'type' => 'text',
            'options' => [
                'label' => 'Prenom',
            ],
        ]);
        $this->add([
            'name' => 'dateNaissance',
            'type' => 'text',
            'options' => [
                'label' => 'Date de naissance',
            ],
        ]);
        $this->add([
            'name' => 'lieuNaissance',
            'type' => 'text',
            'options' => [
                'label' => 'Lieu de Naissance',
            ],
        ]);
        $this->add([
            'name' => 'filiere',
            'type' => 'text',
            'options' => [
                'label' => 'Filiere de formation',
            ],
        ]);
         $this->add([
            'name' => 'sexe',
            'type' => 'text',
            'options' => [
                'label' => 'Sexe de l\'étudiant',
            ],
        ]);
        $this->add([
            'name' => 'matricule',
            'type' => 'text',
            'options' => [
                'label' => 'Matricule',
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