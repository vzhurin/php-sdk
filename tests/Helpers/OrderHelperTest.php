<?php

namespace Mindbox\Tests\Helpers;

use Mindbox\Helpers\OrderHelper;

/**
 * Class OrderHelperTest
 *
 * @package Mindbox\Tests\Helpers
 */
class OrderHelperTest extends AbstractMindboxHelperTest
{
    /**
     * @var OrderHelper $helper
     */
    protected $helper;

    /**
     * @var \Mindbox\Clients\AbstractMindboxClient|\PHPUnit\Framework\MockObject\MockObject $mindboxClientStub
     */
    protected $mindboxClientStub;

    /**
     * @var \Mindbox\MindboxResponse|\PHPUnit\Framework\MockObject\MockObject $mindboxResponseStub
     */
    protected $mindboxResponseStub;

    public function setUp()
    {
        $this->mindboxResponseStub = $this->createMock(\Mindbox\MindboxResponse::class);

        $this->mindboxClientStub = $this->getMockBuilder(\Mindbox\Clients\AbstractMindboxClient::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->helper = new OrderHelper($this->mindboxClientStub);
    }

    public function testOfflineOrder()
    {
        $dto           = new \Mindbox\DTO\OrderUpdateRequestDTO();
        $operationName = 'Website.OperationName';

        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $dto, 'update-order', [], true, false);

        $this->helper->offlineOrder($dto, $operationName);
    }

    public function testGetOrders()
    {
        $params        = [
            'countToReturn' => 1,
            'mindbox'       => 12,
            'startingIndex' => 5,
        ];
        $operationName = 'Website.OperationName';

        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('GET', $operationName, null, 'by-customer', $params, true, false);

        $this->helper->getOrders(
            $params['countToReturn'],
            $params['mindbox'],
            $params['startingIndex'],
            'Website.OperationName'
        );
    }

    public function testConfirmOrder()
    {
        $dto           = new \Mindbox\DTO\OrderUpdateRequestDTO();
        $operationName = 'Website.OperationName';

        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $dto, 'update-order', [], true, false);

        $this->helper->confirmOrder($dto, $operationName);
    }

    public function testCancelOrder()
    {
        $dto           = new \Mindbox\DTO\OrderUpdateRequestDTO();
        $operationName = 'Website.OperationName';

        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $dto, 'update-order', [], true, false);

        $this->helper->cancelOrder($dto, $operationName);
    }

    public function testCalculateCart()
    {
        $dto           = new \Mindbox\DTO\PreorderRequestDTO();
        $operationName = 'Website.OperationName';

        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $dto, 'get-pre-order-info', [], true, false);

        $this->helper->calculateCart($dto, $operationName);
    }

    public function testCreateOrder()
    {
        $dto           = new \Mindbox\DTO\OrderCreateRequestDTO();
        $operationName = 'Website.OperationName';

        $this->mindboxClientStub->expects($this->once())
            ->method('prepareRequest')
            ->with('POST', $operationName, $dto, 'create', [], true, false);

        $this->helper->createOrder($dto, $operationName);
    }
}