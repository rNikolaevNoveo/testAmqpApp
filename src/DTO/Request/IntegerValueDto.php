<?php


namespace App\DTO\Request;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class IntegerValueDto
{
    /**
     * @var integer
     * @Assert\Type("integer")
     * @Assert\Positive()
     * @Assert\NotBlank()
     */
    public $valueOne;

    /**
     * @var integer
     * @Assert\Type("integer")
     * @Assert\Positive()
     * @Assert\NotBlank()
     */
    public $valueTwo;


    /**
     * @return int
     */
    public function getValueOne(): int
    {
        return $this->valueOne;
    }

    /**
     * @param int $valueOne
     */
    public function setValueOne(int $valueOne): void
    {
        $this->valueOne = $valueOne;
    }

    /**
     * @return int
     */
    public function getValueTwo(): int
    {
        return $this->valueTwo;
    }

    /**
     * @param int $valueTwo
     */
    public function setValueTwo(int $valueTwo): void
    {
        $this->valueTwo = $valueTwo;
    }
}