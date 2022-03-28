<?php

declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Uid\Uuid;

class Candidato
{
    private string $id;
    private string $name;
    private string $lastName;
    private string $email;
    private string $status;
    
    public function __construct(string $name, string $lastName, string $email, string $status)
    {
        $this->id = Uuid::v4()->toRfc4122();
        $this->name = $name;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->status = $status;
    }
    
    public function getId(): ?string
    {
        return $this->id;
    }
    
    public function getName(): string
    {
        return $this->name;
    }
    
    public function getLastName(): string
    {
        return $this->lastName;
    }
    
    public function getEmail(): string
    {
        return $this->email;
    }
    
    public function getStatus(): string
    {
        return $this->status;
    }
    
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }
    
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}
