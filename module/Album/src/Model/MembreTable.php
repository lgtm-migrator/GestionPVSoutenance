<?php
namespace Album\Model;

use RuntimeException;
use Laminas\Db\TableGateway\TableGatewayInterface;

class MembreTable
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

    public function getMembre($id)
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

    public function saveMembre(Membre $membre)
    {
        $data = [
            'nomInvite' => $membre->nomInvite,
            'prenomInvite'  => $membre->prenomInvite,
            'codeInvite'  => $membre->codeInvite,
            'gradeInvite' => $membre->gradeInvite,

            'adresseInvite'  => $membre->adresseInvite,
            'sexeInvite'  => $membre->sexeInvite,
        ];

        $id = (int) $membre->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getMembre($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update album with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteMembre($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }


}