<?php
namespace Album\Controller;

use Album\Model\User;
use Album\Form\UserForm;
use Album\Model\UserTable;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class UserController extends AbstractActionController
{

    private $table;

    // Add this constructor:
    public function __construct(UserTable $table)
    {
        $this->table = $table;
    }
    public function indexAction()
    {
        return new ViewModel([
            'users' => $this->table->fetchAll(),
        ]);
    }



    public function connexionAction()
    {
        $form = new UserForm();
        $form->get('submit')->setValue('Connexion');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $user = new User();
        $form->setInputFilter($user->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $user->exchangeArray($form->getData());
        $this->table->checkUser($user);
        if ( $this->table->checkUser($user)==0){
            return $this->redirect()->toRoute('user', ['action' => 'error']);
        }else return $this->redirect()->toRoute('album');
        /*
        if ( $this->table->checkUser($user)==1){//admin
            return $this->redirect()->toRoute('album');
        } else if ( $this->table->checkUser($user)==2){//
            return $this->redirect()->toRoute('album2');
        }else return $this->redirect()->toRoute('user', ['action' => 'error']);*/
    }

      public function errorAction()
    {
        $form = new UserForm();
        $form->get('submit')->setValue('Connexion');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $user = new User();
        $form->setInputFilter($user->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $user->exchangeArray($form->getData());
        $this->table->checkUser($user);
        if ( $this->table->checkUser($user)==0){
            return $this->redirect()->toRoute('user', ['action' => 'error']);
        }else return $this->redirect()->toRoute('album');
    }

    
}