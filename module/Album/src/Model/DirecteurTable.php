<?php
namespace Album\Model;

use RuntimeException;
use Laminas\Db\TableGateway\TableGatewayInterface;

class DirecteurTable
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

    public function getDirecteur($id)
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

    public function saveDirecteur(Directeur $directeur)
    {
        $data = [
            'nomDirecteur' => $directeur->nomDirecteur,
            'prenomDirecteur'  => $directeur->prenomDirecteur,
            'codeDirecteur'  => $directeur->codeDirecteur,
            'gradeDirecteur' => $directeur->gradeDirecteur,
            'domaineDirecteur'  => $directeur->domaineDirecteur,
            'adresseDirecteur'  => $directeur->adresseDirecteur,
            'sexeDirecteur'  => $directeur->sexeDirecteur,
        ];

        $id = (int) $directeur->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getDirecteur($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update album with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteDirecteur($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }


}