<?php
namespace Album;

use Laminas\Router\Http\Segment;

return [

    'router' => [
        'routes' => [
            //connexion
            'user' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/user[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'action'     => 'connexion',
                    ],
                ],
            ],
           
            //route pour les etudiants
            'album' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/album[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\AlbumController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'liste' => [
                'type' =>Segment::class,
                'options' => [
                    'route'    => '/album/liste',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                      
                    ],
                    'defaults' => [
                        'controller' => Controller\AlbumController::class,
                        'action'     => 'liste',
                    ],
                ],
            ],
            //fin route etudiant
            //route pour president de jury
            'president' => [
                'type' =>Segment::class,
                'options' => [
                    'route'    => '/president[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                      
                    ],
                    'defaults' => [
                        'controller' => Controller\PresidentController::class,
                        'action'     => 'add',
                    ],
                ],
            ],
             'listep' => [
                'type' =>Segment::class,
                'options' => [
                    'route'    => '/president/liste',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                      
                    ],
                    'defaults' => [
                        'controller' => Controller\PresidentController::class,
                        'action'     => 'liste',
                    ],
                ],
            ],
            //fin route president
        
             //route pour directeurs de mémoires
            'directeur' => [
                'type' =>Segment::class,
                'options' => [
                    'route'    => '/directeur[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                      
                    ],
                    'defaults' => [
                        'controller' => Controller\DirecteurController::class,
                        'action'     => 'add',
                    ],
                ],
            ],
            'listed' => [
                'type' =>Segment::class,
                'options' => [
                    'route'    => '/directeur/liste',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                      
                    ],
                    'defaults' => [
                        'controller' => Controller\DirecteurController::class,
                        'action'     => 'liste',
                    ],
                ],
            ],
            
             //route pour maitres de stage
            'maitre' => [
                'type' =>Segment::class,
                'options' => [
                    'route'    => '/maitre[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                      
                    ],
                    'defaults' => [
                        'controller' => Controller\MaitreController::class,
                        'action'     => 'add',
                    ],
                ],
            ],
            'listema' => [
                'type' =>Segment::class,
                'options' => [
                    'route'    => '/maitre/liste',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                      
                    ],
                    'defaults' => [
                        'controller' => Controller\MaitreController::class,
                        'action'     => 'liste',
                    ],
                ],
            ],
              //route pour membres invités
            'membre' => [
                'type' =>Segment::class,
                'options' => [
                    'route'    => '/membre[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                      
                    ],
                    'defaults' => [
                        'controller' => Controller\MembreController::class,
                        'action'     => 'add',
                    ],
                ],
            ],
            'listeme' => [
                'type' =>Segment::class,
                'options' => [
                    'route'    => '/membre/liste',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                      
                    ],
                    'defaults' => [
                        'controller' => Controller\MembreController::class,
                        'action'     => 'liste',
                    ],
                ],
            ],

              //route pour jury
            'jury' => [
                'type' =>Segment::class,
                'options' => [
                    'route'    => '/jury[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                      
                    ],
                    'defaults' => [
                        'controller' => Controller\JuryController::class,
                        'action'     => 'add',
                    ],
                ],
            ],
           
            'listej' => [
                'type' =>Segment::class,
                'options' => [
                    'route'    => '/jury/liste',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                      
                    ],
                    'defaults' => [
                        'controller' => Controller\JuryController::class,
                        'action'     => 'liste',
                    ],
                ],
            ],
            //route pour soutenance
            'soutenance' => [
                'type' =>Segment::class,
                'options' => [
                    'route'    => '/soutenance[/:action[/:id][/:matricule][/:codeJury]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                      
                    ],
                    'defaults' => [
                        'controller' => Controller\SoutenanceController::class,
                        'action'     => 'add',
                    ],
                ],
            ],
             'calendar' => [
                'type' =>Segment::class,
                'options' => [
                    'route'    => '/soutenance/calendar',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                      
                    ],
                    'defaults' => [
                        'controller' => Controller\SoutenanceController::class,
                        'action'     => 'calendar',
                    ],
                ],
            ],
            'impression' => [
                'type' =>Segment::class,
                'options' => [
                    'route'    => '/soutenance[/:action[/:id][/:matricule][/:codeJury]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                      
                    ],
                    'defaults' => [
                        'controller' => Controller\SoutenanceController::class,
                        'action'     => 'impression',
                    ],
                ],
            ],
            'listesoutenance' => [
                'type' =>Segment::class,
                'options' => [
                    'route'    => '/soutenance/liste',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                      
                    ],
                    'defaults' => [
                        'controller' => Controller\SoutenanceController::class,
                        'action'     => 'liste',
                    ],
                ],
            ],
             'pdf' => [
                'type' =>Segment::class,
                'options' => [
                    'route'    => '/soutenance[/:action[/:id][/:matricule][/:codeJury]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                      
                    ],
                    'defaults' => [
                        'controller' => Controller\SoutenanceController::class,
                        'action'     => 'pdf',
                    ],
                ],
            ],
        ],
    ],


    'view_manager' => [
        'template_path_stack' => [
            'album' => __DIR__ . '/../view',
        ],
    ],
];





///


