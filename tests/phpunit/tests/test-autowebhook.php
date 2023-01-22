<?php

require_once __DIR__ . '/../mockfactory/MockApi.php';
require_once __DIR__ . '/../mockfactory/Request.php';

use Razorpay\MockApi\MockApi;

class Test_AutoWebhook extends WP_UnitTestCase
{
    private $instance;

    public function setup(): void
    {
        parent::setup();
        $this->instance = Mockery::mock('WC_Razorpay')->makePartial();
        $_POST = array();
    }

    public function testwebhookAPITest()
    {
        $this->instance->shouldReceive('getRazorpayApiInstance')->andReturnUsing(
            function () {
                return new MockApi('key_id', 'key_secret');
            });

        $webhookResponse = $this->instance->webhookAPI('GET', 'webhooks', []);

        $this->assertNotNull($webhookResponse);
        $this->assertArrayHasKey('items', $webhookResponse);
        $this->assertNotNull($webhookResponse['items'][0]['id']);
        $this->assertArrayHasKey('events', $webhookResponse['items'][0]);
    }
}
