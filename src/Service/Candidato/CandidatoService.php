<?php

declare(strict_types=1);

namespace App\Service\Candidato;

use App\Entity\Candidato;
use App\Entity\User;
use App\Repository\CandidatoRepository;
use App\Service\Mailer\ClientRoute;
use App\Service\Mailer\MailerService;
use App\Service\Password\EncoderService;
use App\Templating\TwigTemplate;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

class CandidatoService
{
    private CandidatoRepository $candidatoRepository;
    private JWTTokenManagerInterface $JWTTokenManager;
    private EncoderService $encoderService;
    private MailerService $mailerService;
    private string $host;
    
    private const CONTRATADO = 'CONTRATADO';
    
    public function __construct(
        CandidatoRepository $candidatoRepository,
        JWTTokenManagerInterface $JWTTokenManager,
        EncoderService $encoderService,
        MailerService $mailerService,
        string $host
    ) {
        $this->candidatoRepository = $candidatoRepository;
        $this->JWTTokenManager = $JWTTokenManager;
        $this->encoderService = $encoderService;
        $this->mailerService = $mailerService;
        $this->host = $host;
    }
    
    /**
     * @throws \Exception
     */
    public function contratar(string $candidatoId): Candidato
    {
        $candidato = $this->candidatoRepository->findOneByIdOrFail($candidatoId);
        $candidato->setStatus(self::CONTRATADO);
        $this->candidatoRepository->save($candidato);
        
        return $candidato;
    }
    
    /**
     * @throws \Exception
     */
    private function sendActivationEmail(User $user): void
    {
        $payload = [
            'name' => $user->getName(),
            'url' => \sprintf(
                '%s%s?token=%s&uid=%s',
                $this->host,
                ClientRoute::ACTIVATE_ACCOUNT,
                $user->getToken(),
                $user->getId()
            ),
        ];
        
        $this->mailerService->send($user->getEmail(), TwigTemplate::USER_REGISTER, $payload);
    }
}
