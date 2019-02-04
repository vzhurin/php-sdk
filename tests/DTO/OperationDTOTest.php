<?php

namespace Mindbox\Tests\DTO;

use Mindbox\DTO\OperationDTO;

/**
 * Class OperationDTOTest
 *
 * @package Mindbox\Tests\DTO
 */
class OperationDTOTest extends DTOTest
{
    /**
     * @var OperationDTO $dto
     */
    public $dto;
    /**
     * @var string
     */
    protected $dtoClassName = OperationDTO::class;

    public function setUp()
    {
        $data      = [
            'customer'              => ['someField' => 'someValue'],
            'authentificationCode'  => 'some_authentificationCode',
            'smsConfirmation'       => ['someField' => 'someValue'],
            'page'                  => ['someField' => 'someValue'],
            'productList'           => [['someField' => 'someValue']],
            'addProductToList'      => ['someField' => 'someValue'],
            'removeProductFromList' => ['someField' => 'someValue'],
            'setProductCountInList' => ['someField' => 'someValue'],
            'setProductList'        => ['someField' => 'someValue'],
        ];
        $this->dto = new OperationDTO($data);
    }

    public function testGetCustomer()
    {
        $field = $this->dto->getCustomer();

        $this->assertInstanceOf(\Mindbox\DTO\CustomerRequestDTO::class, $field);
    }

    public function testSetCustomer()
    {
        $this->dto->setCustomer(['email' => 'some_email']);
        $field = $this->dto->getCustomer();

        $this->assertInstanceOf(\Mindbox\DTO\CustomerRequestDTO::class, $field);
        $this->assertSame('some_email', $field->getEmail());
    }

    public function testGetAuthentificationCode()
    {
        $field = $this->dto->getAuthentificationCode();

        $this->assertSame('some_authentificationCode', $field);
    }

    public function testSetAuthentificationCode()
    {
        $this->dto->setAuthentificationCode('new_authentificationCode');
        $field = $this->dto->getAuthentificationCode();

        $this->assertSame('new_authentificationCode', $field);
    }

    public function testGetSmsConfirmation()
    {
        $field = $this->dto->getSmsConfirmation();

        $this->assertInstanceOf(\Mindbox\DTO\SmsConfirmationRequestDTO::class, $field);
    }

    public function testSetSmsConfirmation()
    {
        $this->dto->setSmsConfirmation(['code' => 'some_code']);
        $field = $this->dto->getSmsConfirmation();

        $this->assertInstanceOf(\Mindbox\DTO\SmsConfirmationRequestDTO::class, $field);
        $this->assertSame('some_code', $field->getCode());
    }

    public function testGetPage()
    {
        $field = $this->dto->getPage();

        $this->assertInstanceOf(\Mindbox\DTO\PageRequestDTO::class, $field);
    }

    public function testSetPage()
    {
        $this->dto->setPage(['itemsPerPage' => '12']);
        $field = $this->dto->getPage();

        $this->assertInstanceOf(\Mindbox\DTO\PageRequestDTO::class, $field);
        $this->assertSame('12', $field->getItemsPerPage());
    }

    public function testGetProductList()
    {
        $field = $this->dto->getProductList();

        $this->assertInstanceOf(\Mindbox\DTO\ProductListItemRequestCollection::class, $field);
    }

    public function testSetProductList()
    {
        $this->dto->setProductList(['productListItem' => ['price' => '1000']]);
        $field = $this->dto->getProductList();

        $this->assertInstanceOf(\Mindbox\DTO\ProductListItemRequestCollection::class, $field);
    }

    public function testGetAddProductToList()
    {
        $field = $this->dto->getAddProductToList();

        $this->assertInstanceOf(\Mindbox\DTO\AddProductToListRequestDTO::class, $field);
    }

    public function testSetAddProductToList()
    {
        $this->dto->setAddProductToList(['product' => ['price' => '1000']]);
        $field = $this->dto->getAddProductToList();

        $this->assertInstanceOf(\Mindbox\DTO\AddProductToListRequestDTO::class, $field);
        $this->assertSame('1000', $field->getProduct()->getPrice());
    }

    public function testGetRemoveProductFromList()
    {
        $field = $this->dto->getRemoveProductFromList();

        $this->assertInstanceOf(\Mindbox\DTO\RemoveProductFromListRequestDTO::class, $field);
    }

    public function testSetRemoveProductFromList()
    {
        $this->dto->setRemoveProductFromList(['product' => ['price' => '1500']]);
        $field = $this->dto->getRemoveProductFromList();

        $this->assertInstanceOf(\Mindbox\DTO\RemoveProductFromListRequestDTO::class, $field);
        $this->assertSame('1500', $field->getProduct()->getPrice());
    }

    public function testGetSetProductCountInList()
    {
        $field = $this->dto->getSetProductCountInList();

        $this->assertInstanceOf(\Mindbox\DTO\SetProductCountInListRequestDTO::class, $field);
    }

    public function testSetSetProductCountInList()
    {
        $this->dto->setSetProductCountInList(['product' => ['price' => '2500']]);
        $field = $this->dto->getSetProductCountInList();

        $this->assertInstanceOf(\Mindbox\DTO\SetProductCountInListRequestDTO::class, $field);
        $this->assertSame('2500', $field->getProduct()->getPrice());
    }
}