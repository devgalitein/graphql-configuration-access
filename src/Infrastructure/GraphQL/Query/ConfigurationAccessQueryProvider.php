<?php

namespace OxidEsales\GraphQL\ConfigurationAccess\Infrastructure\GraphQL\Query;

use GraphQL\Type\Definition\Type;
use OxidEsales\GraphQL\Base\DataType\ObjectField;
use OxidEsales\GraphQL\Base\DataType\ObjectType;
use OxidEsales\GraphQL\Base\Service\Provider\QueryProviderInterface;
use OxidEsales\GraphQL\ConfigurationAccess\Infrastructure\GraphQL\Resolver\ActiveLanguagesResolver;

class ConfigurationAccessQueryProvider implements QueryProviderInterface
{
    public function getQueries(): array
    {
        return [
            'activeLanguages' => new ObjectField(
                'activeLanguages',
                Type::listOf($this->getLanguageType()),
                function () {
                    $resolver = new ActiveLanguagesResolver();
                    return $resolver->resolve();
                }
            )
        ];
    }

    private function getLanguageType(): ObjectType
    {
        return new ObjectType([
            'name' => 'ActiveLanguage',
            'fields' => [
                'code' => [
                    'type' => Type::nonNull(Type::string())
                ],
                'name' => [
                    'type' => Type::nonNull(Type::string())
                ]
            ]
        ]);
    }
}
