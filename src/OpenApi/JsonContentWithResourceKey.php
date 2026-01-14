<?php

declare(strict_types=1);

namespace VictoryGroup\SwaggerDocumentation\OpenApi;

use Attribute;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Property;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
final class JsonContentWithResourceKey extends JsonContent
{
    public function __construct(
        ?string $title = null,
        object|string|null $ref = null,
        ?string $resourceKey = null,
        ?bool $dataIsArray = false,
        ?string $description = null,
        ?bool $pagination = false,
    ) {
        $resourceKey = $resourceKey ?: 'data';

        if (!$dataIsArray) {
            parent::__construct(
                title: $title,
                required: [$resourceKey],
                properties: [
                    new Property(
                        property: $resourceKey,
                        ref: $ref,
                        type: 'object',
                    ),
                ],
            );
        }

        parent::__construct(
            title: $title,
            required: array_merge([$resourceKey],
                $pagination ?
                    [
                        'total',
                        'per_page',
                        'current_page',
                        'last_page',
                        'from',
                        'to',
                    ] : []
            ),
            properties: array_merge(
                [
                    new Property(
                        property: $resourceKey,
                        description: $description,
                        type: 'array',
                        items: new Items(ref: $ref),
                    ),
                ],
                $pagination ? [
                    new Property(property: 'total', description: 'Сколько всего элементов', type: 'integer'),
                    new Property(property: 'per_page', description: 'Максимальное кол-во элементов на странице', type: 'integer'),
                    new Property(property: 'current_page', description: 'Текущая страница', type: 'integer'),
                    new Property(property: 'last_page', description: 'Последняя страница', type: 'integer'),
                    new Property(property: 'from', description: 'Номер первой записи по порядку в текущей выборке', type: 'integer'),
                    new Property(property: 'to', description: 'Номер последней записи по порядку в текущей выборке', type: 'integer'),
                ] : [],
            ),
        );
    }
}
