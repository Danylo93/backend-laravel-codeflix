<?php

namespace Tests\Unit;

use Core\Test;
use PHPUnit\Framework\TestCase;

class TesteUnitTest extends TestCase
{
    public function test_call_method_foo()
    {
        $teste = new Test();
        $response = $teste->foo();

        $this->assertEquals("1234", $response);
    }
}
