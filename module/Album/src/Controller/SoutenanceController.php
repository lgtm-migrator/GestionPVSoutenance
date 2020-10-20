<?php
namespace Album\Controller;

use Album\Model\Soutenance;
use Album\Form\SoutenanceForm;
use Album\Model\SoutenanceTable;
use Album\Model\AlbumTable;
use Album\Model\JuryTable;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class SoutenanceController extends AbstractActionController
{

    private $table;
    private $tableEtudiant;
    private $tableJury;

    // Add this constructor:
    public function __construct(SoutenanceTable $table, AlbumTable $tableEtudiant, JuryTable $tableJury)
    {
        $this->table = $table;
        $this->tableEtudiant = $tableEtudiant;
        $this->tableJury = $tableJury;
    }
    public function indexAction()
    {
        return new ViewModel([
            'soutenances' => $this->table->fetchAll(),
        ]);
    }
    // liste des étudiants
    public function listeAction()
    {
        return new ViewModel([
            'soutenances' => $this->table->fetchAll(),
        ]);
    }

    // calendar
    public function calendarAction()
    {
        return new ViewModel([
            'soutenances' => $this->table->fetchAll(),
        ]);
    }

    // fiche individuelle
    public function ficheAction()
    {

         $id = (int) $this->params()->fromRoute('id', 0);
         $matricule = (string) $this->params()->fromRoute('matricule');
         $codeJury = (int) $this->params()->fromRoute('codeJury', 0);
        if (!$id) {
            return $this->redirect()->toRoute('listesoutenance');
        }

        return [
            'id'    => $id,
            'matricule' => $matricule,//matricule de la table soutenance
            'codeJury' => $codeJury,//matricule de la table soutenance
            'soutenance' => $this->table->getSoutenance($id),//recuperation des éléments de la table soutenance
            'album' => $this->tableEtudiant->getAlbumMatricule($matricule),// recupération des éléments de la table etudiant avec Etudiant.matricule==Soutenance.matricule
            'jury' => $this->tableJury->getJuryCode($codeJury),
        ];
    }

    
     // impression de la fiche
    public function impressionAction()
    {
       
         $id = (int) $this->params()->fromRoute('id', 0);
         $matricule = (string) $this->params()->fromRoute('matricule');
         $codeJury = (int) $this->params()->fromRoute('codeJury', 0);
        if (!$id) {
            return $this->redirect()->toRoute('listesoutenance');
        }

        return [
            'id'    => $id,
            'matricule' => $matricule,//matricule de la table soutenance
            'codeJury' => $codeJury,//matricule de la table soutenance
            'soutenance' => $this->table->getSoutenance($id),//recuperation des éléments de la table soutenance
            'album' => $this->tableEtudiant->getAlbumMatricule($matricule),// recupération des éléments de la table etudiant avec Etudiant.matricule==Soutenance.matricule
            'jury' => $this->tableJury->getJuryCode($codeJury),
        ];
    }
     // géneration du pdf
    public function pdfAction()
    {
           $id = (int) $this->params()->fromRoute('id', 0);
         $matricule = (string) $this->params()->fromRoute('matricule');
         $codeJury = (int) $this->params()->fromRoute('codeJury', 0);
        if (!$id) {
            return $this->redirect()->toRoute('listesoutenance');
        }

        return [
            'id'    => $id,
            'matricule' => $matricule,//matricule de la table soutenance
            'codeJury' => $codeJury,//matricule de la table soutenance
            'soutenance' => $this->table->getSoutenance($id),//recuperation des éléments de la table soutenance
            'album' => $this->tableEtudiant->getAlbumMatricule($matricule),// recupération des éléments de la table etudiant avec Etudiant.matricule==Soutenance.matricule
            'jury' => $this->tableJury->getJuryCode($codeJury),
        ];
    }


    public function addAction()
    {
        $form = new SoutenanceForm();
        $form->get('submit')->setValue('Programmer la soutenance');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $soutenance = new Soutenance();
        $form->setInputFilter($soutenance->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $soutenance->exchangeArray($form->getData());
        $this->table->saveSoutenance($soutenance);
        return $this->redirect()->toRoute('listesoutenance');
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        if (0 === $id) {
            return $this->redirect()->toRoute('soutenance', ['action' => 'add']);
        }

        // Retrieve the soutenance with the specified id. Doing so raises
        // an exception if the soutenance is not found, which should result
        // in redirecting to the landing page.
        try {
            $soutenance = $this->table->getSoutenance($id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('listesoutenance');
        }

        $form = new SoutenanceForm();
        $form->bind($soutenance);
        $form->get('submit')->setAttribute('value', 'Sauvegarder les modifications');

        $request = $this->getRequest();
        $viewData = ['id' => $id, 'form' => $form];

        if (! $request->isPost()) {
            return $viewData;
        }

        $form->setInputFilter($soutenance->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return $viewData;
        }

        $this->table->saveSoutenance($soutenance);

        // Redirect to soutenance list
        return $this->redirect()->toRoute('listesoutenance');
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('listesoutenance');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'NON');

            if ($del == 'OUI') {
                $id = (int) $request->getPost('id');
                $this->table->deleteSoutenance($id);
            }

            // Redirect to list of soutenances
            return $this->redirect()->toRoute('listesoutenance');
        }

        return [
            'id'    => $id,
            'soutenance' => $this->table->getSoutenance($id),
        ];
    }
}