<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace DynamicOOOS\Symfony\Component\ExpressionLanguage\Tests\Node;

use DynamicOOOS\PHPUnit\Framework\TestCase;
use DynamicOOOS\Symfony\Component\ExpressionLanguage\Compiler;
abstract class AbstractNodeTest extends TestCase
{
    /**
     * @dataProvider getEvaluateData
     */
    public function testEvaluate($expected, $node, $variables = [], $functions = [])
    {
        $this->assertSame($expected, $node->evaluate($functions, $variables));
    }
    public abstract function getEvaluateData();
    /**
     * @dataProvider getCompileData
     */
    public function testCompile($expected, $node, $functions = [])
    {
        $compiler = new Compiler($functions);
        $node->compile($compiler);
        $this->assertSame($expected, $compiler->getSource());
    }
    public abstract function getCompileData();
    /**
     * @dataProvider getDumpData
     */
    public function testDump($expected, $node)
    {
        $this->assertSame($expected, $node->dump());
    }
    public abstract function getDumpData();
}
