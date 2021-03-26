<?php


namespace App\Services;

use App\Producer\SumValuesProducer;
use Symfony\Component\HttpFoundation\Response;

class SumValuesProducerService
{
    /**
     * @var SumValuesProducer $producer
     */
    private $producer;

    public function __construct(SumValuesProducer $producer)
    {
        $this->producer = $producer;
    }

    public function send(array $data): Response
    {

        dd($this->producer->getChannel());
        $this->producer->setContentType('application/json');
        $this->producer->setChannel('testAmqpApp',);
        $this->producer->publish(serialize($data));

        return new Response();
    }
}