<?php

namespace VictoryGroup\SwaggerDocumentation\Commands;

use Exception;
use Illuminate\Console\Command;
use OpenApi\Analysers\ReflectionAnalyser;
use OpenApi\Generator;
use OpenApi\Util;

class SwaggerDocumentationCommand extends Command
{
    public $signature = 'victorygroup:docs';

    public $description = 'Generate API documentation';

    /**
     * @throws Exception
     */
    public function handle(): int
    {
        $generator = new Generator();
        $analysers = array_map(function($analyser){
            return new $analyser[0](...($analyser[1] ?? []));
        }, config('victorygroup-documentation.analysers'));
        $analyser = new ReflectionAnalyser($analysers);

        $openapi = $generator
            ->setVersion(config('victorygroup-documentation.version'))
            ->setConfig([])
            ->setAnalyser($analyser)
            ->generate(config('victorygroup-documentation.inputPaths'));

        $outputPath = config('victorygroup-documentation.outputPath');
        $openapi->saveAs($outputPath);

        $this->output->success("Documentation generated successfully and written to $outputPath");

        return self::SUCCESS;
    }
}
