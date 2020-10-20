<?php
namespace Album\Controller;

use Album\Model\President;
use Album\Form\PresidentForm;
use Album\Model\PresidentTable;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class PresidentController extends AbstractActionController
{

    private $table;

    // Add this constructor:
    public function __construct(PresidentTable $table)
    {
        $this->table = $table;
    }
    public function indexAction()
    {
        return new ViewModel([
            'presidents' => $this->table->fetchAll(),
        ]);
    }
    // liste des étudiants
    public function listeAction()
    {
        return new ViewModel([
            'presidents' => $this->table->fetchAll(),
        ]);
    }


    public function addAction()
    {
        $form = new PresidentForm();
        $form->get('submit')->setValue('Ajouter');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $president = new President();
        $form->setInputFilter($president->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $president->exchangeArray($form->getData());
        $this->table->savePresident($president);
        return $this->redirect()->toRoute('listep');
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        if (0 === $id) {
            return $this->redirect()->toRoute('president', ['action' => 'add']);
        }

        // Retrieve the album with the specified id. Doing so raises
        // an exception if the album is not found, which should result
        // in redirecting to the landing page.
        try {
            $president = $this->table->getPresident($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('liste');
        }

        $form = new PresidentForm();
        $form->bind($president);
        $form->get('submit')->setAttribute('value', 'Sauvegarder les modifications');

        $request = $this->getRequest();
        $viewData = ['id' => $id, 'form' => $form];

        if (! $request->isPost()) {
            return $viewData;
        }

        $form->setInputFilter($president->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return $viewData;
        }

        $this->table->savePresident($president);

        // Redirect to album list
        return $this->redirect()->toRoute('listep');
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('listep');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'NON');

            if ($del == 'OUI') {
                $id = (int) $request->getPost('id');
                $this->table->deletePresident($id);
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('listep');
        }

        return [
            'id'    => $id,
            'president' => $this->table->getPresident($id),
        ];
    }
}