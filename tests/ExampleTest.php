<?php

use PHPUnit\Framework\TestCase;
use App\Controller\CapitalizeController;

class ExampleTest extends TestCase
{
    public function testCapitalize()
    {
        $capitalizeController = new CapitalizeController();

        $this->assertSame("BONJOUR", $capitalizeController->capitalize("bonjour"));
        $this->assertSame("1234", $capitalizeController->capitalize("1234"));
        $this->assertSame("BONJOUR1234", $capitalizeController->capitalize("bonjour1234"));
    }
}
