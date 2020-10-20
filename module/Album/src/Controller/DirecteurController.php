<?php
namespace Album\Controller;

use Album\Model\Directeur;
use Album\Form\DirecteurForm;
use Album\Model\DirecteurTable;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class DirecteurController extends AbstractActionController
{

    private $table;

    // Add this constructor:
    public function __construct(DirecteurTable $table)
    {
        $this->table = $table;
    }
    public function indexAction()
    {
        return new ViewModel([
            'directeurs' => $this->table->fetchAll(),
        ]);
    }
    // liste des étudiants
    public function listeAction()
    {
        return new ViewModel([
            'directeurs' => $this->table->fetchAll(),
        ]);
    }


    public function addAction()
    {
        $form = new DirecteurForm();
        $form->get('submit')->setValue('Ajouter');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $directeur = new Directeur();
        $form->setInputFilter($directeur->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $directeur->exchangeArray($form->getData());
        $this->table->saveDirecteur($directeur);
        return $this->redirect()->toRoute('listed');
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        if (0 === $id) {
            return $this->redirect()->toRoute('directeur', ['action' => 'add']);
        }

        // Retrieve the album with the specified id. Doing so raises
        // an exception if the album is not found, which should result
        // in redirecting to the landing page.
        try {
            $directeur = $this->table->getDirecteur($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('listed');
        }

        $form = new DirecteurForm();
        $form->bind($directeur);
        $form->get('submit')->setAttribute('value', 'Sauvegarder les modifications');

        $request = $this->getRequest();
        $viewData = ['id' => $id, 'form' => $form];

        if (! $request->isPost()) {
            return $viewData;
        }

        $form->setInputFilter($directeur->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return $viewData;
        }

        $this->table->saveDirecteur($directeur);

        // Redirect to album list
        return $this->redirect()->toRoute('listed');
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('listed');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'NON');

            if ($del == 'OUI') {
                $id = (int) $request->getPost('id');
                $this->table->deleteDirecteur($id);
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('listed');
        }

        return [
            'id'    => $id,
            'directeur' => $this->table->getDirecteur($id),
        ];
    }
}