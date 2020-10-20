<?php
namespace Album\Model;

use RuntimeException;
use Laminas\Db\TableGateway\TableGatewayInterface;

class SoutenanceTable
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

    public function getSoutenance($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
    }

    public function saveSoutenance(Soutenance $soutenance)
    {
        $data = [
            
            'matricule'  => $soutenance->matricule,
            'themeSoutenance' => $soutenance->themeSoutenance,
            'heureSoutenance'  => $soutenance->heureSoutenance,
            'dateSoutenance'  => $soutenance->dateSoutenance,
            'codeSoutenance' => $soutenance->codeSoutenance,
            'codeJury'  => $soutenance->codeJury,
        ];

        $id = (int) $soutenance->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getSoutenance($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update album with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteSoutenance($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }

}