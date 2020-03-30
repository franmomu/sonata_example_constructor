<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExampleRepository")
 */
class Example
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $score;

    public function __construct(int $id, string $name, float $score)
    {
        $this->id = $id;
        $this->name = $name;
        $this->score = $score;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getScore(): float
    {
        return $this->score;
    }

    public function update(float $score)
    {
        $this->score = $score;
    }
}
