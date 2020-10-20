<?php
namespace Album\Model;

use RuntimeException;
use Laminas\Db\TableGateway\TableGatewayInterface;

class PresidentTable
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

    public function getPresident($id)
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

    public function savePresident(President $president)
    {
        $data = [
            'nomPresident' => $president->nomPresident,
            'prenomPresident'  => $president->prenomPresident,
            'codePresident'  => $president->codePresident,
            'gradePresident' => $president->gradePresident,
            'domainePresident'  => $president->domainePresident,
            'adressePresident'  => $president->adressePresident,
            'sexePresident'  => $president->sexePresident,
        ];

        $id = (int) $president->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getPresident($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update album with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deletePresident($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }


}