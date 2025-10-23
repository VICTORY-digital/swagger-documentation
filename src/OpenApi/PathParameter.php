<?php

declare(strict_types=1);

namespace VictoryGroup\SwaggerDocumentation\OpenApi;

use Attribute;
use OpenApi\Attributes\PathParameter as BasePathParameter;
use OpenApi\Attributes\Schema;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD | Attribute::TARGET_PROPERTY | Attribute::TARGET_PARAMETER | Attribute::IS_REPEATABLE)]
final class PathParameter extends BasePathParameter
{
    public function __construct(string $name, string $description, string $type)
    {
        parent::__construct(
            name: $name,
            description: $description,
            schema: new Schema(type: $type),
        );
    }
}
