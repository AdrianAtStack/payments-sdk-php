<?php

use StackPay\Payments\Requests;
use StackPay\Payments\Structures;

class ScheduledTransactionDeleteTest extends ScheduledTransactionTestCase
{
    public function setUp()
    {
        parent::setUp();

        // set scheduledTransaction details
        $this->scheduledTransaction     = new Structures\ScheduledTransaction;
        $this->scheduledTransaction->id = 123;
    }

    public function testFound()
    {
        // mock API success response
        $this->mockApiResponse(200, $this->emptyResponse());

        $request = (new Requests\v1\ScheduledTransactionRequest($this->scheduledTransaction))
            ->delete();

        $this->response = $request->send();

        $this->assertEmptyResponse();
    }

    public function testNotFound()
    {
        // mock API success response
        $this->mockApiResponse(404, $this->notFoundResponse());

        $request = (new Requests\v1\ScheduledTransactionRequest($this->scheduledTransaction))
            ->delete();

        $this->response = $request->send();

        $this->assertResourceNotFoundResponse();
    }
}
