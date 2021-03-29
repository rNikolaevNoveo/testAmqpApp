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
        $this->producer->publish(serialize($data));
        return new Response();
    }
}