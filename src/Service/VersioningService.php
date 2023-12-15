<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class VersioningService
{
    private $defaultVersion;
    public function __construct(
        private RequestStack $requestStack,
        private ParameterBagInterface $params)
    {
        $this->defaultVersion = $params->get('default_api_version');
    }

    /**
     * Get the API version
     *
     * @return string
     */
    public function getVersion(): string
    {
        $version = $this->defaultVersion;

        $request = $this->requestStack->getCurrentRequest();

        $accept = $request->get("Accept");

        $entete = explode(';', $accept);

        foreach ($entete as $value) {
            if (strpos($value, "version") !== false) {
                $version = explode("=", $value);
                $version = $version[1];
                break;
            }
        }

        return $version;
    }
}
