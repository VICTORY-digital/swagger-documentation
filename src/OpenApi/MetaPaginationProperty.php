<?php

declare(strict_types=1);

namespace VictoryGroup\SwaggerDocumentation\OpenApi;

use Attribute;
use OpenApi\Attributes\Property;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
final class MetaPaginationProperty extends Property
{
    public function __construct()
    {
        parent::__construct(
            property: 'pagination',
            description: 'Данные о пагинации',
            required: ['total', 'count', 'per_page', 'current_page', 'last_page'],
            properties: [
                new Property(property: 'total', description: 'Сколько всего элементов', type: 'integer'),
                new Property(property: 'count', description: 'Элементов на текущей странице', type: 'integer'),
                new Property(property: 'per_page', description: 'Максимальное кол-во элементов на странице', type: 'integer'),
                new Property(property: 'current_page', description: 'Текущая страница', type: 'integer'),
                new Property(property: 'last_page', description: 'Последняя страница', type: 'integer'),
            ],
            type: 'object',
        );
    }
}
