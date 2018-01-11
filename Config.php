<?php

declare(strict_types=1);

namespace Twinscom\PhpCsFixerConfig;

class Config extends \PhpCsFixer\Config
{
    public function __construct($name = 'twinscom')
    {
        parent::__construct($name);
    }

    public static function create()
    {
        return parent::create()
            ->setRules([
                '@Symfony' => true,
                '@Symfony:risky' => true,
                '@PHP71Migration' => true,
                '@PHP71Migration:risky' => true,
                '@PHPUnit60Migration:risky' => true,

                // Stricter than rulesets:
                'braces' => true,
                'class_attributes_separation' => true,
                'single_class_element_per_statement' => true,

                // Stricter than rulesets and defaults:
                'method_argument_space' => ['ensure_fully_multiline' => true],
                'blank_line_before_statement' => [
                    'statements' => [
                        'break',
                        'continue',
                        'declare',
                        'die',
                        'do',
                        'exit',
                        'for',
                        'foreach',
                        'goto',
                        'if',
                        'include',
                        'include_once',
                        'require',
                        'require_once',
                        'return',
                        'switch',
                        'throw',
                        'try',
                        'while',
                        'yield',
                    ],
                ],
                'random_api_migration' => [
                    'replacements' => [
                        'mt_rand' => 'random_int',
                        'rand' => 'random_int',
                        'getrandmax' => 'mt_getrandmax',
                        'srand' => 'mt_srand',
                    ],
                ],
                'no_extra_blank_lines' => [
                    'tokens' => [
                        'break',
                        'case',
                        'continue',
                        'curly_brace_block',
                        'default',
                        'extra',
                        'parenthesis_brace_block',
                        'return',
                        'square_brace_block',
                        'switch',
                        'throw',
                        'use',
                        'use_trait',
                    ],
                ],

                // Different from rulesets:
                'concat_space' => ['spacing' => 'one'],
                'is_null' => ['use_yoda_style' => false],

                // Not in rulesets:
                'array_syntax' => ['syntax' => 'short'],
                'align_multiline_comment' => ['comment_type' => 'phpdocs_like'],
                'backtick_to_shell_exec' => true,
                'combine_consecutive_issets' => true,
                'combine_consecutive_unsets' => true,
                'compact_nullable_typehint' => true,
                'escape_implicit_backslashes' => true,
                'explicit_indirect_variable' => true,
                'explicit_string_variable' => true,
                'final_internal_class' => true,
                'linebreak_after_opening_tag' => true,
                'list_syntax' => ['syntax' => 'short'],
                'mb_str_functions' => true,
                'method_chaining_indentation' => true,
                'multiline_comment_opening_closing' => true,
                'multiline_whitespace_before_semicolons' => true,
                'no_null_property_initialization' => true,
                'no_php4_constructor' => true,
                'no_superfluous_elseif' => true,
                'no_useless_else' => true,
                'no_useless_return' => true,
                'ordered_class_elements' => true,
                'ordered_imports' => [
                    'importsOrder' => [
                        'class',
                        'const',
                        'function',
                    ],
                ],
                'php_unit_strict' => true,
                'phpdoc_add_missing_param_annotation' => true,
                'phpdoc_order' => true,
                'phpdoc_types_order' => true,
                'simplified_null_return' => true,
                'static_lambda' => true,
                'strict_comparison' => true,
                'strict_param' => true,

                // Disabled ruleset configurations:
                'phpdoc_align' => false,
                'yoda_style' => false,

                // Disabled configurations:
                'class_keyword_remove' => false,
                'general_phpdoc_annotation_remove' => false,
                'header_comment' => false,
                'php_unit_test_annotation' => false,
                'php_unit_test_class_requires_covers' => false,
                'psr0' => false,
                'no_blank_lines_before_namespace' => false,
                'no_short_echo_tag' => false,
                'not_operator_with_space' => false,
                'not_operator_with_successor_space' => false,
                'native_function_invocation' => false,
            ])
            ->setRiskyAllowed(true)
            ->setUsingCache(false);
    }

    public function mergeRules(array $rules): self
    {
        $defaultRules = $this->getRules();
        $mergedRules = array_replace($defaultRules, $rules);

        return $this->setRules($mergedRules);
    }
}
