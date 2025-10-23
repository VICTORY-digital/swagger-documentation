<?php

declare(strict_types=1);

namespace VictoryGroup\SwaggerDocumentation\OpenApi;

use Attribute;
use OpenApi\Attributes\Response;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
final class ResponseBadRequest extends Response
{
    public function __construct()
    {
        parent::__construct(
            response: SymfonyResponse::HTTP_BAD_REQUEST,
            description: 'Неавторизованный',
        );
    }
}
