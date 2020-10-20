<?php
namespace Album\Model;

use RuntimeException;
use Laminas\Db\TableGateway\TableGatewayInterface;

class JuryTable
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

    public function getJury($id)
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
    public function getJuryCode($codeJury)
    {
        $codeJury = (int) $codeJury;
        $rowset = $this->tableGateway->select(['codeJury' => $codeJury]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Impossible de trouver une ligne avec cet identifiant %d',
                $codeJury
            ));
        }

        return $row;
    }

    public function saveJury(Jury $jury)
    {
        $data = [
            'codePresident' => $jury->codePresident,
            'codeJury'  => $jury->codeJury,
            'codeDirecteur'  => $jury->codeDirecteur,
            'codeInvite' => $jury->codeInvite,
            'codeMaitre'  => $jury->codeMaitre,
        ];

        $id = (int) $jury->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getJury($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update album with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteJury($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }


}