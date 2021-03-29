<?php


namespace App\Services;

use App\Entity\Sum;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManagerInterface;
class SumValues
{
    /**
     * @var EntityManagerInterface $em
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    public function process(array $receivedData): bool
    {
        if (!$receivedData) {
            return false;
        }

        $model = new Sum();
        $model->setValueOne($receivedData['value_1']);
        $model->setValueTwo($receivedData['value_2']);
        $model->setResult(array_sum($receivedData));
        $model->setCreatedAt(new \DateTime());
        try {
            $this->em->persist($model);
            $this->em->flush();
        } catch (Exception  $e) {
            echo $e->getMessage();
            return false;
        }
        
        return true;

    }
}