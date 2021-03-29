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
    private $value_one;

    /**
     * @ORM\Column(type="integer")
     */
    private $value_two;

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
        return $this->value_one;
    }

    public function setValueOne(int $value_one): self
    {
        $this->value_one = $value_one;

        return $this;
    }

    public function getValueTwo(): ?int
    {
        return $this->value_two;
    }

    public function setValueTwo(int $value_two): self
    {
        $this->value_two = $value_two;

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
