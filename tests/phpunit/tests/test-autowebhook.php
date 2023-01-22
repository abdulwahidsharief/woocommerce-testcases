<?php

use Razorpay\MockApi\MockApi;

//require_once __DIR__ . '/../../../woo-razorpay.php';

class Test_AutoWebhook extends WP_UnitTestCase
{
    private $instance;

    public function setup(): void
    {
        parent::setup();
        $this->instance = Mockery::mock('WC_Razorpay')->makePartial()->shouldAllowMockingProtectedMethods();
        $_POST = array();
    }

    public function testEmptyKeyAndSecretValidation()
    {
        $this->instance->shouldReceive('getSetting')->andReturnUsing(function ($key) {
            if ($key == 'key_id')
            {
                return null;
            }
            else
            {
                return null;
            }
        });

        ob_start();
        $response = $this->instance->autoEnableWebhook();
        $response = ob_get_contents();
        ob_end_clean();

        $this->assertStringContainsString('Key Id and Key Secret are required', $response);
    }
}
