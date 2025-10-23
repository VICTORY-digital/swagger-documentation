<?php

declare(strict_types=1);

namespace VictoryGroup\SwaggerDocumentation\OpenApi\PaginationRequestParameters;

use Attribute;
use OpenApi\Attributes\Parameter;
use OpenApi\Attributes\Schema;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
final class PaginateLimitParameter extends Parameter
{
    public function __construct()
    {
        parent::__construct(
            name: 'limit',
            description: 'Кол-во элементов на странице',
            in: 'query',
            required: false,
            schema: new Schema(type: 'integer'),
        );
    }
}
