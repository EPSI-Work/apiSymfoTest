<?php

use PHPUnit\Framework\TestCase;
use App\Controller\CapitalizeController;

class ExampleTest extends TestCase
{

    /**
     * @dataProvider stringProvider
     */
    public function testCapitalize($text, $expected)
    {
        $capitalizeController = new CapitalizeController();

        $this->assertSame($expected, $capitalizeController->capitalize($text));
    }

    public function stringProvider()
    {
        return [
            ["BONJOUR", "BONJOUR"],
            ["1234", "1234"],
            ["BONJOUR1234", "BONJOUR1234"],
        ];
    }
}
