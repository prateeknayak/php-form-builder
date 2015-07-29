<?php

namespace Prateek\FormBuilder\Test;

use Prateek\FormBuilder\FormBuilder as F;
use \PHPUnit_Framework_TestCase;

class FormBuilderTest extends PHPUnit_Framework_TestCase
{
    public function testEmpty()
    {
        $stack = array();
        $this->assertEmpty($stack);

        return $stack;
        
    }

    /**
     * @depends testEmpty
     */
    public function testPush(array $stack)
    {
        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertNotEmpty($stack);

        return $stack;
    }

    public function testInput()
    {
        $i = F::input(array("id"        => "test1",
                    "name"        => "test1",
                    "type"        => "text",
                    "placeholder" => "This is placeholder",
                    "value"       => "This is value",
                    "disabled"    => 0,
                    "checked"     => 0,
                    'label'       => "<span>Text in Span </span>"
            ));
        $this->assertNotEmpty($i);
    }

   
}