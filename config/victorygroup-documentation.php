<?php

use OpenApi\Analysers\AttributeAnnotationFactory;
use OpenApi\Analysers\DocBlockAnnotationFactory;

return [
    'version' => '3.0.0',

    'inputPaths' => [
        base_path('src')
    ],

    'analysers' => [
        [AttributeAnnotationFactory::class],
        [DocBlockAnnotationFactory::class],
    ],

    'outputPath' => base_path('specification.yaml')
];