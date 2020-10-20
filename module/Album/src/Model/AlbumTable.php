<?php
namespace Album\Model;

use RuntimeException;
use Laminas\Db\TableGateway\TableGatewayInterface;

class AlbumTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getAlbum($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Impossible de trouver une ligne avec cet identifiant %d',
                $id
            ));
        }

        return $row;
    }

      public function getAlbumMatricule($matricule)
    {
        $matricule = (string)  $matricule;
        $rowset = $this->tableGateway->select(['matricule' => $matricule]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Impossible de trouver une ligne avec cet identifiant %d',
                $matricule
            ));
        }

        return $row;
    }

    public function saveAlbum(Album $album)
    {
        $data = [
            'nomEtudiant' => $album->nomEtudiant,
            'prenomEtudiant'  => $album->prenomEtudiant,
            'dateNaissance'  => $album->dateNaissance,
            'lieuNaissance' => $album->lieuNaissance,
            'filiere'  => $album->filiere,
            'matricule'  => $album->matricule,
            'sexe'  => $album->sexe,
        ];

        $id = (int) $album->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getAlbum($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update album with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteAlbum($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }


}