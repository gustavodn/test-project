<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Candidato;
use App\Exception\Candidato\CandidatoNotFoundException;

class CandidatoRepository extends BaseRepository
{
    protected static function entityClass(): string
    {
        return Candidato::class;
    }
    
    public function findOneByIdOrFail(string $candidatoId): Candidato
    {
        if (null === $candidato = $this->objectRepository->findOneBy(['id' => $candidatoId])) {
            throw CandidatoNotFoundException::fromId($candidatoId);
        }
        
        return $candidato;
    }
    
    public function save(Candidato $candidato): void
    {
        $this->saveEntity($candidato);
    }
}
