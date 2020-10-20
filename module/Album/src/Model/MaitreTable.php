<?php
namespace Album\Model;

use RuntimeException;
use Laminas\Db\TableGateway\TableGatewayInterface;

class MaitreTable
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

    public function getMaitre($id)
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

    public function saveMaitre(Maitre $maitre)
    {
        $data = [
            'nomMaitre' => $maitre->nomMaitre,
            'prenomMaitre'  => $maitre->prenomMaitre,
            'codeMaitre'  => $maitre->codeMaitre,
            'etablissementReference' => $maitre->etablissementReference,
            'adresseMaitre'  => $maitre->adresseMaitre,
            'sexeMaitre'  => $maitre->sexeMaitre,
        ];

        $id = (int) $maitre->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getMaitre($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update album with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteMaitre($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }


}