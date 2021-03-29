<?php


namespace App\Consumer;

use App\Services\SumValues;
use Doctrine\ORM\EntityManagerInterface;
use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

class SumValuesConsumer implements ConsumerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;
    /**
     * @var array
     */
    private $dataToSave = [];
    /**
     * @var SumValues
     */
    private $mod;

    public function __construct(EntityManagerInterface $em, SumValues $mod)
    {
        $this->em = $em;
        $this->mod = $mod;
    }

    public function execute(AMQPMessage $msg): bool
    {
        $receivedData = (array)unserialize($msg->getBody(), ['allowed_classes' => false]);

        try {
            $this->mod->process($receivedData);
            echo 'Calculate confirm'.PHP_EOL;

        } catch (\Throwable $e) {
            //If returned 'false' statement this callback will be rejected by the consumer and
            // requeued by RabbitMQ.
            // Any other value not equal to false will acknowledge the message and remove it from the queue
            return false;
        }

        $this->em->clear();
        $this->em->getConnection()->close();
        return true;
    }
}