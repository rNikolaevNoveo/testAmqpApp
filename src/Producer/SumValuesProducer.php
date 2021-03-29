<?php


namespace App\Producer;

use OldSound\RabbitMqBundle\RabbitMq\Producer;

class SumValuesProducer extends Producer
{
    public function send(array $data): void
    {
        $this->publish(serialize($data));
    }
}