<?php
namespace Album\Controller;

use Album\Model\Membre;
use Album\Form\MembreForm;
use Album\Model\MembreTable;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class MembreController extends AbstractActionController
{

    private $table;

    // Add this constructor:
    public function __construct(MembreTable $table)
    {
        $this->table = $table;
    }
    public function indexAction()
    {
        return new ViewModel([
            'membres' => $this->table->fetchAll(),
        ]);
    }
    // liste des étudiants
    public function listeAction()
    {
        return new ViewModel([
            'membres' => $this->table->fetchAll(),
        ]);
    }


    public function addAction()
    {
        $form = new MembreForm();
        $form->get('submit')->setValue('Ajouter');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $membre = new Membre();
        $form->setInputFilter($membre->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $membre->exchangeArray($form->getData());
        $this->table->saveMembre($membre);
        return $this->redirect()->toRoute('listeme');
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        if (0 === $id) {
            return $this->redirect()->toRoute('membre', ['action' => 'add']);
        }

        // Retrieve the album with the specified id. Doing so raises
        // an exception if the album is not found, which should result
        // in redirecting to the landing page.
        try {
            $membre = $this->table->getMembre($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('listed');
        }

        $form = new MembreForm();
        $form->bind($membre);
        $form->get('submit')->setAttribute('value', 'Sauvegarder les modifications');

        $request = $this->getRequest();
        $viewData = ['id' => $id, 'form' => $form];

        if (! $request->isPost()) {
            return $viewData;
        }

        $form->setInputFilter($membre->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return $viewData;
        }

        $this->table->saveMembre($membre);

        // Redirect to album list
        return $this->redirect()->toRoute('listeme');
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('listeme');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'NON');

            if ($del == 'OUI') {
                $id = (int) $request->getPost('id');
                $this->table->deleteMembre($id);
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('listeme');
        }

        return [
            'id'    => $id,
            'membre' => $this->table->getMembre($id),
        ];
    }
}