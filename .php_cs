<?php

$header = <<<EOF
This file is a part of Retrorsum
Copyright (C) 2017  https://sikofitt.com sikofitt@gmail.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
EOF;

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules(
        [
            '@Symfony' => true,
           'header_comment' => ['header' => $header],
            'ordered_class_elements' => true,
            'ordered_imports' => true,
            'no_mixed_echo_print' => ['use' => 'print'],
            'strict_param' => true,
            'strict_comparison' => true,
            'single_import_per_statement' => false,
            'phpdoc_order' => true,
            'array_syntax' => ['syntax' => 'short'],
            'short_echo_tag' => false,
           'phpdoc_add_missing_param_annotation' => true,
            'psr4' => true,
           'no_extra_consecutive_blank_lines' => [
               'break',
               'continue',
               'extra',
               'return',
               'throw',
               'parenthesis_brace_block',
               'square_brace_block',
               'curly_brace_block'
           ],
        ]
    )->setFinder(
        PhpCsFixer\Finder::create()
            ->exclude('vendor')
            ->ignoreDotFiles(true)
            ->ignoreVCS(true)
            ->name('*.php')
            ->notName('test.php')
            ->in(__DIR__)
    );