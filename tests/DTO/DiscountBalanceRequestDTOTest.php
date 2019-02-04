<?php

namespace Mindbox\Tests\DTO;

use Mindbox\DTO\DiscountBalanceRequestDTO;

/**
 * Class DiscountBalanceRequestDTOTest
 *
 * @package Mindbox\Tests\DTO
 */
class DiscountBalanceRequestDTOTest extends DTOTest
{
    /**
     * @var DiscountBalanceRequestDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = DiscountBalanceRequestDTO::class;

    public function setUp()
    {
        $data      = [
            'type'        => 'some_type',
            'amount'      => 'some_amount',
            'balanceType' => ['someField' => 'someValue'],
            'id'          => 'some_id',
        ];
        $this->dto = new DiscountBalanceRequestDTO($data);
    }

    public function testGetType()
    {
        $field = $this->dto->getType();

        $this->assertSame('some_type', $field);
    }

    public function testSetType()
    {
        $this->dto->setType('new_type');
        $field = $this->dto->getType();

        $this->assertSame('new_type', $field);
    }

    public function testGetAmount()
    {
        $field = $this->dto->getAmount();

        $this->assertSame('some_amount', $field);
    }

    public function testSetAmount()
    {
        $this->dto->setAmount('new_amount');
        $field = $this->dto->getAmount();

        $this->assertSame('new_amount', $field);
    }

    public function testGetId()
    {
        $field = $this->dto->getId();

        $this->assertSame('some_id', $field);
    }

    public function testSetId()
    {
        $this->dto->setId('new_id');
        $field = $this->dto->getId();

        $this->assertSame('new_id', $field);
    }

    public function testGetBalanceType()
    {
        $field = $this->dto->getBalanceType();

        $this->assertInstanceOf(\Mindbox\DTO\BalanceTypeRequestDTO::class, $field);
    }

    public function testSetBalanceType()
    {
        $this->dto->setBalanceType(['newField' => 'newValue']);
        $field = $this->dto->getBalanceType();

        $this->assertInstanceOf(\Mindbox\DTO\BalanceTypeRequestDTO::class, $field);
    }
}