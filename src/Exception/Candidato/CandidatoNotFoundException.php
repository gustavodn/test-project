<?php

declare(strict_types=1);

namespace App\Exception\Candidato;

class CandidatoNotFoundException extends \DomainException
{
    public static function fromId(string $id): self
    {
        throw new self(\sprintf('Candidato with id %s not found', $id));
    }
}
