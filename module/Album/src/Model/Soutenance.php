<?php
namespace Album\Model;

use DomainException;
use Laminas\Filter\StringTrim;
use Laminas\Filter\StripTags;
use Laminas\Filter\ToInt;
use Laminas\InputFilter\InputFilter;
use Laminas\InputFilter\InputFilterAwareInterface;
use Laminas\InputFilter\InputFilterInterface;
use Laminas\Validator\StringLength;

class Soutenance implements InputFilterAwareInterface
{

    public $matricule;
    public $themeSoutenance;
    public $heureSoutenance;
    public $dateSoutenance;
    public $codeJury;
    public $codeSoutenance;
    public $id;

    private $inputFilter;

    public function exchangeArray(array $data)
    {
        $this->matricule  = !empty($data['matricule']) ? $data['matricule'] : null;
        $this->themeSoutenance  = !empty($data['themeSoutenance']) ? $data['themeSoutenance'] : null;
        $this->dateSoutenance = !empty($data['dateSoutenance']) ? $data['dateSoutenance'] : null;
        $this->heureSoutenance = !empty($data['heureSoutenance']) ? $data['heureSoutenance'] : null;
        $this->codeJury  = !empty($data['codeJury']) ? $data['codeJury'] : null;
        $this->codeSoutenance  = !empty($data['codeSoutenance']) ? $data['codeSoutenance'] : null;
        $this->id     = !empty($data['id']) ? $data['id'] : null;

    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new DomainException(sprintf(
            '%s does not allow injection of an alternate input filter',
            __CLASS__
        ));
    }

    public function getInputFilter()
    {
        if ($this->inputFilter) {
            return $this->inputFilter;
        }

        $inputFilter = new InputFilter();

        $inputFilter->add([
            'name' => 'id',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'matricule',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'themeSoutenance',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 1000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'dateSoutenance',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'heureSoutenance',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'codeJury',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'codeSoutenance',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }

    public function getArrayCopy()
    {
        return [
            'id'     => $this->id,
            'matricule'  => $this->matricule,
            'themeSoutenance'  => $this->themeSoutenance,
            'dateSoutenance'  => $this->dateSoutenance,
            'heureSoutenance' => $this->heureSoutenance,
            'codeJury'  => $this->codeJury,
            'codeSoutenance'  => $this->codeSoutenance,
        ];
    }
}