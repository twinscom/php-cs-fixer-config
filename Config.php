<?php

declare(strict_types=1);

namespace Twinscom\PhpCsFixerConfig;

class Config extends \PhpCsFixer\Config
{
    // phpcs:ignore Generic.CodeAnalysis.UselessOverridingMethod
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
                'function_to_constant' => [
                    'functions' => [
                        'get_called_class',
                        'get_class',
                        'php_sapi_name',
                        'phpversion',
                        'pi',
                    ],
                ],
                'single_class_element_per_statement' => true,
                'single_quote' => [
                    'strings_containing_single_quote_chars' => true,
                ],

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
                'yoda_style' => [
                    'equal' => false,
                    'identical' => false,
                    'less_and_greater' => false,
                ],

                // Not in rulesets:
                'array_indentation' => true,
                'array_syntax' => ['syntax' => 'short'],
                'align_multiline_comment' => ['comment_type' => 'phpdocs_like'],
                'backtick_to_shell_exec' => true,
                'combine_consecutive_issets' => true,
                'combine_consecutive_unsets' => true,
                'comment_to_phpdoc' => true,
                'compact_nullable_typehint' => true,
                'date_time_immutable' => true,
                'escape_implicit_backslashes' => true,
                'explicit_indirect_variable' => true,
                'explicit_string_variable' => true,
                'final_internal_class' => true,
                'fully_qualified_strict_types' => true,
                'linebreak_after_opening_tag' => true,
                'list_syntax' => ['syntax' => 'short'],
                'mb_str_functions' => true,
                'method_chaining_indentation' => true,
                'multiline_comment_opening_closing' => true,
                'multiline_whitespace_before_semicolons' => true,
                'no_alternative_syntax' => true,
                'no_null_property_initialization' => true,
                'no_php4_constructor' => true,
                'no_superfluous_elseif' => true,
                'no_useless_else' => true,
                'no_useless_return' => true,
                'ordered_class_elements' => [
                    'use_trait',
                    'constant_public',
                    'constant_protected',
                    'constant_private',
                    'property_public_static',
                    'property_protected_static',
                    'property_private_static',
                    'property_public',
                    'property_protected',
                    'property_private',
                    'construct',
                    'destruct',
                    'magic',
                    'phpunit',
                    'method_public_static',
                    'method_protected_static',
                    'method_private_static',
                    'method_public',
                    'method_protected',
                    'method_private',
                ],
                'ordered_imports' => [
                    'importsOrder' => [
                        'class',
                        'const',
                        'function',
                    ],
                ],
                'php_unit_ordered_covers' => true,
                'php_unit_set_up_tear_down_visibility' => true,
                'php_unit_strict' => true,
                'phpdoc_add_missing_param_annotation' => true,
                'phpdoc_order' => true,
                'phpdoc_types_order' => true,
                'simplified_null_return' => true,
                'static_lambda' => true,
                'strict_comparison' => true,
                'strict_param' => true,
                'string_line_ending' => true,

                // Disabled ruleset configurations:
                'phpdoc_align' => false,

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
