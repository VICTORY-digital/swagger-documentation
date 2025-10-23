<?php

declare(strict_types=1);

namespace VictoryGroup\SwaggerDocumentation\OpenApi;

use Attribute;
use OpenApi\Attributes\Attachable;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\MediaType;
use OpenApi\Attributes\Response;
use OpenApi\Attributes\XmlContent;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
final class ResponseUnprocessable extends Response
{
    public function __construct(MediaType|JsonContent|XmlContent|Attachable|array|null $content = null)
    {
        parent::__construct(
            response: SymfonyResponse::HTTP_UNPROCESSABLE_ENTITY,
            description: 'Ошибочные данные',
            content: $content,
        );
    }
}
