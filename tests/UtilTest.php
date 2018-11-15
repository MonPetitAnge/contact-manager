<?php

namespace App\Tests;

use App\Service\StringService;
use PHPUnit\Framework\TestCase;

class UtilTest extends TestCase
{
    public function testPalindrome()
    {
        $name = "Ada";
        $stringService = new StringService();

        $this->assertTrue($stringService->isPalindrome($name));
    }

    // Je n'ai pas fait appel à une API pour vérifier les emails
    // J'ai plutôt utilisé les asserts de symfony
    // Cependant voici un algorithme d'un test unitaire sur le test d'un WS
    public function testEmail()
    {
        myEmailChecker = new EmailCheckerWS();
        $myEmail = "mwalid.mahmoud@gmail.com";

        $this->assertTrue(myEmailChecker->isValid($myEmail);
    }
}
