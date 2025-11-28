<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        //He modificat aquest test, per a que al fer el git push fallin els testos i veure que no fa merge a la branca main
        $this->assertTrue(false);
        //  $this->assertTrue(true);
    }
}
