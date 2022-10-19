<?php

use PhpCsFixer\{Config, Finder};

$finder = Finder::create()
	->in("app");

$config = new Config();
return $config->setCacheFile(__DIR__."/.temp/.php-cs-fixer.cache")
	->setRules([
//        "@Symfony" => true,
		"array_syntax" => ["syntax" => "short"],
//        "braces" => [
//            "allow_single_line_anonymous_class_with_empty_body" => true, "allow_single_line_closure" => true,
//            "position_after_functions_and_oop_constructs" => "same", "position_after_control_structures" => "same", "position_after_anonymous_constructs" => "same"
//        ],
		"cast_spaces" => ["space" => "none"],
//        "control_structure_continuation_position" => ["position" => "same_line"],
		"function_declaration" => ["closure_function_spacing" => "none"],
		"group_import" => true, "single_import_per_statement" => false,
		"indentation_type" => true,
//		"line_ending" => false,
		"no_empty_phpdoc" => true,
		"no_superfluous_phpdoc_tags" => ["allow_mixed" => true, "remove_inheritdoc" => true],
		"phpdoc_align" => ["align" => "left"],
		"phpdoc_annotation_without_dot" => false,
		"phpdoc_separation" => false,
		"protected_to_private" => false,
		"single_line_after_imports" => true,
		"single_quote" => false,
		"single_trait_insert_per_statement" => false,
		"standardize_increment" => false,
//        "single_space_after_construct" => [
//            "constructs" => [
//                "abstract", "as", "attribute", "break", "case", "catch", "class", "clone", "comment", "const", "const_import", "continue", "do", "echo", "else", "elseif", "enum", "extends", "final", "finally", "function", "function_import", "global", "goto", "implements", "include", "include_once", "instanceof", "insteadof", "interface", "match", "named_argument", "namespace", "new", "open_tag_with_echo", "php_doc", "php_open", "print", "private", "protected", "public", "readonly", "require", "require_once", "return", "static", "switch", "throw", "trait", "try", "use", "use_lambda", "use_trait", "var", "while", "yield", "yield_from"
//            ]
//        ],
	])
	->setIndent("\t")
//    ->setLineEnding("\r\n")
	->setFinder($finder);
