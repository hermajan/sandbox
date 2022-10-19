<?php
namespace App\Tests;

require __DIR__."/../bootstrap.php";

use Tester\{Assert, TestCase};

/**
 * Tests class.
 * @testCase
 */
class ExampleTest extends TestCase {
	public function testExample() {
		$string = "hello";
		Assert::match($string, "hello");
	}
}

$testCase = new ExampleTest;
$testCase->run();
