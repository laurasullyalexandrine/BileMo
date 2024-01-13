<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTDecodeFailureException;
use Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\AuthorizationHeaderTokenExtractor;

class CheckClientWithTokenService 
{
    public function __construct(
        private RequestStack $request,
        private JWTTokenManagerInterface $jwtManager)
    {}

    public function getClient(
    TokenInterface $tokenInterface): array
    {
        $tokenExtractor = new AuthorizationHeaderTokenExtractor('Bearer', 'Authorization');
    
        $jwt = $tokenExtractor->extract($this->request->getCurrentRequest());
        
        if (!$jwt) {
            throw new JWTDecodeFailureException('Token not found', 'Token not found');
        }
    
        $jwtDecode = $this->jwtManager->decode($tokenInterface);

        return $jwtDecode;

    }
}