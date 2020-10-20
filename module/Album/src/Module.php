<?php
namespace Album;

use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\UserTable::class => function($container) {
                    $tableGateway = $container->get(Model\UserTableGateway::class);
                    return new Model\UserTable($tableGateway);
                },
                Model\UserTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\User());
                    return new TableGateway('user', $dbAdapter, null, $resultSetPrototype);
                },
                Model\AlbumTable::class => function($container) {
                    $tableGateway = $container->get(Model\AlbumTableGateway::class);
                    return new Model\AlbumTable($tableGateway);
                },
                Model\AlbumTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Album());
                    return new TableGateway('etudiant', $dbAdapter, null, $resultSetPrototype);
                },
                   //president
                 Model\PresidentTable::class => function($container) {
                    $tableGateway = $container->get(Model\PresidentTableGateway::class);
                    return new Model\PresidentTable($tableGateway);
                },
                Model\PresidentTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\President());
                    return new TableGateway('president', $dbAdapter, null, $resultSetPrototype);
                },
                //diredcteut
                Model\DirecteurTable::class => function($container) {
                    $tableGateway = $container->get(Model\DirecteurTableGateway::class);
                    return new Model\DirecteurTable($tableGateway);
                },
                Model\DirecteurTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Directeur());
                    return new TableGateway('directeur', $dbAdapter, null, $resultSetPrototype);
                },
                //maitre de stage
                Model\MaitreTable::class => function($container) {
                    $tableGateway = $container->get(Model\MaitreTableGateway::class);
                    return new Model\MaitreTable($tableGateway);
                },
                Model\MaitreTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Maitre());
                    return new TableGateway('maitredestage', $dbAdapter, null, $resultSetPrototype);
                },
                //membre invité
                Model\MembreTable::class => function($container) {
                    $tableGateway = $container->get(Model\MembreTableGateway::class);
                    return new Model\MembreTable($tableGateway);
                },
                Model\MembreTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Membre());
                    return new TableGateway('membreinvite', $dbAdapter, null, $resultSetPrototype);
                },
                 //jury
                Model\JuryTable::class => function($container) {
                    $tableGateway = $container->get(Model\JuryTableGateway::class);
                    return new Model\JuryTable($tableGateway);
                },
                Model\JuryTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Jury());
                    return new TableGateway('jury', $dbAdapter, null, $resultSetPrototype);
                   
                },
                //soutenance
                Model\SoutenanceTable::class => function($container) {
                    $tableGateway = $container->get(Model\SoutenanceTableGateway::class);
                    return new Model\SoutenanceTable($tableGateway);
                },
                Model\SoutenanceTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Soutenance());
                    return new TableGateway('soutenance', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\UserController::class => function($container) {
                    return new Controller\UserController(
                        $container->get(Model\UserTable::class)
                    );
                },
                Controller\AlbumController::class => function($container) {
                    return new Controller\AlbumController(
                        $container->get(Model\AlbumTable::class)
                    );
                },
                Controller\PresidentController::class => function($container) {
                    return new Controller\PresidentController(
                        $container->get(Model\PresidentTable::class)
                    );
                },
                Controller\DirecteurController::class => function($container) {
                    return new Controller\DirecteurController(
                        $container->get(Model\DirecteurTable::class)
                    );
                },
                Controller\MaitreController::class => function($container) {
                    return new Controller\MaitreController(
                        $container->get(Model\MaitreTable::class)
                    );
                },
                Controller\MembreController::class => function($container) {
                    return new Controller\MembreController(
                        $container->get(Model\MembreTable::class)
                    );
                },
                Controller\JuryController::class => function($container) {
                    return new Controller\JuryController(
                        $container->get(Model\JuryTable::class),
                        $container->get(Model\PresidentTable::class)//test
                    );
                },
                Controller\SoutenanceController::class => function($container) {
                    return new Controller\SoutenanceController(
                        $container->get(Model\SoutenanceTable::class),
                        $container->get(Model\AlbumTable::class),
                        $container->get(Model\JuryTable::class),
                        $container->get(Model\PresidentTable::class),
                        $container->get(Model\MaitreTable::class)
                    );
                },
            ],
            
        ];
    }

    
}