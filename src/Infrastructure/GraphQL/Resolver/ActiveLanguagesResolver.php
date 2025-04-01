<?php

namespace OxidEsales\GraphQL\ConfigurationAccess\Infrastructure\GraphQL\Resolver;

use OxidEsales\Eshop\Core\Registry;

class ActiveLanguagesResolver
{
    public function resolve(): array
    {
        $aLanguages = Registry::getConfig()->getConfigParam('aLanguages');

        $result = [];
        foreach ($aLanguages as $code => $name) {
            $result[] = [
                'code' => $code,
                'name' => $name
            ];
        }

        return $result;
    }
}
