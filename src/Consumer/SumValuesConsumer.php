<?php


namespace App\Consumer;

use App\Entity\Sum;
use App\Producer\SumValuesProducer;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManagerInterface;
use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

class SumValuesConsumer implements ConsumerInterface
{

    /**
     * @var SumValuesProducer
     */
    private $producer;
    /**
     * @var EntityManagerInterface
     */
    private $em;
    /**
     * @var array
     */
    private $dataToSave = [];

    public function __construct(SumValuesProducer $producer, EntityManagerInterface $em)
    {
        $this->producer = $producer;
        $this->em = $em;

        gc_enable();
    }

    public function execute(AMQPMessage $msg)
    {
        $this->dataToSave = (array)unserialize($msg->getBody(), ['allowed_classes' => false]);
        $this->em->getRepository(Sum::class);
        try {
            $this->saveToDb();
            echo 'Calculate confirm'.PHP_EOL;
        } catch (\Throwable $e) {
            echo $e->getMessage();
            $msg->reject();
        }

        $this->em->clear();
        $this->em->getConnection()->close();

        gc_collect_cycles();
    }

    private function saveToDb(): bool
    {
        $model = new Sum();
        $model->setValueOne($this->dataToSave['value_1']);
        $model->setValueTwo($this->dataToSave['value_2']);
        $model->setResult(array_sum($this->dataToSave));
        $model->setCreatedAt(new \DateTime());
        try {
            $this->em->persist($model);
        } catch (Exception  $e) {
            echo $e->getMessage();
            return false;
        }
        $this->em->flush();
        return true;
    }
}