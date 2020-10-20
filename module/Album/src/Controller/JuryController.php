<?php
namespace Album\Controller;

use Album\Model\Jury;
use Album\Form\JuryForm;
use Album\Model\JuryTable;
use Album\Model\PresidentTable;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class JuryController extends AbstractActionController
{

    private $table;
    private $table2;

    // Add this constructor:
    public function __construct(JuryTable $table, PresidentTable $table2)//test
    {
        $this->table = $table;
        $this->table2 = $table2;
    }
    public function indexAction()
    {
        return new ViewModel([
            'jurys' => $this->table->fetchAll(),
            'presidents' => $this->table2->fetchAll(),
        ]);
    }
    // liste des étudiants
    public function listeAction()
    {
        return new ViewModel([
            'jurys' => $this->table->fetchAll(),
            'presidents' => $this->table2->fetchAll(),
        ]);
    }
        /* return [
            'presidents' => $this->table2->fetchAll(),
        ]; */


    public function addAction()
    {     
        
           
        $form = new JuryForm();
        $form->get('submit')->setValue('Ajouter');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $jury = new Jury(); 
        $form->setInputFilter($jury->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }
  
        $jury->exchangeArray($form->getData());
        $this->table->saveJury($jury);
        return $this->redirect()->toRoute('listej');  
         

    } 

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        if (0 === $id) {
            return $this->redirect()->toRoute('jury', ['action' => 'add']);
        }

        // Retrieve the album with the specified id. Doing so raises
        // an exception if the album is not found, which should result
        // in redirecting to the landing page.
        try {
            $jury = $this->table->getJury($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('listej');
        }

        $form = new JuryForm();
        $form->bind($jury);
        $form->get('submit')->setAttribute('value', 'Sauvegarder les modifications');

        $request = $this->getRequest();
        $viewData = ['id' => $id, 'form' => $form];

        if (! $request->isPost()) {
            return $viewData;
        }

        $form->setInputFilter($jury->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return $viewData;
        }

        $this->table->saveJury($jury);

        // Redirect to album list
        return $this->redirect()->toRoute('listej');
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('listej');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'NON');

            if ($del == 'OUI') {
                $id = (int) $request->getPost('id');
                $this->table->deleteJury($id);
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('listej');
        }

        return [
            'id'    => $id,
            'jury' => $this->table->getJury($id),
        ];
    }
}