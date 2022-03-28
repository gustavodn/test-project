<?php

declare(strict_types=1);

namespace App\Api\Action\Candidato;

use App\Entity\Candidato;
use App\Service\Candidato\CandidatoService;
use Symfony\Component\HttpFoundation\Request;

class Contratar
{
    private CandidatoService $candidatoService;
    
    public function __construct(CandidatoService $candidatoService)
    {
        $this->candidatoService = $candidatoService;
    }
    
    /**
     * @throws \Exception
     */
    public function __invoke(Request $request): Candidato
    {
        return $this->candidatoService->contratar(
            $request->get('id')
        );
    }
}
