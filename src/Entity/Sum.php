<?php

namespace App\Entity;

use App\Repository\SumRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SumRepository::class)
 * @ORM\Table("sum_values")
 */
class Sum
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $valueOne;

    /**
     * @ORM\Column(type="integer")
     */
    private $valueTwo;

    /**
     * @ORM\Column(type="integer")
     */
    private $result;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValueOne(): ?int
    {
        return $this->valueOne;
    }

    public function setValueOne(int $valueOne): self
    {
        $this->valueOne = $valueOne;

        return $this;
    }

    public function getValueTwo(): ?int
    {
        return $this->valueTwo;
    }

    public function setValueTwo(int $valueTwo): self
    {
        $this->valueTwo = $valueTwo;

        return $this;
    }

    public function getResult(): ?int
    {
        return $this->result;
    }

    public function setResult(int $result): self
    {
        $this->result = $result;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
