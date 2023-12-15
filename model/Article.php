<?php

namespace Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="articles")
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public int $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public string $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public string $description;

    public function __construct(){
        $this->id=0;
        $this->name="";
        $this->description="";
    }

    public function getId():int{
        return $this->id;
    }
    public function setId(int $id): self{
        $this->id=$id;
        return $this;
    }

    public function getName():string{
        return $this->name;
    }
    public function setName(string $name): self{
        $this->name=$name;
        return $this;
    }

    public function getDescription():string{
        return $this->description;
    }
    public function setDescription(string $description): self{
        $this->description=$description;
        return $this;
    }
}