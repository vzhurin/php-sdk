<?php

namespace Mindbox\Tests\Clients;

use Mindbox\Clients\MindboxClientV3;

/**
 * Class MindboxClientV3Test
 *
 * @package Mindbox\Tests\Clients
 */
class MindboxClientV3Test extends AbstractMindboxClientTest
{
    /**
     * @var string
     */
    protected $endpointId = 'endpointId';

    /**
     * @return array
     */
    public function expectedArgsForSendProvider()
    {
        return [
            [
                [
                    'POST',
                    'operation',
                    $this->getDTOStub(),
                ],
                [
                    'apiVer'  => 'v3',
                    'url'     => 'https://api.mindbox.ru/v3/operations/sync?endpointId=' . $this->endpointId . '&operation=operation&deviceUUID=',
                    'method'  => 'POST',
                    'body'    => $this->getDTOStub()->toJson(),
                    'headers' => [
                        'Accept'        => 'application/json',
                        'Content-Type'  => 'application/json',
                        'Authorization' => 'Mindbox secretKey="' . $this->secret . '"',
                        'X-Customer-IP' => '',
                    ],
                ],
            ],
            [
                [
                    'GET',
                    'operation',
                    $this->getDTOStub(),
                    'url',
                    ['param' => 'pam-pam'],
                    false,
                ],
                [
                    'apiVer'  => 'v3',
                    'url'     => 'https://api.mindbox.ru/v3/operations/async?param=pam-pam&endpointId=' . $this->endpointId . '&operation=operation&deviceUUID=',
                    'method'  => 'GET',
                    'body'    => $this->getDTOStub()->toJson(),
                    'headers' => [
                        'Accept'        => 'application/json',
                        'Content-Type'  => 'application/json',
                        'Authorization' => 'Mindbox secretKey="' . $this->secret . '"',
                        'X-Customer-IP' => '',
                    ],
                ],
            ],
            [
                [
                    'POST',
                    'operation',
                    $this->getDTOStub(),
                    '',
                    [],
                    true,
                    false,
                ],
                [
                    'apiVer'  => 'v3',
                    'url'     => 'https://api.mindbox.ru/v3/operations/sync?endpointId=' . $this->endpointId . '&operation=operation',
                    'method'  => 'POST',
                    'body'    => $this->getDTOStub()->toJson(),
                    'headers' => [
                        'Accept'        => 'application/json',
                        'Content-Type'  => 'application/json',
                        'Authorization' => 'Mindbox secretKey="' . $this->secret . '"',
                    ],
                ],
            ],
        ];
    }

    /**
     * @param $secret
     * @param $httpClient
     * @param $loggerClient
     *
     * @return MindboxClientV3|\PHPUnit\Framework\MockObject\MockObject
     */
    protected function getClient($secret, $httpClient, $loggerClient)
    {
        $client = new MindboxClientV3($this->endpointId, $secret, $httpClient, $loggerClient);

        return $client;
    }
}