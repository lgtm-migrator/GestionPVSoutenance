<?php
namespace Album\Controller;

use Album\Model\Maitre;
use Album\Form\MaitreForm;
use Album\Model\MaitreTable;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class MaitreController extends AbstractActionController
{

    private $table;

    // Add this constructor:
    public function __construct(MaitreTable $table)
    {
        $this->table = $table;
    }
    public function indexAction()
    {
        return new ViewModel([
            'maitres' => $this->table->fetchAll(),
        ]);
    }
    // liste des étudiants
    public function listeAction()
    {
        return new ViewModel([
            'maitres' => $this->table->fetchAll(),
        ]);
    }


    public function addAction()
    {
        $form = new MaitreForm();
        $form->get('submit')->setValue('Ajouter');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $maitre = new Maitre();
        $form->setInputFilter($maitre->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $maitre->exchangeArray($form->getData());
        $this->table->saveMaitre($maitre);
        return $this->redirect()->toRoute('listema');
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        if (0 === $id) {
            return $this->redirect()->toRoute('maitre', ['action' => 'add']);
        }

        // Retrieve the album with the specified id. Doing so raises
        // an exception if the album is not found, which should result
        // in redirecting to the landing page.
        try {
            $maitre = $this->table->getMaitre($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('listema');
        }

        $form = new MaitreForm();
        $form->bind($maitre);
        $form->get('submit')->setAttribute('value', 'Sauvegarder les modifications');

        $request = $this->getRequest();
        $viewData = ['id' => $id, 'form' => $form];

        if (! $request->isPost()) {
            return $viewData;
        }

        $form->setInputFilter($maitre->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return $viewData;
        }

        $this->table->saveMaitre($maitre);

        // Redirect to album list
        return $this->redirect()->toRoute('listema');
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('listema');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'NON');

            if ($del == 'OUI') {
                $id = (int) $request->getPost('id');
                $this->table->deleteMaitre($id);
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('listema');
        }

        return [
            'id'    => $id,
            'maitre' => $this->table->getMaitre($id),
        ];
    }
}