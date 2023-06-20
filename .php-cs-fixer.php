<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/lib')
    ->in(__DIR__.'/test')
;

$config = new PhpCsFixer\Config();

return $config->setRules([
    '@PSR12' => true,
    '@PhpCsFixer' => true,
    'phpdoc_to_comment' => false,
    'global_namespace_import' => [
        'import_classes' => true,
        'import_functions' => true,
        'import_constants' => true,
    ],
    'fully_qualified_strict_types' => true,
])
    ->setFinder($finder)
    ;
