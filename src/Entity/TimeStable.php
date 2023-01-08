<?php

namespace App\Entity;

trait TimeStable {
    /**
     * @var \DateTimeInterface ;
     * @ORM\Column(type = "datetime")
     */
    private \DateTimeInterface $createdAt;

    /**
     * @var \DateTimeInterface ;
     * @ORM\Column(type = "datetime", nullable = true)
     */
    private \DateTimeInterface $updatedAt;

    /**
     * Get ;
     *
     * @return  \DateTimeInterface
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Get ;
     *
     * @return  \DateTimeInterface
     */ 
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set ;
     *
     * @param  \DateTimeInterface  $createdAt  ;
     *
     * @return  self
     */ 
    public function setCreatedAt(\DateTimeInterface $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Set ;
     *
     * @param  \DateTimeInterface  $updatedAt  ;
     *
     * @return  self
     */ 
    public function setUpdatedAt(\DateTimeInterface $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}